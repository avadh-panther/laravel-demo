<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;

function name($name)
{
    return 'hey there' . $name;
}

function check($req)
{
    $role = Role::find(Auth::user()->role_id)->permissions()->get();

    foreach ($role as $value) {
        if ($value->name == $req) {
            return true;
        }
    }
}
