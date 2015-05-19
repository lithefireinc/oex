@extends('app')

@section('content')

    <h1 class="page-heading">Take Survey</h1>
<ol>
    {!! Form::open() !!}
        @foreach( $questions as $question )
        <li>
            {{--<div class="form-group">--}}
                {{ $question->title }}
                {!! Form::label('choices', 'Choice:') !!}
                {!! Form::select('choices[]', $choices) !!}
            {{--</div>--}}
        </li>
        @endforeach

</ol>
    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control',]) !!}
    </div>
    {!! Form::close() !!}
@endsection