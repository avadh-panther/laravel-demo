@extends('layout')

@section('title')
    Create
@endsection

@section('head')
    Create Store
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href=""> Home </a></li>
    <li class="breadcrumb-item"> <a href="{{route('store')}}"> Stores </a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('screen')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h3 class="card-title">
                    Create
                  </h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('store.add.verify') }}" novalidate="novalidate" method = "POST" enctype="multipart/form-data" id="quickForm">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"> Name :</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{old('name')}}">
                            <span class="text-danger"> @error('name') {{$message}} @enderror </span>
                        </div>
                        <div class="form-group">
                            <label for="domain"> Domain : </label>
                            <input type="text" class="form-control" name="domain" id="domain" placeholder="Enter domain" value="{{old('domain')}}">
                            <span class="text-danger"> @error('domain') {{$message}} @enderror </span>
                        </div>
                        <div class="form-group">
                            <label for="email"> E-mail :</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value="{{old('email')}}">
                            <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                        </div>
                        <div class="form-group d-inline-flex">
                            <div class="custom-control custom-switch mr-3">
                              <input type="checkbox" class="custom-control-input" name="json[]" value="try" id="customSwitch1" {{old('json')? (in_array('try' ,old('json'))? 'checked' : '' ): ''}} />
                              <label class="custom-control-label" for="customSwitch1">Try</label>
                            </div>
                            <div class="custom-control custom-switch mr-3">
                                <input type="checkbox" class="custom-control-input" name="json[]" value="test" id="customSwitch2" {{old('json')? (in_array('test' ,old('json'))? 'checked' : '' ): ''}} />
                                <label class="custom-control-label" for="customSwitch2">Test</label>
                            </div>
                            <span class="text-danger"> @error('json') {{$message}} @enderror </span>
                        </div>
                        <div class="form-group">
                            <label for="password"> Password :</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" value="{{old('password')}}">
                            <span class="text-danger"> @error('password') {{$message}} @enderror </span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password"> Confirm Password :</label>
                            <input type="text" class="form-control" name="confirm_password" id="confirm_password" placeholder="Renter password" value="{{old('confirm_password')}}">
                            <span class="text-danger"> @error('confirm_password') {{$message}} @enderror </span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Create</button>
                        <a type="button" href="{{route('store')}}" class="btn btn-danger">Cancle</a>
                    </div>
                </form>
              </div>
            </div>
            <!-- /.col-->
          </div>
    </section>
@endsection