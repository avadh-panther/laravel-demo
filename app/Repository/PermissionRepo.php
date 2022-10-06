<?php

namespace App\Repository;

use App\Models\Permission;

class PermissionRepo implements PermissionRepository
{
    function permission()
    {
        return Permission::paginate(5);
    }

    function create($data)
    {
        $data->validate([
            'name' => 'required'
        ]);

        Permission::create([
            'name' => $data->name,
        ]);
    }

    function update($data)
    {
        $data->validate([
            'name' => 'required'
        ]);

        Permission::where('id', $data->id)->update([
            'name' => $data->name,
        ]);
    }

    function delete($data)
    {
        Permission::find($data->id)->delete();
    }
}
