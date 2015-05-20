@extends('app')

@section('content')

    <h1 class="page-heading">Create Survey</h1>

    {!! Form::open(['url'=>'surveys']) !!}
<div class="row">
    <div class="col-sm-12">
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
            {!! Form::select('faculty_id', $faculty, null, ['class' => 'form-control select2']) !!}
        </div>
    </div>
</div>
<div class="row">
    <!-- Start_date Form Input -->
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('start_date', 'Start Date:') !!}
            <div class='input-group date' id='start'>
                {!! Form::text('start_date', null, ['class' => 'form-control']) !!}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <!-- Expires Form Input -->
        <div class="form-group">
            {!! Form::label('start_date', 'Start Date:') !!}
            <div class='input-group date' id='end'>
                {!! Form::text('expires', null, ['class' => 'form-control']) !!}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
            </div>
        </div>
    </div>
</div>
    <!-- 'Create Survey' Form Input -->
    <div class="form-group">
        {!! Form::submit('Create Survey', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    @include ('errors.list')

@endsection
