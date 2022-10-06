<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\BusinessRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BusinessdataController extends Controller
{

    public BusinessRepository $businessRepo;

    public function __construct(BusinessRepository $businesses)
    {
        $this->businessRepo = $businesses;
    }

    function business()
    {
        if (check('view business')) {

            $data = $this->businessRepo->businesses();
            return view('business.dashboard')->with('business', $data);
        } else {
            return Redirect::back();
        }
    }

    function add()
    {
        if (check('add business')) {

            return view('business.create');
        } else {
            return Redirect::back();
        }
    }

    function verify(Request $request)
    {
        if (check('add business')) {

            $request->merge(['user_id' => Auth::user()->id]);
            $request->merge(['user_name' => Auth::user()->name]);
            $this->businessRepo->create($request);
            return redirect('business');
        } else {
            return Redirect::back();
        }
    }

    function update(Request $request)
    {
        if (check('edit business')) {

            $data = $this->businessRepo->find($request->id);
            return view('business.update')->with('data', $data);
        } else {
            return Redirect::back();
        }
    }

    function update_verify(Request $request)
    {
        if (check('edit business')) {

            $this->businessRepo->update($request);
            return redirect('business');
        } else {
            return Redirect::back();
        }
    }

    function delete(Request $request)
    {
        if (check('delete business')) {

            $this->businessRepo->delete($request);
            return Redirect::back();
        } else {
            return Redirect::back();
        }
    }
}
