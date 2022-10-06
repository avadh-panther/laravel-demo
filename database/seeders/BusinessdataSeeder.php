<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BusinessdataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('businessdatas')->insert([
            'user_id' => 2,
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('businessdatas')->insert([
            'user_id' => 2,
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('businessdatas')->insert([
            'user_id' => 2,
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('businessdatas')->insert([
            'user_id' => 2,
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('businessdatas')->insert([
            'user_id' => 2,
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('businessdatas')->insert([
            'user_id' => 1,
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('businessdatas')->insert([
            'user_id' => 1,
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('businessdatas')->insert([
            'user_id' => 1,
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('businessdatas')->insert([
            'user_id' => 1,
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);

        DB::table('businessdatas')->insert([
            'user_id' => 1,
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'address' => Str::random(10),
        ]);
    }
}
