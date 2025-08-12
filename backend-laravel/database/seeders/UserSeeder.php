<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "name"=> "Nguyễn Hùng Tuấn Kiệt",
            "email"=> "tuankiet2962003@gmail.com",
            "password"=> bcrypt("1234"),
            "phone" => "0523059456",
            "address"=> "Nha Trang",
            "role"=>"admin",
        ]);

        User::factory()->count(10)->create();
    }
}
