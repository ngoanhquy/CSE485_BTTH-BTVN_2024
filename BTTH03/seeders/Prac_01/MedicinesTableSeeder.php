<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 100; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word . ' Medicine',
                'brand' => $faker->company, 
                'dosage' => $faker->randomElement(['500mg', '200mg', '10mg tablets']),
                'form' => $faker->randomElement(['Tablet', 'Capsule', 'Syrup', 'Injection']),
                'price' => $faker->randomFloat(2, 1, 1000), 
                'stock' => $faker->numberBetween(10, 500), 
            ]);
        }

    }
}
