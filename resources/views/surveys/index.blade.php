@extends('app')
@section('content')

    <h1 class="page-heading">Surveys</h1>

    <div class="pull-right">
        <a class="btn btn-primary b-create" href="{{ url('surveys/create') }}">Create New</a>
    </div>

    {{--<table class="table table-striped table-bordered">--}}

        {{--<thead>--}}
            {{--<th>Title</th>--}}
            {{--<th>Question Set</th>--}}
            {{--<th>Faculty</th>--}}
            {{--<th>Expires</th>--}}
            {{--<th>Actions</th>--}}
        {{--</thead>--}}

        {{--<tbody>--}}
            {{--@foreach($surveys as $survey)--}}
                {{--<tr>--}}
                    {{--<td>{{ $survey->title }}</td>--}}
                    {{--<td>{{ $survey->questionSet->description }}</td>--}}
                    {{--<td>{{ $survey->faculty->full_name}}</td>--}}
                    {{--<td>{{ $survey->expires->diffForHumans()}}</td>--}}
                    {{--<td align="center">--}}

                        {{--{!! Form::open(['method'=>'PATCH', 'url'=>'surveys/' . $survey->id]) !!}--}}
                            {{--<div class="form-group">--}}
                                {{--@if($survey->active == 1)--}}
                                {{--{!! Form::submit('Deactivate', array('class' => 'btn btn-danger')) !!}--}}
                                {{--@else--}}
                                {{--{!! Form::submit('Activate', array('class' => 'btn btn-success')) !!}--}}
                                {{--@endif--}}
                            {{--</div>--}}

                        {{--{!! Form::close() !!}--}}

                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
        {{--</tbody>--}}

    {{--</table>--}}


    <table id="surveys-table" class="table stripe order-column">
        <thead>
        <tr>
            <th></th>
            <th>Title</th>
            <th>Description</th>
            <th>Faculty</th>
            <th></th>
            <th></th>
            <th>Expires</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>

    @unless(count($surveys))
        <p class="text-center">You haven't created any surveys yet!</p>
    @endunless

@stop
