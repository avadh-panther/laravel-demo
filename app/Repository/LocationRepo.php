<?php

namespace App\Repository;

use App\Models\Location;
use App\Models\Businessdata;

class LocationRepo implements LocationRepository
{
    function location()
    {
        return Location::with('businessdata')->paginate(5); // ->get(); 
    }

    function businesses($id)
    {
        return Businessdata::where('user_id', $id)->get();
    }

    function businessdata($data)
    {
        return Businessdata::where('name', $data->business)->first();
    }

    function create($data)
    {
        $data->validate([
            'business' => ['required', 'exists:businessdatas,name'],
            'name' => ['required', 'alpha'],
            'mail' => ['required', 'email', 'unique:businessdatas,email'],
            'address' => 'required'
        ]);

        Location::create([
            'businessdata_id' => $data->businessdata->id,
            'name' => $data->name,
            'email' => $data->mail,
            'address' => $data->address
        ]);
    }

    function find($data)
    {
        return Location::find($data->id);
    }

    function update($data)
    {
        $data->validate([
            'name' => ['required', 'alpha'],
            'mail' => ['required', 'email', 'unique:businessdatas,email,' . $data->id],
            'address' => 'required'
        ]);

        Location::where('id', $data->id)->update([
            'name' => $data->name,
            'email' => $data->mail,
            'address' => $data->address
        ]);
    }

    function delete($data)
    {
        Location::find($data->id)->delete();
    }
}
