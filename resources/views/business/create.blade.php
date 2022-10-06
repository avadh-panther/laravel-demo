@extends('layout')
@section('title')
Create
@endsection

@section('screen')
<div class="head">
<a href="{{ route('business') }}"> <i class="fas fa-arrow-alt-circle-left"></i> </a>
<h1> Create Business </h1>
</div>

<form action="{{ route('business.verify') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">
        Business Name :-
    </label>
    <div>
        <input class="field" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="enter business name">
        <span class="formErr"> @error('name') {{$message}} @enderror </span>
    </div> <br>
    <label for="mail">
        Business E-mail :-
    </label>
    <div>
        <input class="field" type="email" name="mail" id="mail" value="{{ old('mail') }}" placeholder="enter business email">
        <span class="formErr"> @error('mail') {{$message}} @enderror </span>
    </div> <br>
    <label for="address">
        Business Address :-
    </label>
    <div>
        <input class="field" type="text" name="address" id="address" value="{{ old('address') }}" placeholder="enter business address">
        <span class="formErr"> @error('address') {{$message}} @enderror </span>
    </div> <br>
    <input type="submit" value="Create">
</form>
@endsection
