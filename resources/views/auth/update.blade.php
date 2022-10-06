@extends('layout')
@section('title')
Edit
@endsection

@section('screen')
<div class="head">
<a href="{{ route('users') }}"> <i class="fas fa-arrow-alt-circle-left"></i> </a>
<h1> Edit User </h1>
</div>

<form action="{{ route('users.update.verify').'?id='.$data->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="role" >
        Role :-
    </label>
    <div id="parent">
        <input class="field" type="text" name="role" id="role" placeholder="select role" value="{{old('role') ? old('role') : $data->role->name}}" autocomplete="off"/>
        <div id="dropdown">
            @foreach ($roles as $role)
                <p class="info"> {{ $role->name }} </p>
            @endforeach 
        </div>
        <div class="formErr"> @error('role') {{$message}} @enderror </div>
    </div>
    <br>
    <label for="name">
        Name :-
    </label>
    <div>
        <input class="field" type="text" name="name" id="name" value="{{ old('name') ? old('name') : $data->name  }}" placeholder="enter name">
        <span class="formErr"> @error('name') {{$message}} @enderror </span>
    </div> <br>
    <label for="email">
        E-mail :-
    </label>
    <div>
        <input class="field" type="email" name="email" id="email" value="{{ old('email') ? old('email') : $data->email  }}" placeholder="enter email">
        <span class="formErr"> @error('email') {{$message}} @enderror </span>
    </div> <br>
    <label for="mobile_no">
        Mobile No. :-
    </label>
    <div>
        <input class="field" type="text" name="mobile_no" id="mobile_no" value="{{ old('mobile_no') ? old('mobile_no') : $data->mobile_no  }}" placeholder="enter mobile no.">
        <span class="formErr"> @error('mobile_no') {{$message}} @enderror </span>
    </div> <br>
    <label for="username">
        Username :-
    </label>
    <div>
        <input class="field" type="text" name="username" id="username" value="{{ old('username') ? old('username') : $data->username  }}" placeholder="enter username">
        <span class="formErr"> @error('username') {{$message}} @enderror </span>
    </div> <br>
    <input type="submit" value="Edit">
</form>
@endsection
@section('script')
    <script>
        let input = document.getElementById('role');
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
