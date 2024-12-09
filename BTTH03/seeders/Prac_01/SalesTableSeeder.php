<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SalesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->numberBetween(1, 100), 
                'quantity' => $faker->numberBetween(1, 50), 
                'sale_date' => $faker->dateTimeBetween('-1 year', 'now'), 
                'customer_phone' => $faker->optional()->numerify('09########'), 
            ]);
            
        }
    }
}