<?php

namespace Database\Seeders;

use App\Models\Gacha;
use App\Models\Card;
use App\Models\GachaCard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GachaCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gachas = Gacha::all();
        $cards = Card::all();

        if ($gachas->isEmpty() || $cards->isEmpty()) {
            return;
        }

        foreach ($gachas as $gacha) {
            $position = 1;
            $totalRate = 0;
            $gachaCards = [];

            // Legendary cards (1-2 per gacha, very low rate)
            $legendaryCards = $cards->random(rand(1, 2));
            foreach ($legendaryCards as $card) {
                $rate = round(rand(10, 100) / 10000, 4); // 0.001% - 0.01%
                $gachaCards[] = [
                    'gacha_id' => $gacha->id,
                    'card_id' => $card->id,
                    'quantity' => 1,
                    'rate' => $rate,
                    'position' => $position++,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $totalRate += $rate;
            }

            // Epic cards (3-5 per gacha, low rate)
            $epicCards = $cards->whereNotIn('id', $legendaryCards->pluck('id'))->random(rand(3, 5));
            foreach ($epicCards as $card) {
                $rate = round(rand(200, 500) / 10000, 4); // 0.02% - 0.05%
                $gachaCards[] = [
                    'gacha_id' => $gacha->id,
                    'card_id' => $card->id,
                    'quantity' => rand(1, 3),
                    'rate' => $rate,
                    'position' => $position++,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $totalRate += $rate;
            }

            // Rare cards (5-8 per gacha, medium rate)
            $usedCardIds = $legendaryCards->pluck('id')->merge($epicCards->pluck('id'));
            $rareCards = $cards->whereNotIn('id', $usedCardIds)->random(rand(5, 8));
            foreach ($rareCards as $card) {
                $rate = round(rand(800, 1500) / 10000, 4); // 0.08% - 0.15%
                $gachaCards[] = [
                    'gacha_id' => $gacha->id,
                    'card_id' => $card->id,
                    'quantity' => rand(2, 5),
                    'rate' => $rate,
                    'position' => $position++,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $totalRate += $rate;
            }

            // Common cards (8-12 per gacha, high rate)
            $usedCardIds = $usedCardIds->merge($rareCards->pluck('id'));
            $availableCommonCards = $cards->whereNotIn('id', $usedCardIds);
            if ($availableCommonCards->count() > 0) {
                $commonCards = $availableCommonCards->random(min(rand(8, 12), $availableCommonCards->count()));
                $remainingRate = 1.0000 - $totalRate;
                $ratePerCommon = round($remainingRate / $commonCards->count(), 4);

                foreach ($commonCards as $card) {
                    $gachaCards[] = [
                        'gacha_id' => $gacha->id,
                        'card_id' => $card->id,
                        'quantity' => rand(5, 15),
                        'rate' => $ratePerCommon,
                        'position' => $position++,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            // Insert tất cả gacha cards cho gacha này
            GachaCard::insert($gachaCards);
        }

        // Tạo thêm một số random relationships
        GachaCard::factory(50)->create();
    }
}
