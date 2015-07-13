@extends('app')

@section('content')
<div id="create-questionSet">
    <h1 class="page-heading">Create Question Set</h1>

    @include ('errors.errors')

    {!! Form::open(['url'=>'questionSets']) !!}
        <div class="row">
            <div class="col-sm-12">
                <!-- Description Form Input -->
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Create Question Set', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
    {!! Form::close() !!}

</div>

@endsection