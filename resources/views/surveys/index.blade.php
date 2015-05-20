@extends('app')
@section('content')

    <h1 class="page-heading">Surveys</h1>

    <div class="pull-right">
        <a class="btn btn-primary" href="{{ url('surveys/create') }}">Create New</a>
    </div>

    <table class="table table-striped table-bordered">

        <thead>
            <th>Title</th>
            <th>Question Set</th>
            <th>Faculty</th>
            <th>Active until</th>
        </thead>

        <tbody>
            @foreach($surveys as $survey)
                <tr>
                    <td>{{ $survey->title }}</td>
                    <td>{{ $survey->questionSet->description }}</td>
                    <td>{{ $survey->faculty->fullName}}</td>
                    <td>{{ $survey->expires->diffForHumans()}}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

    @unless(count($surveys))
        <p class="text-center">You haven't created any surveys yet!</p>
    @endunless

@stop
