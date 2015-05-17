@extends('app')
@section('content')

    <h1 class="page-heading">Surveys</h1>

    <table class="table table-striped table-bordered">

        <thead>
        <th>Title</th>
        <th>Question Set</th>
        <th>Faculty</th>
        <th>Duration</th>
        <th>Action</th>
        </thead>

        <tbody>
        @foreach($surveys as $survey)
            <tr>
                <td>{{ $survey->title }}</td>
                <td>{{ $survey->questionSet->description }}</td>
                <td>{{ $survey->faculty->last_name.', '.$survey->faculty->last_name.' '.$survey->faculty->middle_name}}</td>
                <td>{{ date('F d, Y', strtotime($survey->start_date)) .' - '. date('F d, Y', strtotime($survey->expires))}}</td>
                <td>
                    <a class="btn btn-success" href="{{ action('SurveysController@takeSurvey', [$survey]) }}">Take Survey</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    @unless(count($surveys))
        <p class="text-center">There are no active surveys!</p>
    @endunless

@stop
