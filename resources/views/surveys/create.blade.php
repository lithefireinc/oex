@extends('app')

@section('content')

    <h1 class="page-heading">Create Survey</h1>

    {!! Form::open(['method' => 'GET', 'action' => 'SurveysController@store']) !!}

    <!-- Title Form Input -->
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Description Form Input -->
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Instructions Form Input -->
    <div class="form-group">
        {!! Form::label('Instructions', 'Instructions:') !!}
        {!! Form::text('Instructions', null, ['class' => 'form-control']) !!}
    </div>

    {{--question_set--}}

    {{--faculty--}}

    {{--start date - end date--}}

    <!-- 'Create Survey' Form Input -->
    <div class="form-group">
        {!! Form::submit('Create Survey', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    {{--@include ('errors.list')--}}

@endsection
