<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Gacha;
use App\Models\Card;
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
            'obtained_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Recently obtained item
     */
    public function recent(): static
    {
        return $this->state(fn (array $attributes) => [
            'obtained_at' => $this->faker->dateTimeBetween('-1 week', 'now'),
        ]);
    }

    /**
     * Old item
     */
    public function old(): static
    {
        return $this->state(fn (array $attributes) => [
            'obtained_at' => $this->faker->dateTimeBetween('-1 year', '-1 month'),
        ]);
    }
}
