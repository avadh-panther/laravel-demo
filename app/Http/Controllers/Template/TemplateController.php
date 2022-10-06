<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    function template(Request $request)
    {
        $data = Template::paginate(20);
        $artilces = '';
        if ($request->ajax()) {
            return response($data);
        }
        return view('templates.content', compact('data'));
    }

    function add()
    {
        return view('templates.create');
    }

    function add_verify(Request $request)
    {
        $request->validate([
            'temp_name' => ['required', 'unique:templates,name'],
            'description' => 'required',
        ]);

        Template::create([
            'name' => $request->temp_name,
            'description' => $request->description
        ]);

        return redirect('template');
    }

    function edit(Request $request)
    {
        $data = Template::find($request->id);
        return view('templates.edit', compact('data'));
    }

    function edit_verify(Request $request)
    {
        $request->validate([
            'temp_name' => ['required', 'unique:templates,name,' . $request->id],
            'description' => 'required',
        ]);

        Template::where('id', $request->id)->update([
            'name' => $request->temp_name,
            'description' => $request->description
        ]);

        return redirect('template');
    }

    function delete(Request $request)
    {
        Template::find($request->id)->delete();
        $data = Template::get();
        return response($data);
    }
}
