@extends('layout')
@section('title')
Business
@endsection

@section('screen')
<header class="dashboard_head">
    <h1> Business </h1>
    @if (check('add business'))
        <a class="button" href="{{ route('business.add') }}" > Add business </a>
    @endif
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
                <td>
                @if (check('edit business'))
                    <a class="edit" href="{{route('business.update').'?id='. $data->id}}"> Edit </a>
                @endif

                @if (check('delete business'))
                    <a class="delete" onclick="return deleteConfirm()" href="{{route('business.delete').'?id='. $data->id}}"> Delete </a> 
                @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">{{$business->links()}}</div>
</div>
@endsection
@section('script')
<script>
    function deleteConfirm() {
        return confirm("Do you want to delete the record ?");
    }
</script>
@endsection