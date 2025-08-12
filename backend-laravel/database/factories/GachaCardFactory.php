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
        // Tạo tỷ lệ drop thực tế cho gacha game
        $rateTypes = [
            'common' => $this->faker->randomFloat(4, 0.4000, 0.6000), // 40-60%
            'rare' => $this->faker->randomFloat(4, 0.2000, 0.3500),   // 20-35%
            'epic' => $this->faker->randomFloat(4, 0.0800, 0.1500),   // 8-15%
            'legendary' => $this->faker->randomFloat(4, 0.0200, 0.0500), // 2-5%
            'mythic' => $this->faker->randomFloat(4, 0.0010, 0.0100),    // 0.1-1%
        ];
        
        $rateType = $this->faker->randomElement(array_keys($rateTypes));
        
        return [
            'gacha_id' => Gacha::factory(),
            'card_id' => Card::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'rate' => $rateTypes[$rateType],
            'position' => $this->faker->numberBetween(1, 50),
        ];
    }

    /**
     * Common rarity card
     */
    public function common(): static
    {
        return $this->state(fn (array $attributes) => [
            'rate' => $this->faker->randomFloat(4, 0.4000, 0.6000),
            'quantity' => $this->faker->numberBetween(5, 15),
        ]);
    }

    /**
     * Rare card
     */
    public function rare(): static
    {
        return $this->state(fn (array $attributes) => [
            'rate' => $this->faker->randomFloat(4, 0.2000, 0.3500),
            'quantity' => $this->faker->numberBetween(3, 8),
        ]);
    }

    /**
     * Epic card
     */
    public function epic(): static
    {
        return $this->state(fn (array $attributes) => [
            'rate' => $this->faker->randomFloat(4, 0.0800, 0.1500),
            'quantity' => $this->faker->numberBetween(1, 5),
        ]);
    }

    /**
     * Legendary card
     */
    public function legendary(): static
    {
        return $this->state(fn (array $attributes) => [
            'rate' => $this->faker->randomFloat(4, 0.0200, 0.0500),
            'quantity' => $this->faker->numberBetween(1, 3),
        ]);
    }

    /**
     * Mythic card
     */
    public function mythic(): static
    {
        return $this->state(fn (array $attributes) => [
            'rate' => $this->faker->randomFloat(4, 0.0010, 0.0100),
            'quantity' => 1,
        ]);
    }
}
