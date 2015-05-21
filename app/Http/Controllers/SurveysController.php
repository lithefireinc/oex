<?php namespace App\Http\Controllers;

use App\Faculty;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyRequest;
use App\Http\Requests\TakeSurveyRequest;
use App\Question;
use App\QuestionSet;
use Auth;
use App\Result;

use App\Survey;
//use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

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
        if($this->user->level() < 99)
        {
            abort(403);
        }
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
        if($this->user->level() < 99)
        {
            abort(403);
        }

        $questionSet = QuestionSet::lists('description', 'id');
        $faculty = Faculty::get()->lists('full_name', 'id');


	    return view('surveys.create', compact('questionSet', 'faculty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SurveyRequest $request
     * @return Response
     */
	public function store(SurveyRequest $request)
	{
        if($this->user->level() < 99)
        {
            abort(403);
        }

        $this->saveData($request);
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
        $questions = $survey->questionSet->questions;
        $choices = [1,2,3,4,5];

        session()->flash('survey', $survey);
        session()->flash('startdate', Carbon::now());
        return view('surveys.takeSurvey', compact('survey', 'questions', 'choices'));
    }

    public function recordResult(TakeSurveyRequest $request)
    {

        $survey = session()->get('survey');

        $results = new Result;
        $results->setTable("results_".$survey->code);

        $results->fill(['email'=>$this->user->email, 'startdate'=>session()->get('startdate'), 'datestamp'=>Carbon::now()]+$request->all());
        
        $results->save();

        return redirect('surveys/available');
    }

    private function saveData(SurveyRequest $request){
        $survey = Survey::firstOrNew(['code'=>str_random(8)]);
        $survey->fill($request->all());
        $survey->save();
        $questionSet =$survey->questionSet()->first();
        $questions = $questionSet->questions();

        Schema::create('results_'.$survey->code, function(Blueprint $table) use ($questions, $questionSet, $survey)
        {

            $table->increments('id');
            $table->string('email')->unique();
            $table->string('token');
            $table->dateTime('startdate');
            $table->dateTime('datestamp');

            foreach($questions->get() as $question){
                $table->string($survey->code.'X'.$questionSet->id.'X'.$question->id, 1);
            }

        });
    }
}
