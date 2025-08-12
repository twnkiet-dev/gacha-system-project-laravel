<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Card;
use App\Models\Gacha;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'gacha_id' => Gacha::factory(),
            'card_id' => Card::factory(),
            'obtained_at' => fake()->dateTime(),
        ];
    }
}
