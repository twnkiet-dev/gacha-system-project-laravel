<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Gacha extends Model
{
    /** @use HasFactory<\Database\Factories\GachaFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'thumbnail',
    ];

    public function gachaCards(): HasMany
    {
        return $this->hasMany(GachaCard::class);
    }

    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    public function cards() {
        return $this->belongsToMany(Card::class, 'gacha_cards')
            ->withPivot(['quantity','rate','position'])
            ->withTimestamps()
            ->orderBy('gacha_cards.position');
    }
}
