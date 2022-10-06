@extends('layout')
@section('title')
Create
@endsection

@section('screen')
<div class="head">
<a href="{{ route('role') }}"> <i class="fas fa-arrow-alt-circle-left"></i> </a>
<h1> Add Role </h1>
</div>

<form action="{{ route('role.verify') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">
        Role Name :-
    </label>
    <div>
        <input class="field" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="enter role name">
        <div class="formErr"> @error('name') {{$message}} @enderror </div>
    </div>
    <br>
    <div class="divAll"> 
        <label class="switch" id="test">
            <input class="check_box" type="checkbox" name="permissions[]" id="all"/>
            <span class="slider round"></span>
        </label> &nbsp
        <span id="containt"> Select all </span>
    </div> <br>
    <div class="check-container">
        @foreach ($perm as $data) 
            <div>  
                <label class="switch">
                    <input class="check_box box" type="checkbox" name="permissions[]" value="{{ $data->id }}" {{-- old('permissions')?  (in_array($data->name, old('permissions')) ? 'checked' : '') : '' --}}>
                    <span class="slider round"></span>
                </label> &nbsp
                <span> {{$data->name}} </span>
            </div>
        @endforeach
    </div> <br>
    <input type="submit" value="Create">
</form>
@endsection
@section('script')
<script>
    let all = document.getElementById('all');
    let test = document.getElementById('test');
    let containt = document.getElementById('containt');
    let box = document.getElementsByClassName('box');

    function allCheck(){
        if(all.checked == true){
            for (let i = 0; i < box.length; i++) {
                box[i].setAttribute('checked', true);                    
            }
        }else{
            for (let i = 0; i < box.length; i++) {
                box[i].removeAttribute("checked");                   
            } 
        }

        if(all.checked == true){
            containt.innerText = "Deselect all";
        }else{
            containt.innerText = "Select all";
        }
    }

    (function() {
        test.addEventListener("click", function () {
            allCheck();
        });
    })();
</script>
@endsection
