<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\BusinessRepository;
use Illuminate\Support\Facades\Auth;

class BusinessdataController extends Controller
{

    public BusinessRepository $businessRepo;

    public function __construct(BusinessRepository $businesses)
    {
        $this->businessRepo = $businesses;
    }

    function business()
    {
        $data = $this->businessRepo->businesses();
        return view('business.dashboard')->with('business', $data);
    }

    function add()
    {
        return view('business.create');
    }

    function verify(Request $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        $request->merge(['user_name' => Auth::user()->name]);
        $this->businessRepo->create($request);
        return redirect('business');
    }

    function update(Request $request)
    {
        $data = $this->businessRepo->find($request->id);
        return view('business.update')->with('data', $data);
    }

    function update_verify(Request $request)
    {
        $this->businessRepo->update($request);
        return redirect('business');
    }

    function delete(Request $request)
    {
        $this->businessRepo->delete($request);
        return redirect('business');
    }
}
