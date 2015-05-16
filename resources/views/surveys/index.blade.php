@extends('app')
@section('content')

    <h1 class="page-heading">Surveys</h1>

    <table class="table table-striped table-bordered">

        <thead>
            <th>Title:</th>
            <th>Question Set:</th>
            <th>Faculty:</th>
            <th>Duration:</th>
        </thead>

        <tbody>
            @foreach($surveys as $survey)
                <tr>
                    <td>{{ $survey->title }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

    @unless(count($surveys))
        <p class="text-center">You haven't add any surveys yet!</p>
    @endunless

@stop
