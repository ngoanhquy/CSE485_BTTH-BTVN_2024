<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        // Prac_01
        $this->call([
            MedicinesTableSeeder::class,
            SalesTableSeeder::class,
        ]);
        // Prac_02
        $this->call([
            ClassesTableSeeder::class,
            StudentsTableSeeder::class,
        ]);
        //Prac_03
        $this->call([
            ComputersTableSeeder::class,
            IssuesTableSeeder::class,
        ]);
    }
}
