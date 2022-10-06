<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'add business'
        ]);

        Permission::create([
            'name' => 'edit business'
        ]);

        Permission::create([
            'name' => 'delete business'
        ]);

        Permission::create([
            'name' => 'view business'
        ]);

        Permission::create([
            'name' => 'add location'
        ]);

        Permission::create([
            'name' => 'edit location'
        ]);

        Permission::create([
            'name' => 'delete location'
        ]);

        Permission::create([
            'name' => 'view location'
        ]);

        Permission::create([
            'name' => 'add user'
        ]);

        Permission::create([
            'name' => 'edit user'
        ]);

        Permission::create([
            'name' => 'delete user'
        ]);

        Permission::create([
            'name' => 'view user'
        ]);

        Permission::create([
            'name' => 'view role'
        ]);
    }
}
