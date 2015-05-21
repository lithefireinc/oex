<div>
    <h3>{!! $question->question !!}</h3>
    <hr/>

    <div class="alert alert-info">
        <div class="form-inline">
            @foreach($choices as $choice)
            <label class="radio-inline">
                <input class="toggleBtn" type="radio" name="{!!$survey->code!!}X{!! $question->questionSet->id !!}X{!! $question->id !!}" value="{!! $choice !!}">{!!$choice!!}
            </label>

            @endforeach
        </div>
    </div>
</div>