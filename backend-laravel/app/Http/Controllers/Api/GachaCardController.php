<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GachaCard;
use App\Models\Gacha;
use App\Models\Card;

class GachaCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GachaCard::with(['gacha','card'])->orderBy('gacha_id')->orderBy('position')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'gacha_id' => ['required','integer','exists:gachas,id'],
            'card_id' => ['required','integer','exists:cards,id'],
            'quantity' => ['required','integer','min:0'],
            'rate' => ['required','numeric','min:0'],
            'position' => ['required','integer','min:1'],
        ]);

        $exists = GachaCard::where('gacha_id', $data['gacha_id'])
            ->where('position', $data['position'])
            ->exists();
        if ($exists) {
            return response()->json(['message' => 'Position already used in this gacha'], 422);
        }

        $gachaCard = GachaCard::create($data);
        return $gachaCard->load(['gacha','card']);
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
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'card_id' => ['sometimes','integer','exists:cards,id'],
            'quantity' => ['sometimes','integer','min:0'],
            'rate' => ['sometimes','numeric','min:0'],
            'position' => ['sometimes','integer','min:1'],
        ]);
        $gachaCard = GachaCard::findOrFail($id);

        if (array_key_exists('position', $data)) {
            $exists = GachaCard::where('gacha_id', $gachaCard->gacha_id)
                ->where('position', $data['position'])
                ->where('id', '!=', $gachaCard->id)
                ->exists();
            if ($exists) {
                return response()->json(['message' => 'Position already used in this gacha'], 422);
            }
        }

        $gachaCard->update($data);
        return $gachaCard->load(['gacha','card']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gachaCard = GachaCard::findOrFail($id);
        $gachaCard->delete();
        return response()->noContent();
    }
}
