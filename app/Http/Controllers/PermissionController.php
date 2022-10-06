<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\PermissionRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller
{
    public PermissionRepository $permRepo;

    public function __construct(PermissionRepository $permission)
    {
        $this->permRepo = $permission;
    }

    function permission()
    {
        if (check('view permission')) {

            $perm = $this->permRepo->permission();
            return view('permission.dashboard', compact('perm'));
        } else {
            return Redirect::back();
        }
    }

    function add()
    {
        if (check('add permission')) {

            return view('permission.create');
        } else {
            return Redirect::back();
        }
    }

    function verify(Request $request)
    {
        if (check('add permission')) {

            $this->permRepo->create($request);
            return redirect('permission');
        } else {
            return Redirect::back();
        }
    }

    function update(Request $request)
    {
        if (check('edit permission')) {

            return view('permission.update', compact('request'));
        } else {
            return Redirect::back();
        }
    }

    function update_verify(Request $request)
    {
        if (check('edit permission')) {

            $this->permRepo->update($request);
            return redirect('permission');
        } else {
            return Redirect::back();
        }
    }

    function delete(Request $request)
    {
        if (check('delete permission')) {

            $this->permRepo->delete($request);
            return Redirect::back();
        } else {
            return Redirect::back();
        }
    }
}
