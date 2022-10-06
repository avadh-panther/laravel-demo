<?php

namespace App\Repository;

use App\Models\Permission;
use App\Models\Role;

class RoleRepo implements RoleRepository
{
    function role()
    {
        return Role::with('permissions')->paginate(5);
    }

    function permission()
    {
        return Permission::all();
    }

    function create($data)
    {
        $data->validate([
            'name' => 'required',
        ]);

        Role::create([
            'name' => $data->name,
        ]);

        $role = Role::where('name', $data->name)->first();

        foreach ($data->permissions as $value) {
            Role::find($role->id)->permissions()->attach($value);
        }
    }

    function find($id)
    {
        return Role::find($id)->permissions()->get();
    }

    function update($data)
    {
        $data->validate([
            'name' => 'required'
        ]);

        Role::where('id', $data->role_id)->update([
            'name' => $data->name
        ]);

        Role::find($data->role_id)->permissions()->sync($data->permissions);
    }

    function delete($id)
    {
        Role::find($id)->delete();
    }
}
