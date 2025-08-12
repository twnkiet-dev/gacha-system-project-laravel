<?php

namespace Database\Factories;

use App\Models\Gacha;
use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GachaCard>
 */
class GachaCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gacha_id' => Gacha::factory(),
            'card_id' => Card::factory(),
            'quantity' => fake()->numberBetween(1, 100),
            'rate' => fake()->numberBetween(1, 100),
            'position' => fake()->numberBetween(1, 100),
        ];
    }
}
