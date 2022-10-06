@extends('layout')

@section('title')
    E-mail
@endsection

@section('head')
    Compose E-mail
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"> <a href=""> Home </a></li>
    <li class="breadcrumb-item active">E-mail</li>
@endsection

@section('screen')
<section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Compose
              </h3>
            </div>
            <!-- /.card-header -->
            <form action="{{ route('email.send') }}" novalidate="novalidate" method = "POST" enctype="multipart/form-data" id="quickForm">
                @csrf
                <div class="card-body row">

                    <div class="form-group col-md-12">
                      <label for="subject">Subject :</label>
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject of mail" value="{{old('subject')}}">
                      <span class="text-danger"> @error('subject') {{$message}} @enderror </span>
                    </div>

                    <div class="form-group col-md-9">
                        <div>
                        <label>Template</label>
                        <select class="form-control select2" style="width: 100%;" onchange="loadDescription(this.value)">
                          <option selected="selected"> select </option>
                          @foreach ($template as $value)
                            <option> {{$value->name}} </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mt-3">
                        <label for="description"> Description </label>
                        <textarea class="form-control"  id="summernote" name="description" placeholder="add description"> {{ old('description') }} </textarea>
                        <span class="text-danger"> @error('description') {{$message}} @enderror </span>
                      </div>
                    </div>

                    <div class="form-group col-md-3 mt-3">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Store values</h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                              </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <div class="store_fields pl-1">name</div>
                                <div class="store_fields pl-1">domain</div>
                            </div>
                          </div>
                    </div>

                    <div class="form-group col-md-12">

                      <label> Store </label>
                      <select class="form-control select2" name="store[]" multiple="multiple" style="width: 100%;">
                        @foreach ($store as $value)
                          <option value="{{$value->name}}"> {{$value->name}} </option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info"> Send </button>
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
        });

        $(".select2").select2({
          placeholder: "select store", //placeholder
          tags: true,
          tokenSeparators: ['/',',',';'," "] 
        });

        // $('#quickForm').on("submit", function(e) {
        //         e.preventDefault();

        //         var form_data = new FormData(this);
        //         $.ajax({
        //             type: "POST",
        //             url: "http://lara-admin.test/email/send",
        //             cache: false,
        //             data: form_data,
        //             success: function(response) {
                        
        //             },
        //         });
        //     });

        function loadDescription(name){
            $.ajax({
                url: "http://lara-admin.test/email/template_description?name=" + name,
                datatype: "html",
                type: "get",
                success: function(response) {
                    $('#summernote').summernote("code", response);
                }
            });
        }

        $('.store_fields').on('dblclick', function(){
          $('#summernote').summernote('editor.saveRange');
          $('#summernote').summernote('editor.restoreRange');
          $('#summernote').summernote('editor.focus');
          $('#summernote').summernote("editor.insertText", '**' + $(this).text() + '**');
        })
    </script>
@endsection