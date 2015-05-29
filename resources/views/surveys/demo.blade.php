@extends('app')
@section('content')

    <h1 class="page-heading">Surveys</h1>

    <div class="pull-right">
        <a class="btn btn-primary b-create" href="{{ url('surveys/create') }}">Create New</a>
    </div>

    <table id="surveys-table" class="table table-condensed">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Faculty</th>
                <th></th>
                <th></th>
                <th>Expires</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>

@stop
