@extends('app')
@section('content')

    <h1 class="page-heading">Evaluation of {!! $survey->faculty->ADVISER !!} Results</h1>

    <div class="table_results_div">
    <table class="table_results" class="result_table table stripe">
        <thead>
        <tr>
        @foreach( $question_categories as $question_category )
                @foreach( $question_category->questions()->orderBy('order')->get() as $question )
                    <div class="table_result_row"> <th>
                        {{ $question->question }}
                        <div class="table_result_hidden"> {{ $question->question }} </div>
                    </th> </div>

                @endforeach
            @endforeach
        </tr>
        </thead>
        <tbody>
            @foreach( $results as $result )
                <tr>
                @foreach( $question_categories as $question_category )
                    @foreach( $question_category->questions()->orderBy('order')->get() as $question )
                        <?php $column_name = $field_name.$question_category->id.'X'.$question->id;?>
                        <div class="table_result_row"> <td>
                            {!! $result->$column_name !!}
                            <div class="table_result_hidden"> {!! $result->$column_name !!} </div>
                        </td> </div>
                    @endforeach
                @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

@stop