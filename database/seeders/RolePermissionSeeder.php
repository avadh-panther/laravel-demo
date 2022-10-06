<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 16; $i++) {
            DB::table('permission_role')->insert([
                "role_id" => 1,
                "permission_id" => $i,
            ]);
        }

        for ($i = 1; $i <= 4; $i++) {
            DB::table('permission_role')->insert([
                "role_id" => 2,
                "permission_id" => $i,
            ]);
        }
    }
}
