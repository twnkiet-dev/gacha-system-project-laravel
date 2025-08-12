<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gacha_id',
        'card_id',
        'obtained_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'gacha_id' => 'integer',
        'card_id' => 'integer',
        'obtained_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function gacha(): BelongsTo
    {
        return $this->belongsTo(Gacha::class);
    }

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
