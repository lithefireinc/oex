@extends('app')

@section('content')

    <h1 class="page-heading">Evaluation of {!! $survey->faculty->full_name !!}</h1>

    <p style="white-space: pre-wrap; margin-bottom: 50px;"><b>Direction: </b>{{ $survey->instructions }}</p>


            {!! Form::open(['url'=>'surveys/takeSurvey']) !!}
        <ol>
                    @foreach( $questions as $question )
                        <li>@include('partials.question')</li>
                    @endforeach
        </ol>

    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

@endsection