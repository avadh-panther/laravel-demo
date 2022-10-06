@extends('layout')
@section('title')
Business
@endsection

@section('screen')
{{-- {{dd($business->links())}} --}}
<header class="dashboard_head">
    <h1> Business </h1>
    <a class="button" href="{{ route('business.add') }}" > Add business </a>
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
        @foreach ($business as $data)
            <tr>
                <td> {{ $data->name }} </td>
                <td> {{ $data->email }} </td>
                <td> {{ $data->address }} </td>
                <td> {{ $data->user_name }} </td>
                @if ($data->user_id == Auth::user()->id)                    
                <td> <a class="edit" href="{{route('business.update').'?id='. $data->id}}"> Edit </a>
                 <a class="delete" href="{{route('business.delete').'?id='. $data->id}}"> Delete </a> </td>
                @else
                <td>  </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">{{$business->links()}}</div>
</div>
@endsection