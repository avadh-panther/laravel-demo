<?php

namespace Database\Seeders;

use App\Models\Businessdata;
use Illuminate\Database\Seeder;

class BusinessdataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Businessdata::create([
            'user_id' => 1,
            'user_name' => 'avadh',
            'name' => 'Reliance',
            'email' => 'reliance@gmail.com',
            'address' => 'India'
        ]);

        Businessdata::create([
            'user_id' => 1,
            'user_name' => 'avadh',
            'name' => 'Tata',
            'email' => 'tata@gmail.com',
            'address' => 'India'
        ]);

        Businessdata::create([
            'user_id' => 1,
            'user_name' => 'avadh',
            'name' => 'Adani',
            'email' => 'adani@gmail.com',
            'address' => 'India'
        ]);

        Businessdata::create([
            'user_id' => 1,
            'user_name' => 'avadh',
            'name' => 'SBI',
            'email' => 'lunch.time@gmail.com',
            'address' => 'India'
        ]);

        Businessdata::create([
            'user_id' => 2,
            'user_name' => 'raj',
            'name' => 'maggie',
            'email' => 'maggie.in2min@gmail.com',
            'address' => 'India'
        ]);

        Businessdata::create([
            'user_id' => 2,
            'user_name' => 'raj',
            'name' => 'Amul',
            'email' => 'amul@gmail.com',
            'address' => 'India'
        ]);

        Businessdata::create([
            'user_id' => 2,
            'user_name' => 'raj',
            'name' => 'Patanjali',
            'email' => 'patanjali@gmail.com',
            'address' => 'India'
        ]);

        Businessdata::create([
            'user_id' => 3,
            'user_name' => 'kishan',
            'name' => 'Flipkart',
            'email' => 'flipkart@gmail.com',
            'address' => 'India'
        ]);

        Businessdata::create([
            'user_id' => 3,
            'user_name' => 'kishan',
            'name' => 'Sumul',
            'email' => 'sumul@gmail.com',
            'address' => 'India'
        ]);

        Businessdata::create([
            'user_id' => 3,
            'user_name' => 'kishan',
            'name' => 'Cadbury',
            'email' => 'kuchmithahojaye@gmail.com',
            'address' => 'India'
        ]);

        Businessdata::create([
            'user_id' => 3,
            'user_name' => 'kishan',
            'name' => 'Parle',
            'email' => 'parle.g@gmail.com',
            'address' => 'India'
        ]);
    }
}
