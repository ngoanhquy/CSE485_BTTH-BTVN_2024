<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
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
            DB::table('books')->insert([
                'title' => $faker->sentence(rand(2, 5)),
                'author' => $faker->name,
                'publication_year' => rand(1900, 2023),
                'genre' => $faker->randomElement(['Programming', 'Science Fiction', 'Drama', 'Fantasy']),
                'library_id' => rand(1, 100),
            ]);
        }
    }
}
