@extends('layout')

@section('title')
    Template
@endsection

@section('head')
    Templates
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Templates</li>
@endsection

@section('screen')
    <section class="content">
        <div class="card">

            {{-- -----------------------------------Card head-------------------------------------- --}}

            <div class="card-header">
                <h3 class="card-title mt-2">Templates</h3>
                <div class="card-tools mt-1">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <div class="card-tools mr-1">
                    <a href="{{route('template.add')}}" type="button" class="btn btn-block bg-gradient-success">Add Template</a>
                </div>
            </div>

            {{-- -----------------------------------Card head-------------------------------------- --}}

            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Template Name
                            </th>
                            <th style="width: 60%">
                                Description
                            </th>
                            <th style="width: 20%">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbody_template">
                        @foreach ($data as $index => $value)
                        <tr>
                            <td> {{$index + 1}} </td>
                            <td> {{$value->name}} </td>
                            <td class="wrap" > {!! $value->description !!} </td>
                            <td class="project-actions text-left">
                                <a class="btn btn-primary btn-sm" href="{{route('template.edit').'?id='.$value->id}}"> <i class="fas fa-pencil-alt"> </i> Edit </a>
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
<script src="{{asset('myjs/template.js')}}"></script>
@endsection