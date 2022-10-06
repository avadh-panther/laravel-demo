@extends('layout')
@section('title')
location
@endsection

@section('screen')
<header class="dashboard_head">
    <h1> Business Locations </h1>
    @if (check('add location'))
        <a class="button" href="{{ route('location.add') }}" > Add location </a>
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
            @foreach ($location as $data)
                <tr>
                    <td> {{ $data->name }} </td>
                    <td> {{ $data->email }} </td>
                    <td> {{ $data->address }} </td>
                    <td> {{ $data->businessdata->user_name }} </td>                  
                    <td>
                    @if (check('edit location'))
                        <a class="edit" href="{{route('location.update').'?id='. $data->id}}"> Edit </a>
                    @endif

                    @if (check('delete location'))
                        <a class="delete" onclick="return deleteConfirm()" href="{{route('location.delete').'?id='. $data->id}}"> Delete </a>
                    @endif
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="pagination">{{$location->links()}}</div>
</div>
@endsection
@section('script')
<script>
    function deleteConfirm() {
        return confirm("Do you want to delete the record ?");
    }
</script>
@endsection