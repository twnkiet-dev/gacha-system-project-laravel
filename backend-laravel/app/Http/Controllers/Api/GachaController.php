<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gacha;
use App\Http\Requests\StoreGachaRequest;
use App\Http\Requests\UpdateGachaRequest;
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
        $gacha = Gacha::find($id);
        $gacha->update($data);
        return $gacha;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gacha = Gacha::find($id);
        $gacha->delete();
        return response()->noContent();
    }
}
