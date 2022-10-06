<?php

namespace App\Repository;

use Illuminate\Validation\Rule;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersRepo implements UsersRepository
{
    function users()
    {
        return User::with('role')->paginate(5);
    }

    function find($id)
    {
        return User::where('id', $id)->with('role')->first();
    }

    function allRoles()
    {
        return Role::all('name');
    }

    function create($data)
    {
        $data->validate([
            'role' => ['required', 'exists:roles,name'],
            'name' => 'alpha',
            'email' => ['email', Rule::unique('users')],
            'mobile_no' => ['numeric', Rule::unique('users'), 'digits:10'],
            'username' => ['required', Rule::unique('users')],
            'password' => 'required',
            'con_password' => ['required', 'same:password']
        ]);

        $role = Role::where('name', $data->role)->first();

        User::create([
            'role_id' => $role->id,
            'name' => $data->name,
            'email' => $data->email,
            'mobile_no' => $data->mobile_no,
            'username' => $data->username,
            'password' => Hash::make($data->password),
        ]);
    }

    function update($data)
    {
        $data->validate([
            'role' => ['required', 'exists:roles,name'],
            'name' => 'alpha',
            'email' => ['email', Rule::unique('users')->ignore($data->id),],
            'mobile_no' => ['numeric', Rule::unique('users')->ignore($data->id), 'digits:10'],
            'username' => ['required', Rule::unique('users')->ignore($data->id),],
        ]);

        $role = Role::where('name', $data->role)->first();

        User::where('id', $data->id)->update([
            'role_id' => $role->id,
            'name' => $data->name,
            'email' => $data->email,
            'mobile_no' => $data->mobile_no,
            'username' => $data->username
        ]);
    }

    function delete($data)
    {
        User::find($data->id)->delete();
    }
}
