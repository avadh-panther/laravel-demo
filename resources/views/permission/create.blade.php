@extends('layout')
@section('title')
Create
@endsection

@section('screen')
<div class="head">
<a href="{{ route('permission') }}"> <i class="fas fa-arrow-alt-circle-left"></i> </a>
<h1> Add Permission </h1>
</div>

<form action="{{ route('permission.verify') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">
        Permission Name :-
    </label>
    <div>
        <input class="field" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="enter role name">
        <div class="formErr"> @error('name') {{$message}} @enderror </div>
    </div>
    <br>
    <input type="submit" value="Create">
</form>
@endsection