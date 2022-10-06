<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'businessdata_id' => 1,
            'name' => 'Mumbai',
            'email' => 'reliance.mumbai@gmail.com',
            'address' => 'India'
        ]);

        Location::create([
            'businessdata_id' => 2,
            'name' => 'Mumbai',
            'email' => 'taj@gmail.com',
            'address' => 'India'
        ]);

        Location::create([
            'businessdata_id' => 3,
            'name' => 'rajasthan',
            'email' => 'adanipower.rajasthan@gmail.com',
            'address' => 'India'
        ]);

        Location::create([
            'businessdata_id' => 4,
            'name' => 'Surat',
            'email' => 'break.k.bad.ana@gmail.com',
            'address' => 'India'
        ]);

        Location::create([
            'businessdata_id' => 5,
            'name' => 'Surat',
            'email' => 'maggie@gmail.com',
            'address' => 'India'
        ]);

        Location::create([
            'businessdata_id' => 6,
            'name' => 'Surat',
            'email' => 'amul.surat@gmail.com',
            'address' => 'India'
        ]);

        Location::create([
            'businessdata_id' => 7,
            'name' => 'India',
            'email' => 'swadesi@gmail.com',
            'address' => 'India'
        ]);

        Location::create([
            'businessdata_id' => 8,
            'name' => 'Karnataka',
            'email' => 'flipkart.karnataka@gmail.com',
            'address' => 'India'
        ]);

        Location::create([
            'businessdata_id' => 9,
            'name' => 'Surat',
            'email' => 'sumul.surat@gmail.com',
            'address' => 'India'
        ]);

        Location::create([
            'businessdata_id' => 10,
            'name' => 'Gujarat',
            'email' => 'kissme@gmail.com',
            'address' => 'India'
        ]);

        Location::create([
            'businessdata_id' => 11,
            'name' => 'Mumbai',
            'email' => 'parle.gold@gmail.com',
            'address' => 'India'
        ]);
    }
}
