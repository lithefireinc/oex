@extends('app')

@section('content')

    <h1 class="page-heading">Take Survey</h1>
<ol>
    @foreach( $questions as $question )
        <li>{{ $question->title }}</li>
    @endforeach
</ol>
@endsection