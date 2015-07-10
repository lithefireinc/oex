@extends('app')

@section('content')

    <h1 class="page-heading">Evaluation of {!! $survey->faculty->ADVISER !!}</h1>

    <p style="white-space: pre-wrap; margin-bottom: 50px;"><b>Direction: </b>{{ $survey->instructions }}</p>
<div class="row">
    <div class="col-lg-12">
        @include ('errors.list')
            {!! Form::open(['url'=>'surveys/takeSurvey']) !!}

            <ol type="A">
                @foreach( $question_categories as $question_category )
                    <h2><li>{!! $question_category->description !!}</li></h2>

                    @foreach( $question_category->questions()->orderBy('order')->get() as $key => $question )
                        <h3>
                            {!! $key+1 . '. ' . $question->question !!}
                            @include('partials.question')
                        </h3>
                    @endforeach

                @endforeach
            </ol>

        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control b-create']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection