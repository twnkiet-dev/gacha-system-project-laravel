<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    use Notifiable;
    protected $fillable = [
        "name",
        "email",
        "password",
        "phone",
        "address",
        "is_banned",
        "role",
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_banned' => 'boolean',
        'password' => 'hashed',
    ];

    public function inventory() : HasMany
    {
        return $this->hasMany(Inventory::class);
    }

}
