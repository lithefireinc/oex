@extends('app')

@section('content')

    <h1 class="page-heading">Create Survey</h1>

    {!! Form::open(['url'=>'surveys']) !!}

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
        {!! Form::label('instructions', 'Instructions:') !!}
        {!! Form::textarea('instructions', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('question_set_id', 'Question Set:') !!}
        {!! Form::select('question_set_id', $questionSet, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('faculty_id', 'Faculty Id:') !!}
        {!! Form::select('faculty_id', $faculty, null, ['class' => 'form-control']) !!}
    </div>

    <!-- Start_date Form Input -->
    <div class="form-group">
        {!! Form::label('start_date', 'Start Date:') !!}
        {!! Form::input('date', 'start_date', date('Y-m-d'), ['class' => 'form-control']) !!}
    </div>

    <!-- Expires Form Input -->
    <div class="form-group">
        {!! Form::label('expires', 'End Date:') !!}
        {!! Form::input('date', 'expires', date('Y-m-d'), ['class' => 'form-control']) !!}
    </div>

    <!-- 'Create Survey' Form Input -->
    <div class="form-group">
        {!! Form::submit('Create Survey', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    @include ('errors.list')

@endsection
