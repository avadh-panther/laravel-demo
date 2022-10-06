@extends('layout')

@section('title')
    Store
@endsection

@section('head')
    Stores
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Stores</li>
@endsection

@section('screen')
    <section class="content scrolling-pagination"> 
        @csrf 
        {{-- class="scrolling-pagination" --}}
        <div class="card">

            {{-- -----------------------------------Card head-------------------------------------- --}}

            <div class="card-header">
                <h3 class="card-title mt-2">Stores</h3>
                <div class="card-tools mt-1">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <div class="card-tools mr-1">
                    <a href="{{route('store.add')}}" type="button" class="btn btn-block bg-gradient-success">Create Store</a>
                </div>
            </div>

            {{-- -----------------------------------Card head-------------------------------------- --}}
        
            <div class="card-header row">
                {{-- search --}}
                <div class="input-group col-md-2">
                    <input type="text" id="myInput" name="input1" class="form-control form-control-sm" placeholder="Type your keywords here">
                    <div class="input-group-append">
                    <button class="btn btn-sm btn-default">
                    <i class="fa fa-search"></i>
                    </button>
                    </div>
                </div>
                {{-- date picker --}}
                <div class="input-group col-md-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                    </span>
                    </div>
                    <input type="text" class="form-control form-control-sm float-right" id="reservation">
                    <div class="input-group-append">
                        <button type="button" onclick="filter_date()" class="btn btn-sm btn-info"> Find </button>
                    </div>
                </div>
                {{-- data search --}}
                <div class="col-md-2">
                    <select class="form-control form-control-sm select2" onchange="filter_data()" id="json_data" name="json_data[]" multiple="multiple" style="width: 100%;">
                        <option value="test"> Test </option>
                        <option value="try"> Try </option>
                    </select>
                </div>

                <div class="col-md-2" style="text-align: right;">
                    <a type="button" href="{{ route('store') }}" id="filter_btn" class="d-none btn btn-sm btn-danger">Remove filter</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 10%">
                                Store Name
                            </th>
                            <th style="width: 20%">
                                Domain
                            </th>
                            <th style="width: 20%">
                                Email
                            </th>
                            <th style="width: 15%">
                                timezone
                            </th>
                            <th style="width: 15%">
                                Data
                            </th>
                            <th style="width: 20%">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbody_store">
                        @foreach ($data as $index => $value)
                        <tr>
                            <td> {{$index + 1}} </td>
                            <td> {{$value->name}} </td>
                            <td> {{$value->domain}} </td>
                            <td> {{$value->email}} </td>
                            <td> {{$value->timezone}} </td>
                            <td> @if ($value->json_data != null) @foreach ($value->json_data as $val) {{ $val .','}} @endforeach @endif </td>
                            <td class="project-actions text-left">
                                <a class="btn btn-primary btn-sm" href="{{route('store.edit').'?id='.$value->id}}"> <i class="fas fa-pencil-alt"> </i> Edit </a>
                                <button class="btn btn-danger btn-sm" onclick="sweet_del('{{$value->id}}')" id="del"> <i class="fas fa-trash"> </i> Delete </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </section>
@endsection
@section('script')
<script>
    $("#reservation").daterangepicker({
    locale: { format: "YYYY/MM/DD" },
});

$(".select2").select2({
    placeholder: "select data", //placeholder
    tags: true,
    tokenSeparators: ["/", ",", ";", " "],
});
</script>
<script src="{{ asset('myjs/store.js') }}"></script>
@endsection