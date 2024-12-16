<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->randomElement(['Lab1-PC05', 'Lab2-PC04', 'Lab3-PC02','Lab4-PC01']),
                'model' => $faker->randomElement(['Dell OptiPlex 7090', 'HP EliteDesk 800 G6', 'Lenovo ThinkCentre M920','Asus ExpertCenter D700']),
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'macOS']),
                'processor' => $faker->randomElement(['Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5']),
                'memory' => $faker->numberBetween(4, 64),
                'available' => $faker->boolean
            ]);
        }
    }
}