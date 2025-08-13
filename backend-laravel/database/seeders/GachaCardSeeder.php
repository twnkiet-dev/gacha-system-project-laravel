<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GachaCard;
use App\Models\Gacha;
use App\Models\Card;

class GachaCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Gacha::all() as $gacha) {
            $selectedCards = Card::all()->random(rand(3, 5));

            $rates = $selectedCards->map(fn() => rand(1, 100))->toArray();

            $totalRate = array_sum($rates);

            $normalizedRates = array_map(fn($r) => round($r / $totalRate, 4), $rates);
            
            foreach($selectedCards as $index => $card) {
                $gacha->cards()->attach($card->id, [
                    'rate' => $normalizedRates[$index],
                    'quantity' => rand(1, 5),
                    'position' => $index + 1,
                ]);
            }
        }
    }
}
