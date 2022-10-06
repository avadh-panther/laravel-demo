<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\LocationRepository;

class LocationController extends Controller
{

    public LocationRepository $loactionRepo;

    public function __construct(LocationRepository $locations)
    {
        $this->loactionRepo = $locations;
    }

    function location()
    {
        $data = $this->loactionRepo->location();
        return view('location.dashboard')->with('location', $data);
    }

    function add()
    {
        $data = $this->loactionRepo->businesses(Auth::user()->id);
        return view('location.create')->with('business', $data);
    }

    function verify(Request $request)
    {
        $request->merge(['businessdata' => $this->loactionRepo->businessdata($request)]);
        $this->loactionRepo->create($request);
        return redirect('location');
    }

    function update(Request $request)
    {
        $data = $this->loactionRepo->find($request);
        return view('location.update')->with('data', $data);
    }

    function update_verify(Request $request)
    {
        $this->loactionRepo->update($request);
        return redirect('location');
    }

    function delete(Request $request)
    {
        $this->loactionRepo->delete($request);
        return redirect('location');
    }
}
