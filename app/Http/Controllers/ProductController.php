<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    function product()
    {
        // $user = Auth::user();
        // Cache::store('file')->put('authuser', Auth::user(), 600);
        // Cache::put('authuser', Auth::user(), 600);
        Cache::remember('authuser', 600, function () {
            return Auth::user();
        });
        $user = Cache::get('authuser');
        $product = Product::where('user_id', $user->id)->paginate(2);

        return view('product', ['userinfo' => $user, 'productList' => $product]);
    }

    function addproduct()
    {
        $user = Cache::get('authuser');
        // return view('form', ['userinfo', Auth::user()]);
        return view('form', ['userinfo', $user]);
    }

    function createproduct(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => ['required', 'numeric'],
            'compare_price' => ['required', 'numeric'],
            'cost_price' => ['required', 'numeric'],
            'charge_tax' => 'nullable',
            'sale_channels' => 'required',
            'vendor' => 'required',
            'tags' => 'required',
            'image' => 'mimes:jpg,jpeg,png,pdf'
        ]);

        $user = Auth::user();

        $str = $request->file('image')->store('public/' . $user->id);
        $path = ltrim($str, "public/");

        $product = new Product();

        $product->user_id = $user->id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->compare_price = $request->compare_price;
        $product->charge_tax = $request->charge_tax;
        $product->sale_channel = $request->sale_channels;
        $product->vendor = $request->vendor;
        $product->tags = $request->tags;
        $product->images = $path;

        $product->save();

        return redirect('main/product');
    }

    function update_product(Request $request)
    {
        $data = Product::find($request->id);
        return view('update_product', compact('data'));
    }

    function editproduct(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => ['required', 'numeric'],
            'compare_price' => ['required', 'numeric'],
            'cost_price' => ['required', 'numeric'],
            'charge_tax' => 'nullable',
            'sale_channels' => 'required',
            'vendor' => 'required',
            'tags' => 'required',
            'image' => ['nullable', 'mimes:jpg,jpeg,png,pdf']
        ]);

        $data = Product::find($request->id);

        if ($request->image == null) {
            $path = $data->images;
        } else {
            Storage::delete('public/' . $data->images);
            $user = Auth::user();
            $str = $request->file('image')->store('public/' . $user->id);
            $path = ltrim($str, "public/");
        }

        Product::where('id', $request->id)->first()->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'compare_price' => $request->compare_price,
            'charge_tax' => $request->charge_tax,
            'sale_channel' => $request->sale_channels,
            'vendor' => $request->vendor,
            'tags' => $request->tags,
            'images' => $path
        ]);

        return redirect('main/product');
    }

    function deleteproduct(Request $request)
    {
        $data = Product::find($request->id);
        Product::find($request->id)->delete();
        Storage::delete('public/' . $data->images);
        return redirect('main/product');
    }
}
