<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gacha;
use App\Http\Requests\StoreGachaRequest;
use App\Http\Requests\UpdateGachaRequest;
use App\Models\GachaCard;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
class GachaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Gacha::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGachaRequest $request)
    {
        $data = $request->validated();
        $gacha = Gacha::create($data);
        return $gacha;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gacha = Gacha::with('cards')->findOrFail($id);
        return response()->json($gacha);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGachaRequest $request, string $id)
    {
        $data = $request->validated();
        $gacha = Gacha::findOrFail($id);
        $gacha->update($data);
        return $gacha;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gacha = Gacha::findOrFail($id);
        $gacha->delete();
        return response()->noContent();
    }

    /**
     * Draw a card from a gacha and record into inventories.
     */
    public function roll(string $gachaId)
    {
        
        $user = request()->user();
        $gacha = Gacha::findOrFail($gachaId);
        $gacha->increment('roll_count');
        $currentRollCount = $gacha->roll_count;

        $pool = GachaCard::where('gacha_id', $gacha->id)
            ->where('quantity', '>', 0)
            ->get(['id','card_id','rate','quantity']);

        if ($pool->isEmpty()) {
            throw ValidationException::withMessages([
                'gacha' => ['Gacha này hiện không có vật phẩm khả dụng.'],
            ]);
        }

        // $totalRate = $pool->sum(fn($i) => (float) $i->rate);
        // if ($totalRate <= 0) {
        //     throw ValidationException::withMessages([
        //         'gacha' => ['Tổng tỉ lệ không hợp lệ.'],
        //     ]);
        // }

        // $roll = mt_rand() / mt_getrandmax() * $totalRate;
        // $acc = 0.0;
        // $selected = null;
        // foreach ($pool as $item) {
        //     $acc += (float) $item->rate;
        //     if ($roll <= $acc) {
        //         $selected = $item;
        //         break;
        //     }
        // }
        // $selected ??= $pool->last();

        
        $roll = mt_rand()/mt_getrandmax();
        $acc = 0.0;
        $selected = null;
        foreach($pool as $item){
            if($item->position == $currentRollCount) {
                $selected = $item;
                break;
            }
        }
        if(!$selected){
            foreach ($pool as $item) {
                $acc += (float)$item->rate;
                if($roll <= $acc){
                    $selected = $item;
                    break;
                }
            }
        }

        DB::transaction(function () use ($selected, $user) {
            // decrement quantity if tracked
            $record = GachaCard::lockForUpdate()->find($selected->id);
            if ($record && $record->quantity > 0) {
                $record->decrement('quantity');
            }

            Inventory::create([
                'user_id' => $user->id,
                'card_id' => $selected->card_id,
                'obtained_at' => now(),
            ]);
        });

        return response()->json([
            'card_id' => $selected->card_id,
        ], 201);
    }
}
