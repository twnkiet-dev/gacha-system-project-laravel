<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo cards với tên cụ thể và rarity
        $specificCards = [
            // Legendary Cards
            ['name' => 'Ancient Dragon Emperor', 'image' => 'cards/ancient_dragon_emperor.jpg'],
            ['name' => 'Divine Phoenix Queen', 'image' => 'cards/divine_phoenix_queen.jpg'],
            ['name' => 'Shadow Lord Reaper', 'image' => 'cards/shadow_lord_reaper.jpg'],
            ['name' => 'Lightning God Thor', 'image' => 'cards/lightning_god_thor.jpg'],
            ['name' => 'Ice Empress Elsa', 'image' => 'cards/ice_empress_elsa.jpg'],
            
            // Epic Cards
            ['name' => 'Fire Dragon Knight', 'image' => 'cards/fire_dragon_knight.jpg'],
            ['name' => 'Water Spirit Guardian', 'image' => 'cards/water_spirit_guardian.jpg'],
            ['name' => 'Earth Titan Warrior', 'image' => 'cards/earth_titan_warrior.jpg'],
            ['name' => 'Wind Archer Master', 'image' => 'cards/wind_archer_master.jpg'],
            ['name' => 'Dark Magic Sorcerer', 'image' => 'cards/dark_magic_sorcerer.jpg'],
            ['name' => 'Holy Light Priest', 'image' => 'cards/holy_light_priest.jpg'],
            ['name' => 'Steel Armored Knight', 'image' => 'cards/steel_armored_knight.jpg'],
            
            // Rare Cards
            ['name' => 'Flame Salamander', 'image' => 'cards/flame_salamander.jpg'],
            ['name' => 'Frost Wolf', 'image' => 'cards/frost_wolf.jpg'],
            ['name' => 'Thunder Eagle', 'image' => 'cards/thunder_eagle.jpg'],
            ['name' => 'Stone Golem', 'image' => 'cards/stone_golem.jpg'],
            ['name' => 'Shadow Assassin', 'image' => 'cards/shadow_assassin.jpg'],
            ['name' => 'Crystal Fairy', 'image' => 'cards/crystal_fairy.jpg'],
            ['name' => 'Blood Vampire', 'image' => 'cards/blood_vampire.jpg'],
            ['name' => 'Nature Druid', 'image' => 'cards/nature_druid.jpg'],
            
            // Common Cards
            ['name' => 'Fire Sprite', 'image' => 'cards/fire_sprite.jpg'],
            ['name' => 'Water Droplet', 'image' => 'cards/water_droplet.jpg'],
            ['name' => 'Earth Pebble', 'image' => 'cards/earth_pebble.jpg'],
            ['name' => 'Wind Wisp', 'image' => 'cards/wind_wisp.jpg'],
            ['name' => 'Light Orb', 'image' => 'cards/light_orb.jpg'],
            ['name' => 'Dark Shard', 'image' => 'cards/dark_shard.jpg'],
            ['name' => 'Iron Sword', 'image' => 'cards/iron_sword.jpg'],
            ['name' => 'Wooden Shield', 'image' => 'cards/wooden_shield.jpg'],
            ['name' => 'Magic Potion', 'image' => 'cards/magic_potion.jpg'],
            ['name' => 'Health Herb', 'image' => 'cards/health_herb.jpg'],
        ];

        foreach ($specificCards as $cardData) {
            Card::create($cardData);
        }

        // Tạo thêm 20 cards random bằng factory
        Card::factory(20)->create();
    }
}
