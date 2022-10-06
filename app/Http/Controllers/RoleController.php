<?php

namespace App\Http\Controllers;

use App\Repository\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    public RoleRepository $roleRepo;

    public function __construct(RoleRepository $roles)
    {
        $this->roleRepo = $roles;
    }

    function role()
    {
        if (check('view role')) {

            $roles = $this->roleRepo->role();
            return view('role.dashboard', compact('roles'));
        } else {
            return Redirect::back();
        }
    }

    function add()
    {
        if (check('add role')) {

            $perm = $this->roleRepo->permission();
            return view('role.create', compact('perm'));
        } else {
            return Redirect::back();
        }
    }

    function verify(Request $request)
    {
        if (check('add role')) {

            $this->roleRepo->create($request);
            return redirect('role');
        } else {
            return Redirect::back();
        }
    }

    function update(Request $request)
    {
        if (check('edit role')) {

            $perm = $this->roleRepo->permission();
            $data = $this->roleRepo->find($request->id);

            $arr = array();
            foreach ($data as $value) {
                array_push($arr, $value->id);
            }
            return view('role.update', compact('arr', 'request', 'perm'));
        } else {
            return Redirect::back();
        }
    }

    function update_verify(Request $request)
    {
        if (check('edit role')) {

            $this->roleRepo->update($request);
            return redirect('role');
        } else {
            return Redirect::back();
        }
    }

    function delete(Request $request)
    {
        if (check('delete role')) {

            $this->roleRepo->delete($request->id);
            return Redirect::back();
        } else {
            return Redirect::back();
        }
    }
}
