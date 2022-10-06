<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\LocationRepository;
use Illuminate\Support\Facades\Redirect;

class LocationController extends Controller
{

    public LocationRepository $loactionRepo;

    public function __construct(LocationRepository $locations)
    {
        $this->loactionRepo = $locations;
    }

    function location()
    {
        if (check('view location')) {

            $data = $this->loactionRepo->location();
            return view('location.dashboard')->with('location', $data);
        } else {
            return Redirect::back();
        }
    }

    function add()
    {
        if (check('add location')) {

            $data = $this->loactionRepo->businesses(Auth::user()->id);
            return view('location.create')->with('business', $data);
        } else {
            return Redirect::back();
        }
    }

    function verify(Request $request)
    {
        if (check('add location')) {

            $request->merge(['businessdata' => $this->loactionRepo->businessdata($request)]);
            $this->loactionRepo->create($request);
            return redirect('location');
        } else {
            return Redirect::back();
        }
    }

    function update(Request $request)
    {
        if (check('edit location')) {

            $data = $this->loactionRepo->find($request);
            return view('location.update')->with('data', $data);
        } else {
            return Redirect::back();
        }
    }

    function update_verify(Request $request)
    {
        if (check('edit location')) {

            $this->loactionRepo->update($request);
            return redirect('location');
        } else {
            return Redirect::back();
        }
    }

    function delete(Request $request)
    {
        if (check('delete location')) {

            $this->loactionRepo->delete($request);
            return Redirect::back();
        } else {
            return Redirect::back();
        }
    }
}
