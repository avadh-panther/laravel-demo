<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class StoreController extends Controller
{
    function store(Request $request)
    {
        $data = Store::paginate(20);
        $artilces = '';
        if ($request->ajax()) {
            return response($data);
        }
        return view('store.content', compact('data'));
    }

    function add()
    {
        return view('store.create');
    }

    function add_verify(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:stores,name'],
            'domain' => ['required', 'regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
            'email' => ['required', 'email'],
            'json' => 'required',
            'password' => 'required',
            'confirm_password' => ['required', 'same:password']
        ]);

        Store::create([
            'name' => $request->name,
            'domain' => $request->domain,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'timezone' => now(),
            'json_data' => $request->json,
        ]);

        return redirect('store');
    }

    function edit(Request $request)
    {
        $data = Store::find($request->id);
        return view('store.edit', compact('data'));
    }

    function edit_verify(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:stores,name,' . $request->id],
            'domain' => ['required', 'regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
            'email' => ['required', 'email'],
            'json' => 'required',
        ]);

        Store::where('id', $request->id)->update([
            'name' => $request->name,
            'domain' => $request->domain,
            'email' => $request->email,
            'timezone' => now(),
            'json_data' => $request->json,
        ]);

        return redirect('store');
    }

    function delete(Request $request)
    {
        Store::find($request->id)->delete();
        $data = Store::get();
        return response($data);
    }

    function search(Request $request)
    {
        switch ($request->type) {
            case "date":
                $data = explode(" - ", $request->input_value);
                $start = str_replace('/', '-', $data[0]);
                $end = str_replace('/', '-', $data[1]);
                $data = Store::whereBetween('timezone', [$start, $end])->get();
                return response($data);
                break;
            case "search":
                $data = Store::where('name', 'like', '%' . $request->input_value . '%')->orWhere('domain', 'like', '%' . $request->input_value . '%')->orWhere('email', 'like', '%' . $request->input_value . '%')->get();
                return response($data);
                break;
            case "tag":
                switch (count($request->input_value)) {
                    case 2:
                        $data = Store::where('json_data', 'like', '%' . $request->input_value[0] . '%')->orWhere('json_data', 'like', '%' . $request->input_value[1] . '%')->get();
                        return response($data);
                        break;
                    case 1:
                        $data = Store::where('json_data', 'like', '%' . $request->input_value[0] . '%')->get();
                        return response($data);
                        break;
                    default:
                        $data = Store::get();
                        return response($data);
                }
                break;
            default:
                $data = Store::get();
                return response($data);
        }
    }
}
