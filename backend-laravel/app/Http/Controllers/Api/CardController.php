<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Card::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        $data = $request->validated();
        $card = Card::create($data);
        return $card;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Card::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardRequest $request, string $id)
    {
        $data = $request->validated();
        $card = Card::find($id);
        $card->update($data);
        return $card;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $card = Card::find($id);
        $card->delete();
        return response()->noContent();
    }
}
