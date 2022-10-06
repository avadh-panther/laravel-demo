@extends('layout')
@section('title')
location
@endsection

@section('screen')
<header class="dashboard_head">
    <h1> Business Locations </h1>
    <a class="button" href="{{ route('location.add') }}" > Add location </a>
</header>
<div class="container">
    <table id="user-table">
        <thead>
            <tr>
                <th> Name </th>
                <th> E-mail </th>
                <th> Address </th>
                <th> User </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($location as $data)
                <tr>
                    <td> {{ $data->name }} </td>
                    <td> {{ $data->email }} </td>
                    <td> {{ $data->address }} </td>
                    <td> {{ $data->businessdata->user_name }} </td>
                    @if ($data->businessdata->user_id == Auth::user()->id)                    
                    <td> <a class="edit" href="{{route('location.update').'?id='. $data->id}}"> Edit </a>
                     <a class="delete" href="{{route('location.delete').'?id='. $data->id}}"> Delete </a> </td>                                             
                    @else
                    <td>  </td>
                    @endif 
                </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="pagination">{{$location->links()}}</div>
</div>
@endsection