<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ITCentersTableSeeder extends Seeder
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
            DB::table('it_centers')->insert([
                'name' => "IT Center " . $faker->numberBetween(1, 100),
                'location' => $faker->address,
                'contact_email' => $faker->unique()->safeEmail,
            ]);
        }
    }
}
