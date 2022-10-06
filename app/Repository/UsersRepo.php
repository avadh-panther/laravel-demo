<?php

namespace App\Repository;

use App\Models\User;

class UsersRepo implements UsersRepository
{
    function users()
    {
        return User::paginate(5);
    }
}
