@extends('layout')
@section('title')
Edit
@endsection

@section('screen')
<div class="head">
<a href="{{ route('permission') }}"> <i class="fas fa-arrow-alt-circle-left"></i> </a>
<h1> Edit Permission </h1>
</div>

<form action="{{ route('permission.update.verify').'?id='.$request->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">
        Permission Name :-
    </label>
    <div>
        <input class="field" type="text" name="name" id="name" value="{{ $request->name }}" placeholder="enter permission name">
        <div class="formErr"> @error('name') {{$message}} @enderror </div>
    </div>
    <br>
    <input type="submit" value="Edit">
</form>
@endsection