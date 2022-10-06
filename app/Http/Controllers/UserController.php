<?php

namespace App\Http\Controllers;

use App\Repository\UsersRepository;

class UserController extends Controller
{
    public UsersRepository $usersRepo;

    public function __construct(UsersRepository $users)
    {
        $this->usersRepo = $users;
    }

    function users()
    {
        $allUser = $this->usersRepo->users();
        return view('auth.users', compact('allUser'));
    }
}
