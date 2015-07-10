@extends('app')

@section('content')
<div id="create-survey">
    <h1 class="page-heading">Create Survey</h1>

    @include ('errors.errors')

    {!! Form::open(['url'=>'surveys', 'v-on'=>'submit: createSurvey']) !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="title">Title: </label>
                    <input type="text" name="title" id="title" class="form-control" v-model="survey.title"/>
                </div>
                <div class="form-group">
                    <label for="description">Description: </label>
                    <input type="text" name="description" id="description" class="form-control" v-model="survey.description"/>
                </div>
                <div class="form-group">
                    <label for="instructions">Instructions: </label>
                    <textarea name="instructions" id="instructions" class="form-control" v-model="survey.instructions" rows="10">
                    </textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="question_set_id">Question Set: </label>
                            <select name="question_set_id" id="question_set_id" class="form-control" v-model="survey.question_set_id" options="questionSets">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="faculty_id">Faculty: </label>
                            <select name="faculty_id" id="faculty_id" class="form-control" v-model="survey.faculty_id" options="faculties">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="schedule_id">Subject: </label>
                            <select name="schedule_id" id="schedule_id" class="form-control" v-model="survey.schedule_id" options="schedules">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('start_date', 'Start Date:') !!}
                            <div class='input-group date' id='start' v-datetimepicker="survey.start_date">
                                <input type="text" class="form-control"/>
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- Expires Form Input -->
                        <div class="form-group">
                            {!! Form::label('start_date', 'Expires:') !!}
                            <div class='input-group date' id='end' v-datetimepicker="survey.expires">
                                {!! Form::text('expires', null, ['class' => 'form-control']) !!}
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Per Page Form Input -->
                        <div class="form-group">
                            {!! Form::label('per_page', 'Questions Per Page:') !!}
                            {!! Form::input('number','per_page', 10, ['class' => 'form-control', 'v-model'=>'survey.per_page', 'number']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::submit('Create Survey', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        <!-- Start_date Form Input -->
            <div class="col-sm-6">
                <div class="panel panel-default panel-fullheight">
                    <div class="panel-heading">
                        <h3 class="panel-title">Subject Details</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Schedule:</strong> @{{ subjDetails.DAYS }} @{{ subjDetails.TIME }}
                            </li>
                            <li class="list-group-item">
                                <strong>Room:</strong> @{{ subjDetails.ROOM }}
                            </li>
                            <li class="list-group-item">
                                <strong>Course:</strong> @{{ subjDetails.COURSE }}
                            </li>
                            <li class="list-group-item">
                                <strong>Section:</strong> @{{ subjDetails.SECTION }}
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- 'Create Survey' Form Input -->

    {!! Form::close() !!}
</div>

@endsection
@section('scripts')
    <script src="{{ asset('js/vue/survey.js') }}"></script>
@endsection