<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Chạy seeders theo thứ tự để đảm bảo foreign keys không bị lỗi
        $this->call([
            // 1. Tạo users trước (không phụ thuộc vào ai)
            UserSeeder::class,
            
            // 2. Tạo cards (không phụ thuộc vào ai)
            CardSeeder::class,
            
            // 3. Tạo gachas (không phụ thuộc vào ai)
            GachaSeeder::class,
            
            // 4. Tạo gacha_cards (phụ thuộc vào gachas và cards)
            GachaCardSeeder::class,
            
            // 5. Tạo inventories cuối cùng (phụ thuộc vào users, gachas, cards)
            InventorySeeder::class,
        ]);
        
        $this->command->info('✅ Tất cả seeders đã chạy thành công!');
        $this->command->info('📊 Data test đã được tạo cho hệ thống Gacha:');
        $this->command->info('   - Users: ~11 users (1 admin + 10 random users)');
        $this->command->info('   - Cards: ~50 cards (30 specific + 20 random)');
        $this->command->info('   - Gachas: ~15 gacha pools (10 specific + 5 random)');
        $this->command->info('   - GachaCards: Relationships với tỷ lệ drop thực tế');
        $this->command->info('   - Inventories: ~500+ inventory items với gacha simulation');
    }
}
