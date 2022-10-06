@extends('layout')
@section('title')
Edit
@endsection

@section('screen')
<div class="head">
<a href="{{ route('location') }}"> <i class="fas fa-arrow-alt-circle-left"></i> </a>
<h1> Edit Business Location </h1>
</div>

<form action="{{ route('location.update.verify').'?id='.$data->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">
        Location Name :-
    </label>
    <div>
        <input class="field" type="text" name="name" id="name" value="{{ old('name') ? old('name') : $data->name  }}" placeholder="enter location name">
        <span class="formErr"> @error('name') {{$message}} @enderror </span>
    </div> <br>
    <label for="mail">
        Location E-mail :-
    </label>
    <div>
        <input class="field" type="email" name="mail" id="mail" value="{{ old('mail') ? old('mail') : $data->email  }}" placeholder="enter location email">
        <span class="formErr"> @error('mail') {{$message}} @enderror </span>
    </div> <br>
    <label for="address">
        Location Address :-
    </label>
    <div>
        <input class="field" type="text" name="address" id="address" value="{{ old('address') ? old('address') : $data->address  }}" placeholder="enter location address">
        <span class="formErr"> @error('address') {{$message}} @enderror </span>
    </div> <br>
    <input type="submit" value="Edit">
</form>
@endsection
