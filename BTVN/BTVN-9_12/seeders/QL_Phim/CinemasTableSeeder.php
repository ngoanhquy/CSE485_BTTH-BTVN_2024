<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('cinemas')->insert([
                'name' => 'Cinema ' . $faker->city,
                'location' => $faker->address,
                'total_seats' => rand(50, 300),
            ]);
        }
    }
}
