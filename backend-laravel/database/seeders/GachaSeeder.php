<?php

namespace Database\Seeders;

use App\Models\Gacha;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GachaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo các gacha pools cụ thể
        $gachaPools = [
            [
                'name' => 'Dragon Legends Banner',
                'thumbnail' => 'gachas/dragon_legends_banner.jpg'
            ],
            [
                'name' => 'Elemental Heroes Summon',
                'thumbnail' => 'gachas/elemental_heroes_summon.jpg'
            ],
            [
                'name' => 'Shadow Realm Collection',
                'thumbnail' => 'gachas/shadow_realm_collection.jpg'
            ],
            [
                'name' => 'Divine Warriors Pool',
                'thumbnail' => 'gachas/divine_warriors_pool.jpg'
            ],
            [
                'name' => 'Mythical Beasts Gacha',
                'thumbnail' => 'gachas/mythical_beasts_gacha.jpg'
            ],
            [
                'name' => 'Crystal Kingdom Banner',
                'thumbnail' => 'gachas/crystal_kingdom_banner.jpg'
            ],
            [
                'name' => 'Ancient Powers Summon',
                'thumbnail' => 'gachas/ancient_powers_summon.jpg'
            ],
            [
                'name' => 'Celestial Guardians Pool',
                'thumbnail' => 'gachas/celestial_guardians_pool.jpg'
            ],
            [
                'name' => 'Demon Slayer Collection',
                'thumbnail' => 'gachas/demon_slayer_collection.jpg'
            ],
            [
                'name' => 'Royal Knights Banner',
                'thumbnail' => 'gachas/royal_knights_banner.jpg'
            ]
        ];

        foreach ($gachaPools as $gachaData) {
            Gacha::create($gachaData);
        }

        // Tạo thêm 5 gacha pools random bằng factory
        Gacha::factory(5)->create();
    }
}
