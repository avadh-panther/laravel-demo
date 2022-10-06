<?php

namespace App\Http\Controllers;

use App\Repository\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public UsersRepository $usersRepo;

    public function __construct(UsersRepository $users)
    {
        $this->usersRepo = $users;
    }

    function users()
    {
        if (check('view user')) {

            $allUser = $this->usersRepo->users();
            return view('auth.users', compact('allUser'));
        } else {
            return Redirect::back();
        }
    }

    function add()
    {
        if (check('add user')) {

            $roles = $this->usersRepo->allRoles();
            return view('auth.create', compact('roles'));
        } else {
            return Redirect::back();
        }
    }

    function verify(Request $request)
    {
        if (check('add user')) {

            $this->usersRepo->create($request);
            return redirect('users');
        } else {
            return Redirect::back();
        }
    }

    function update(Request $request)
    {
        if (check('edit user')) {

            $data = $this->usersRepo->find($request->id);
            $roles = $this->usersRepo->allRoles();
            return view('auth.update', compact('data', 'roles'));
        } else {
            return Redirect::back();
        }
    }

    function update_verify(Request $request)
    {
        if (check('edit user')) {

            $this->usersRepo->update($request);
            return redirect('users');
        } else {
            return Redirect::back();
        }
    }

    function delete(Request $request)
    {
        if (check('delete user')) {

            $this->usersRepo->delete($request);
            return Redirect::back();
        } else {
            return Redirect::back();
        }
    }
}
