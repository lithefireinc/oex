@extends('app')
@section('content')

    <h1 class="page-heading">Surveys</h1>



    <a class="btn btn-primary b-create" href="{{ url('surveys/create') }}">Create New</a>

    <table id="surveys-table" class="table stripe order-column">
        <thead>
        <tr>
            <th></th>
            <th>Question Set</th>
            <th>Faculty</th>
            <th>Subject Details</th>
            <th>Expires</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>

    @unless(count($surveys))
        <p class="text-center">You haven't created any surveys yet!</p>
    @endunless



@stop
