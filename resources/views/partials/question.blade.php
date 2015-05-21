<div>
    <h3>{!! $question->question !!}</h3>
    <hr/>

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
</div>