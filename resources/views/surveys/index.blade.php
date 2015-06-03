@extends('app')
@section('content')

    <h1 class="page-heading">Surveys</h1>



    <a class="btn btn-primary b-create" href="{{ url('surveys/create') }}">Create New</a>

    <table id="surveys-table" class="table stripe order-column">
        <thead>
        <tr>
            <th></th>
            <th>Title</th>
            <th>Description</th>
            <th>Faculty</th>
            <th></th>
            <th></th>
            <th>Expires</th>
            <th>Active</th>
        </tr>
        </thead>
    </table>

    @unless(count($surveys))
        <p class="text-center">You haven't created any surveys yet!</p>
    @endunless



@stop
