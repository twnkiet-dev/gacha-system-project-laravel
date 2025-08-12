<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gacha>
 */
class GachaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gachaNames = [
            'Dragon Legends Banner',
            'Elemental Heroes Summon',
            'Shadow Realm Collection',
            'Divine Warriors Pool',
            'Mythical Beasts Gacha',
            'Crystal Kingdom Banner',
            'Ancient Powers Summon',
            'Celestial Guardians Pool',
            'Demon Slayer Collection',
            'Royal Knights Banner',
            'Mystic Forest Gacha',
            'Cyber Future Summon',
            'Ocean Depths Pool',
            'Fire & Ice Banner',
            'Legendary Artifacts Gacha'
        ];

        $gachaTypes = ['standard', 'limited', 'event', 'premium'];
        $type = $this->faker->randomElement($gachaTypes);
        $name = $this->faker->randomElement($gachaNames);
        
        return [
            'name' => $name,
            'thumbnail' => 'gachas/' . strtolower(str_replace([' ', '&'], ['_', 'and'], $name)) . '_thumbnail.jpg',
        ];
    }
}
