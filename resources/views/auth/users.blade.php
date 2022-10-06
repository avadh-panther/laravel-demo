@extends('layout')
@section('title')
Dashboard
@endsection

@section('screen')
<h1> Users </h1>
<div class="container">
    <table id="user-table">
        <thead>
            <tr>
                <th> Name </th>
                <th> Username </th>
                <th> Mobile no. </th>
                <th> E-mail </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allUser as $data)
                <tr>
                    <td> {{ $data->name }} </td>
                    <td> {{ $data->username }} </td>
                    <td> {{ $data->mobile_no }} </td>
                    <td> {{ $data->email }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">{{$allUser->links()}}</div>
</div>
@endsection