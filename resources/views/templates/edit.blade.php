@extends('layout')

@section('title')
    edit
@endsection

@section('head')
    Edit Template
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href=""> Home </a></li>
    <li class="breadcrumb-item"> <a href="{{route('template')}}"> Templates </a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('screen')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h3 class="card-title">
                    Form
                  </h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('template.edit.verify').'?id='.$data->id}}" novalidate="novalidate" method = "POST" enctype="multipart/form-data" id="quickForm">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="temp_name">Template Name :</label>
                            <input type="text" class="form-control" name="temp_name" id="temp_name" placeholder="Enter template name" value="{{old('temp_name')?old('temp_name'):$data->name}}">
                            <span class="text-danger"> @error('temp_name') {{$message}} @enderror </span>
                        </div>
                        <div class="form-group">
                            <label for="description"> Description </label>
                            <textarea class="form-control"  id="summernote" name="description" placeholder="add description" id="description"> {{old('description')?old('description'):$data->description}} </textarea>
                            <span class="text-danger"> @error('description') {{$message}} @enderror </span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
              </div>
            </div>
            <!-- /.col-->
          </div>
    </section>
@endsection

@section('script')
    <script>
        $(function () {
          $('#summernote').summernote()
        })
    </script>
@endsection