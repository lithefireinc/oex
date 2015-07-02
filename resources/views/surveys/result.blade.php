@extends('app')
@section('content')

    <h1 class="page-heading">Evaluation of {!! $survey->faculty->ADVISER !!} Results</h1>
    <div class="table_results_wrapper">
    <table class="table table-striped table-bordered table_results">
        <thead>
            <th>Questions</th>
            <?php $count = 1; ?>
            @foreach( $results as $result )
                <th>Respondent {!! $count !!}</th>
            <?php $count++; ?>
        @endforeach
        </thead>
        <tbody>
            @foreach( $question_categories as $question_category ) @foreach( $question_category->questions()->orderBy('order')->get() as $question )
                <tr>
                    <td>
                        {!! $question->question !!}
                    </td>
                    @foreach( $results as $result )
                        <td>
                            <?php $column_name = $field_name.$question->id;?>
                            {!! $result->$column_name !!}
                        </td>
                    @endforeach
                </tr>
            @endforeach @endforeach
        </tbody>
    </table>
    </div>

@stop