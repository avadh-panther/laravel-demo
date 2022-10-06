@extends('layout')
@section('title')
Create
@endsection

@section('screen')
<div class="head">
<a href="{{ route('location') }}"> <i class="fas fa-arrow-alt-circle-left"></i> </a>
<h1> Add Business Location </h1>
</div>

<form action="{{ route('location.verify') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="business" >
        Business :-
    </label>
    <div id="parent">
        <input class="field" type="text" name="business" id="business" placeholder="select business" value="" autocomplete="off"/>
        <div id="dropdown">
            @foreach ($business as $data)
                <p class="info"> {{ $data->name }} </p>
            @endforeach 
        </div>
        <div class="formErr"> @error('business') {{$message}} @enderror </div>
    </div>
    <br>
    <label for="name">
        Location Name :-
    </label>
    <div>
        <input class="field" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="enter location name">
        <div class="formErr"> @error('name') {{$message}} @enderror </div>
    </div>
    <br>
    <label for="mail">
        Location E-mail :-
    </label>
    <div>
        <input class="field" type="email" name="mail" id="mail" value="{{ old('mail') }}" placeholder="enter location email">
        <div class="formErr"> @error('mail') {{$message}} @enderror </div>
    </div>
    <br>
    <label for="address">
        Location Address :-
    </label>
    <div>
        <input class="field" type="text" name="address" id="address" value="{{ old('address') }}" placeholder="enter location address">
        <div class="formErr"> @error('address') {{$message}} @enderror </div>
    </div> <br>
    <input type="submit" value="Create">
</form>
@endsection
@section('script')
    <script>
        let input = document.getElementById('business');
        let dropdown = document.getElementById('dropdown');
        let info = document.getElementsByClassName('info');
        
        input.addEventListener("click", function () {
            dropdown.style.display = 'block';
        });

        for (let j = 0; j < info.length; j++) {
            info[j].addEventListener("click", function () {
                input.value = info[j].innerText;
                dropdown.style.display = 'none';
            });
        }
        
        dropdown.addEventListener('mouseleave', function(){
            dropdown.style.display = 'none';
        });
    </script>
@endsection