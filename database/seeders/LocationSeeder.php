<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'businessdata_id' => rand(1, 10),
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('locations')->insert([
            'businessdata_id' => rand(1, 10),
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('locations')->insert([
            'businessdata_id' => rand(1, 10),
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('locations')->insert([
            'businessdata_id' => rand(1, 10),
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('locations')->insert([
            'businessdata_id' => rand(1, 10),
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('locations')->insert([
            'businessdata_id' => rand(1, 10),
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('locations')->insert([
            'businessdata_id' => rand(1, 10),
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('locations')->insert([
            'businessdata_id' => rand(1, 10),
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('locations')->insert([
            'businessdata_id' => rand(1, 10),
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('locations')->insert([
            'businessdata_id' => rand(1, 10),
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);
    }
}
