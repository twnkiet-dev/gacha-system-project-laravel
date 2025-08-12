<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Card extends Model
{
    /** @use HasFactory<\Database\Factories\CardFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function gachaCards(): HasMany
    {
        return $this->hasMany(GachaCard::class);
    }

    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }
    public function gacha(): BelongsToMany
    {
        return $this->belongsToMany(Gacha::class, GachaCard::class);
    }
}
