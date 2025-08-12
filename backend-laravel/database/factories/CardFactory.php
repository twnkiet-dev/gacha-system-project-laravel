<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cardNames = [
            'Lightning Dragon',
            'Fire Phoenix',
            'Ice Queen',
            'Shadow Assassin',
            'Golden Knight',
            'Water Spirit',
            'Earth Guardian',
            'Wind Archer',
            'Dark Mage',
            'Holy Priest',
            'Steel Warrior',
            'Crystal Fairy',
            'Blood Vampire',
            'Thunder God',
            'Nature Druid',
            'Cyber Ninja',
            'Flame Demon',
            'Frost Giant',
            'Light Angel',
            'Void Reaper'
        ];

        $rarities = ['common', 'rare', 'epic', 'legendary', 'mythic'];
        $rarity = $this->faker->randomElement($rarities);
        
        return [
            'name' => $this->faker->randomElement($cardNames) . ' ' . ucfirst($rarity),
            'image' => 'cards/' . strtolower(str_replace(' ', '_', $this->faker->randomElement($cardNames))) . '_' . $rarity . '.jpg',
        ];
    }
}
