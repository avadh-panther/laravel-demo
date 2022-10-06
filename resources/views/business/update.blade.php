@extends('layout')
@section('title')
Edit
@endsection

@section('screen')
<div class="head">
    <a href="{{ route('business') }}"> <i class="fas fa-arrow-alt-circle-left"></i> </a>
    <h1> Edit Business </h1>
</div>

<form action="{{ route('business.update.verify').'?id='.$data->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">
        Business Name :-
    </label>
    <div>
        <input class="field" type="text" name="name" id="name" value="{{ old('name') ? old('name') : $data->name  }}" placeholder="enter business name">
        <span class="formErr"> @error('name') {{$message}} @enderror </span>
    </div> <br>
    <label for="mail">
        Business E-mail :-
    </label>
    <div>
        <input class="field" type="email" name="email" id="mail" value="{{ old('email') ? old('email') : $data->email  }}" placeholder="enter business email">
        <span class="formErr"> @error('email') {{$message}} @enderror </span>
    </div> <br>
    <label for="address">
        Business Address :-
    </label>
    <div>
        <input class="field" type="text" name="address" id="address" value="{{ old('address') ? old('address') : $data->address  }}" placeholder="enter business address">
        <span class="formErr"> @error('address') {{$message}} @enderror </span>
    </div> <br>
    <input type="submit" value="Edit">
</form>
@endsection
