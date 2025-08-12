<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GachaCard extends Model
{
    /** @use HasFactory<\Database\Factories\GachaCardFactory> */
    use HasFactory;

    protected $fillable = [
        'gacha_id',
        'card_id',
        'quantity',
        'rate',
        'position',
    ];

    protected $casts = [
        'gacha_id' => 'integer',
        'card_id' => 'integer',
        'quantity' => 'integer',
        'position' => 'integer',
        'rate' => 'decimal:4',
    ];

    public function gacha(): BelongsTo
    {
        return $this->belongsTo(Gacha::class);
    }

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
