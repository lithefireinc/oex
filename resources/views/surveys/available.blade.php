@extends('app')
@section('content')

    <h1 class="page-heading">Active Evaluations</h1>

    <table class="table table-striped table-bordered">

        <thead>
        <th>Faculty</th>
        <th>Duration</th>
        <th>Actions</th>
        </thead>

        <tbody>
        @foreach($surveys as $survey)
            <tr>
                <td>{{ $survey->faculty->full_name}}</td>
                <td>{!! $survey->start_date->toDayDateTimeString() !!}-<br/>{!! $survey->expires->toDayDateTimeString() !!}</td>
                <td>
                    <a class="btn btn-success" href="{{ action('SurveysController@takeSurvey', [$survey]) }}">Evaluate</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    @unless(count($surveys))
        <p class="text-center">There are no active evaluations!</p>
    @endunless

@stop
