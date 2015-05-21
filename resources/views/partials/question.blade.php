<div>
    <h3>{!! $question->question !!}</h3>
    <hr/>

    @if($question->questionType->question_type == 'Rate')
        <div class="alert alert-info">
            <div class="form-inline">
                @foreach($choices as $choice)
                    <label class="radio-inline">
                        {{--{!! Form::radio($fieldname.$question->id, Input::old($fieldname.$question->id) == $choice) !!} {!! $choice !!}--}}
                        <input type="radio" name="{!! $fieldname.$question->id !!}" value="{!! $choice !!}" @if(Input::old($fieldname.$question->id) == $choice) checked @endif>{!!$choice!!}
                    </label>
                @endforeach
            </div>
        </div>

    @elseif($question->questionType->question_type == 'Essay')
    <div class="alert alert-info">
        <div class="form-inline">
                <!-- Question_type Form Input -->
                <div class="form-group">
                    {!! Form::textarea('question_type', null, ['class' => 'form-control', 'size' => '128x10']) !!}
                </div>
        </div>
    </div>

    @endif


</div>