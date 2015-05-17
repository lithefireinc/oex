<?php namespace App\Http\Controllers;

use App\Faculty;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\QuestionSet;
use Auth;

use App\Survey;
//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Input;

class SurveysController extends Controller {

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
        $surveys = Survey::latest('created_at')->get();

		return view('surveys.index', compact('surveys'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
//		return $this->user->role->name;
        $questionSet = QuestionSet::lists('description', 'id');
        $faculty = Faculty::selectRaw('CONCAT(last_name,", ", first_name," ",middle_name) as full_name, id')->orderBy('last_name')->lists('full_name','id');

	    return view('surveys.create', compact('questionSet', 'faculty'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Request::all();

        Survey::create($input);

        flash('Survey created successfully!');

        return redirect('surveys');
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

    public function available(){
        $surveys = Survey::latest('created_at')->get();
        return view('surveys.available', compact('surveys'));
    }


    public function takeSurvey($id)
    {
        $survey = Survey::findOrFail($id);
        $questions = $survey->questionSet->question;

        return view('surveys.takeSurvey', compact('survey', 'questions'));
    }
}
