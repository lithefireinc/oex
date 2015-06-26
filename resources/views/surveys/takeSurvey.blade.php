@extends('app')

@section('content')

    <h1 class="page-heading">Evaluation of {!! $survey->faculty->ADVISER !!}</h1>

    <p style="white-space: pre-wrap; margin-bottom: 50px;"><b>Direction: </b>{{ $survey->instructions }}</p>
<div class="row">
    <div class="col-lg-12">
        @include ('errors.list')
            {!! Form::open(['url'=>'surveys/takeSurvey']) !!}

                <ol type="A">
                    @foreach( $questionCategory as $qc )
                        <h2><li>{!! $qc->description !!}</li></h2>
                        <ol>
                            @foreach( $qc->questions()->get() as $question )
                                <h3><li>{!! $question->question !!}</li></h3>
                                @include('partials.question')
                            @endforeach
                        </ol>
                    @endforeach
                </ol>


        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control b-create']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection