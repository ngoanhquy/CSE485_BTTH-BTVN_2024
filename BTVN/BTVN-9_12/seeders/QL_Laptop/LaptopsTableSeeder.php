<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LaptopsTableSeeder extends Seeder
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
            DB::table('laptops')->insert([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Apple', 'Asus']),
                'model' => 'Model ' . $faker->numberBetween(1, 1000),
                'specifications' => $faker->sentence(6),
                'rental_status' => rand(0, 1),
                'renter_id' => rand(1, 100),
            ]);
        }
    }
}
