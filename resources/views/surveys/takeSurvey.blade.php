@extends('app')

@section('content')

    <h1 class="page-heading">Evaluation of {!! $survey->faculty->full_name !!}</h1>

    <p style="white-space: pre-wrap; margin-bottom: 50px;"><b>Direction: </b>{{ $survey->instructions }}</p>

    @include ('errors.list')
            {!! Form::open(['url'=>'surveys/takeSurvey']) !!}
        <ol>
                    @foreach( $questions as $question )
                        <li>@include('partials.question')</li>
                    @endforeach
        </ol>

    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control b-create']) !!}

    {!! Form::close() !!}

@endsection