<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class HardwareDevicesTableSeeder extends Seeder
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
            DB::table('hardware_devices')->insert([
                'device_name' => 'Device ' . $faker->numberBetween(1, 1000),
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'status' => rand(0, 1),
                'center_id' => rand(1, 100),
            ]);
        }
    }
}
