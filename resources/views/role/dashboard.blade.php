@extends('layout')
@section('title')
Roles
@endsection

@section('screen')
<header class="dashboard_head">
    <h1> Roles </h1>
    @if (check('add role'))
        <a class="button" href="{{ route('role.add') }}" > Add role </a>
    @endif
</header>
<div class="container">
    <table id="user-table">
        <thead>
            <tr>
                <th> Roles </th>
                <th> Permissions </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $data)
                <tr>
                    <td> {{ $data->name }} </td>
                    <td class="wrap">
                    @foreach ($data->permissions as $item)
                        {{ $item->name }},
                    @endforeach
                    </td>               
                    <td>
                    @if (check('edit role'))
                        <a class="edit" href="{{ route('role.update').'?id='. $data->id . '&name=' . $data->name }}"> Edit </a>
                    @endif

                    @if (check('delete role'))
                        <a class="delete" onclick="return deleteConfirm()" href="{{ route('role.delete').'?id='. $data->id }}"> Delete </a>
                    @endif
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="pagination">{{$roles->links()}}</div>
</div>
@endsection
@section('script')
<script>
    function deleteConfirm() {
        return confirm("Do you want to delete the record ?");
    }
</script>
@endsection
