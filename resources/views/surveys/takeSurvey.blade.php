@extends('app')

@section('content')

    <h1 class="page-heading">Evaluation of {!! $survey->faculty->full_name !!}</h1>

    <p style="white-space: pre-wrap; margin-bottom: 50px;"><b>Direction: </b>{{ $survey->instructions }}</p>

    <table class="table table-striped table-bordered">
        <tbody>
            {!! Form::open(['url'=>'surveys/takeSurvey']) !!}
                @foreach( $questions as $question )
                <tr>
                    <td>{{ $question->order }}</td>
                    <td>{{ $question->question }}</td>
                    <td>
                    <div class="form-group">
                    {!! Form::select('choices[]', $choices, null, ['class' => 'form-control']) !!}
                    </div>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>

    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

@endsection