<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();
        return Inventory::with('card')
            ->where('user_id', $user->id)
            ->orderByDesc('obtained_at')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Normally creation is via gacha draw endpoint; keeping placeholder.
        abort(405);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = request()->user();
        $item = Inventory::with('card')->findOrFail($id);
        if ($item->user_id !== $user->id) {
            abort(403);
        }
        return $item;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort(405);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort(405);
    }
}
