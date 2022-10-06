@extends('layout')
@section('title')
Permission
@endsection

@section('screen')
<header class="dashboard_head">
    <h1> Permissions </h1>
    @if (check('add permission'))
        <a class="button" href="{{ route('permission.add') }}" > Add Permission </a>
    @endif
</header>
<div class="container">
    <table id="user-table">
        <thead>
            <tr>
                <th> Permissions </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perm as $data)
                <tr>
                    <td> {{ $data->name }} </td>               
                    <td>
                    @if (check('edit permission'))
                        <a class="edit" href="{{ route('permission.update').'?id='. $data->id . '&name=' . $data->name }}"> Edit </a>
                    @endif

                    @if (check('delete permission'))
                        <a class="delete" onclick="return deleteConfirm()" href="{{ route('permission.delete').'?id='. $data->id }}"> Delete </a>
                    @endif
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="pagination">{{$perm->links()}}</div>
</div>
@endsection
@section('script')
<script>
    function deleteConfirm() {
        return confirm("Do you want to delete the record ?");
    }
</script>
@endsection