<?php

namespace App\Repository;

use App\Models\Businessdata;

class BusinessRepo implements BusinessRepository
{
    function businesses()
    {
        return Businessdata::paginate(5);   // ->get();
    }

    function create($data)
    {
        $data->validate([
            'name' => ['required', 'alpha'],
            'mail' => ['required', 'email', 'unique:businessdatas,email'],
            'address' => 'required'
        ]);

        Businessdata::create([
            'user_id' => $data->user_id,
            'name' => $data->name,
            'email' => $data->mail,
            'address' => $data->address,
            'user_name' => $data->user_name
        ]);
    }

    function find($id)
    {
        return Businessdata::find($id);
    }

    function update($data)
    {
        $data->validate([
            'name' => ['required', 'alpha'],
            'email' => ['required', 'email', 'unique:businessdatas,email,' . $data->id],
            'address' => 'required'
        ]);

        Businessdata::where('id', $data->id)->update([
            'name' => $data->name,
            'email' => $data->email,
            'address' => $data->address
        ]);
    }

    function delete($data)
    {
        Businessdata::find($data->id)->delete();
    }
}
