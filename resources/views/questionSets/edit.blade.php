@extends('app')
@section('content')

    <div id="create-questionSet">
        <h1 class="page-heading">Edit Question Set</h1>

        @include ('errors.errors')

        {!! Form::model($questionSet, [
            'method' => 'PATCH',
            'route'=> ['questionSets.update', $questionSet->id]
        ]) !!}
        <div class="row">
            <div class="col-sm-12">
                <!-- Description Form Input -->
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::text('description', $questionSet->description, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('questions', 'Questions:') !!}
                    {!! $datatables->table() !!}
                    {!! $datatables->scripts() !!}
                </div>
                <div class="form-group col-sm-6 col-sm-offset-3">
                    {!! Form::submit('Update Question Set', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}

        </div>



@endsection