<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Gacha;
use App\Models\Card;
use App\Models\Inventory;
use App\Models\GachaCard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $gachas = Gacha::all();
        $gachaCards = GachaCard::all();

        if ($users->isEmpty() || $gachas->isEmpty() || $gachaCards->isEmpty()) {
            return;
        }

        foreach ($users as $user) {
            // Mỗi user sẽ có 10-50 items trong inventory
            $itemCount = rand(10, 50);
            
            for ($i = 0; $i < $itemCount; $i++) {
                // Chọn random một gacha
                $gacha = $gachas->random();
                
                // Lấy các cards có trong gacha này
                $availableGachaCards = $gachaCards->where('gacha_id', $gacha->id);
                
                if ($availableGachaCards->isEmpty()) {
                    continue;
                }

                // Simulate gacha pull với tỷ lệ thực tế
                $gachaCard = $this->simulateGachaPull($availableGachaCards);
                
                if ($gachaCard) {
                    Inventory::create([
                        'user_id' => $user->id,
                        'gacha_id' => $gacha->id,
                        'card_id' => $gachaCard->card_id,
                        'obtained_at' => fake()->dateTimeBetween('-6 months', 'now'),
                    ]);
                }
            }
        }

        // Tạo thêm một số random inventory items
        Inventory::factory(100)->create();
    }

    /**
     * Simulate gacha pull based on rates
     */
    private function simulateGachaPull($gachaCards)
    {
        $random = mt_rand() / mt_getrandmax(); // 0.0 to 1.0
        $cumulativeRate = 0;

        // Sắp xếp theo rate tăng dần (legendary trước)
        $sortedGachaCards = $gachaCards->sortBy('rate');

        foreach ($sortedGachaCards as $gachaCard) {
            $cumulativeRate += $gachaCard->rate;
            if ($random <= $cumulativeRate) {
                return $gachaCard;
            }
        }

        // Fallback: trả về card có rate cao nhất
        return $sortedGachaCards->sortByDesc('rate')->first();
    }
}
