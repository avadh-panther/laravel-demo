@extends('layout')
@section('title')
Edit
@endsection

@section('screen')
<div class="head">
<a href="{{ route('role') }}"> <i class="fas fa-arrow-alt-circle-left"></i> </a>
<h1> Edit Role </h1>
</div>

<form action="{{ route('role.update.verify').'?role_id='.$request->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">
        Role Name :-
    </label>
    <div>
        <input class="field" type="text" name="name" id="name" value="{{ $request->name }}" placeholder="enter role name">
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
                <input class="check_box box" type="checkbox" name="permissions[]" value="{{ $data->id }}" {{ in_array($data->id, $arr)? 'checked' : '' }}/>
                <span class="slider round"></span>
            </label> &nbsp
            <span> {{$data->name}} </span>
        </div>
        @endforeach
    </div> <br>
    <input type="submit" value="Edit">
</form>
@endsection
@section('script')
<script>
    let all = document.getElementById('all');
    let test = document.getElementById('test');
    let containt = document.getElementById('containt');
    let box = document.getElementsByClassName('box');
    let arr = [];

    function allCheck(){
        console.log('-----------------');
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

    function checkVal() {
        for (let i = 0; i < box.length; i++) {
            if (box[i].checked == true){
                arr.push(true);
            }
        }
        if(arr.length == box.length){
            all.checked = true;
            containt.innerText = "Deselect all";
        }
    }

    (function() {
        checkVal();
        test.addEventListener("click", function () {
            allCheck();
        });
    })();

</script>
@endsection