<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionSetRequest;
use App\QuestionSet;
use yajra\Datatables\Datatables;

use Illuminate\Http\Request;

class QuestionSetsController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();

    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if($this->user->level() < 99)
        {
            abort(403);
        }
        $questionSets = QuestionSet::latest('created_at')->get();

        return view('questionSets.index', compact('questionSets'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if($this->user->level() < 99)
        {
            abort(403);
        }

        return view('questionSets.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionSetRequest $request
     * @return Response
     */
	public function store(QuestionSetRequest $request)
	{
        if($this->user->level() < 99)
        {
            abort(403);
        }

        QuestionSet::create($request->all());

        flash()->success('Question Set created successfully!');
        return redirect('questionSets');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        //
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $questionSet = QuestionSet::findOrFail($id);

        return view('questionSets.edit', compact('questionSet'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param QuestionSetRequest $request
     * @return Response
     */
	public function update($id, QuestionSetRequest $request)
	{
        $questionSet = QuestionSet::findOrFail($id);

        $this->validate($request, [
            'description' => 'required'
        ]);

        $input = $request->all();

        $questionSet->fill($input)->save();

        flash()->success('Question Set successfully added!');

        return redirect('questionSets');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function lists()
    {
	    return QuestionSet::all(['description as text', 'id as value']);
	}

    public function getData()
    {
        $questionSets = QuestionSet::select(['id','description']);

        return Datatables::of($questionSets)
            ->addColumn('action', function ($questionSet) {
                return '<a href="questionSets/'.$questionSet->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }

}
