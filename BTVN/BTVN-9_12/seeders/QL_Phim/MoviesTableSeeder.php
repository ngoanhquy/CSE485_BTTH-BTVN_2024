<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
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
            DB::table('movies')->insert([
                'title' => $faker->sentence(rand(2, 5)),
                'director' => $faker->name,
                'release_date' => $faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
                'duration' => rand(90, 180), 
                'cinema_id' => rand(1, 100), 
            ]);
        }
    }
}
