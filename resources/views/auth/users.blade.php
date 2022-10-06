@extends('layout')
@section('title')
Users
@endsection

@section('screen')
<header class="dashboard_head">
    <h1> Users </h1>
    @if (check('add user'))
        <a class="button" href="{{ route('users.add') }}" > Add user </a>
    @endif
</header>
<div class="container">
    <table id="user-table">
        <thead>
            <tr>
                <th> Name </th>
                <th> Username </th>
                <th> Mobile no. </th>
                <th> E-mail </th>
                <th> Role </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allUser as $data)
                <tr>
                    <td> {{ $data->name }} </td>
                    <td> {{ $data->username }} </td>
                    <td> {{ $data->mobile_no }} </td>
                    <td> {{ $data->email }} </td>
                    <td> {{ $data->role->name }} </td>
                    <td> 
                    @if (check('edit user') && Auth::user()->id != $data->id)
                        <a class="edit" href="{{route('users.update').'?id='. $data->id}}"> Edit </a>
                    @endif

                    @if (check('delete user') && Auth::user()->id != $data->id)
                        <a class="delete" onclick="return deleteConfirm()" href="{{route('users.delete').'?id='. $data->id}}"> Delete </a> 
                    @endif
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">{{$allUser->links()}}</div>
</div>
@endsection
@section('script')
<script>
    function deleteConfirm() {
        return confirm("Do you want to delete the record ?");
    }
</script>
@endsection