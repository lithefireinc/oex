@extends('app')
@section('content')

    <h1 class="page-heading">Evaluation of {!! $survey->faculty->ADVISER !!} Results</h1>
    @if(count($results))
    <div class="outer">
        <div class="inner">
            <table class="table table-striped table-bordered table_survey_results">
                <thead>
                <th>Questions</th>
                <?php $count = 1; ?>
                @foreach( $results as $result )
                    <td>Respondent {!! $count !!}</td>
                    <?php $count++; ?>
                @endforeach
                </thead>
                <tbody>
                @foreach( $question_categories as $question_category ) @foreach( $question_category->questions()->orderBy('order')->get() as $question )
                    <tr>
                        <th>
                            {!! $question->question !!}
                        </th>
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
    </div>
    @else
        <p class="text-center">There are no results for this survey yet!</p>
    @endif

@stop