<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table("users")->insert([
            "name"=> "Nguyễn Hùng Tuấn Kiệt",
            "email"=> "tuankiet2962003@gmail.com",
            "password"=> bcrypt("1234"),
            "phone" => "0523059456",
            "address"=> "Nha Trang",
            "role"=>"admin",
        ]);

        $faker = \Faker\Factory::create();
        foreach(range(1,10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email'=> $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                'phone' => $faker->phoneNumber,
                'address'=> $faker->address,
                'is_banned'=> $faker->boolean(20),
            ]);
        }
    }
}
