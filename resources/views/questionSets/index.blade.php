@extends('app')
@section('content')

    <h1 class="page-heading">Question Sets</h1>



    <a class="btn btn-primary b-create" href="{{ url('questionSets/create') }}">Create New</a>

    <table id="questionSets-table" class="table stripe order-column">
        <thead>
        <tr>
            <th></th>
            <th>Question Set</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>

    @unless(count($questionSets))
        <p class="text-center">You haven't created any question sets yet!</p>
    @endunless



@stop
