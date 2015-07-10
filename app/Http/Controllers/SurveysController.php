<?php namespace App\Http\Controllers;

use App\Faculty;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyRequest;
use App\Http\Requests\TakeSurveyRequest;
use App\Question;
use App\QuestionSet;
use App\QuestionCategory;
use App\SurveysTaken;
use Auth;
use App\Result;
use App\Survey;
//use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Session;
use Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use yajra\Datatables\Datatables;
use App\Queries\Surveys\SurveyQuery;

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
        $faculty = Faculty::get()->lists('ADVISER', 'ADVICODE');


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
        $survey = $this->saveData($request);
        flash()->success('Survey created successfully! Activate it now for students to start evaluating.');
        return response()->json(["url"=>url("surveys")]);
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
     * @param $surveyId
     * @param Request $request
     * @return Response
     * @internal param int $id
     */
	public function update($id)
	{

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
        $surveys = Survey::active()->notTakenSurvey($this->user->id)->withinDate()->latest('created_at')->get();

        return view('surveys.available', compact('surveys'));
    }


    public function takeSurvey($id)
    {
        $this->middleware('surveyTaken');
        $survey = Survey::findOrFail($id);
        $questions = $survey->questionSet->questions;
        $question_categories = new Collection;
        foreach($questions as $question){
            if($question->questionCategory)
                $question_categories->add($question->questionCategory);
        }
        $question_categories = $question_categories->unique()->sortBy('order');
        $choices = [1,2,3,4,5];

        session()->flash('survey', $survey);
        session()->flash('startdate', Carbon::now());
        $fieldname = $survey->code.'X'.$survey->questionSet->id.'X';
        return view('surveys.takeSurvey', compact('survey', 'questions', 'choices', 'fieldname', 'question_categories'));
    }

    public function recordResult(TakeSurveyRequest $request)
    {
        $survey = session()->get('survey');
        $results = new Result;
        $results->setTable("results_".$survey->code);

        $results->fill(['email'=>$this->user->email, 'startdate'=>session()->get('startdate'), 'datestamp'=>Carbon::now()]+$request->all());

        $results->save();

        SurveysTaken::create(["user_id"=>$this->user->id, "survey_code"=>$survey->code]);
        flash()->success('You have successfully taken the survey for '.$survey->faculty()->first()->ADVISER);
        return redirect('surveys/available');
    }

    private function saveData(SurveyRequest $request)
    {
        $survey = Survey::firstOrNew(['code'=>str_random(8)]);
        $survey->fill($request->all());
        $survey->save();
        $question_set = $survey->questionSet()->first();
        $questions = $question_set->questions();

        Schema::create('results_'.$survey->code, function(Blueprint $table) use ($questions, $survey, $question_set)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('token');
            $table->dateTime('startdate');
            $table->dateTime('datestamp');

            foreach($questions->get() as $question){
                if($question->question_type_id == 1){
                    $table->string($survey->code.'X'.$question_set->id.'X'.$question->id, 1);
                } elseif ($question->question_type_id == 2){
                    $table->text($survey->code.'X'.$question_set->id.'X'.$question->id);
                }
            }
        });

        return $survey;
    }

    public function getData()
    {
        $surveys = (new SurveyQuery)->fetchSurveys();

        return Datatables::of($surveys)
            ->removeColumn('')
            ->addColumn('action', function ($survey) {
                $disabled = '';
                if($survey->expires < Carbon::now()){
                    $disabled='disabled';
                    $btnCls = "btn btn-sm btn-danger";
                    $text = "Inactive";
                }else {
                    if ($survey->active == 1) {
                        $btnCls = "btn-danger";
                        $text = "Deactivate";
                    } else {
                        $btnCls = "btn-success";
                        $text = "Activate";
                    }
                }
                    $activate = '<a href="'.url('surveys/toggleActive', [$survey->id]).'" class="btn btn-xs '.$btnCls.'" '.$disabled.'>'.$text.'</a>';
                    $result = '<a href="'.url('surveys/result', [$survey->id]).'" class="btn btn-xs btn-default">View Result</a>';
                    $html = <<<EOT

                        $activate
                        $result

EOT;
                return $html;
            })
            ->editColumn('details', 'Schedule: {{$details}} - {{ $TIME }} {{ $ROOM }} | Class: {{ $COURSE }} {{ $SECTION }}')
            ->make(true);
    }

    public function toggleActive($id)
    {
        $survey = Survey::findOrFail($id);
        $survey->update(['active'=>!$survey->active]);
        if(!$survey->active) {
            $active = "Inactive";
            flash()->info('Survey ' . $survey->title . ' is now ' . $active . '!');
        } else {
            $active = "Active";
            flash()->success('Survey ' . $survey->title . ' is now ' . $active . '!');
        }
        return redirect()->back();
    }

    public function viewResult($id)
    {
        $survey = Survey::findOrFail($id);
        $question_set = $survey->questionSet()->first();
        $questions = $survey->questionSet->questions;
        $question_categories = new Collection;
        foreach($questions as $question){
            if($question->questionCategory)
                $question_categories->add($question->questionCategory);
        }
        $question_categories = $question_categories->unique()->sortBy('order');
        $results_table = 'results_'.$survey->code;
        $field_name = $survey->code.'X'.$survey->questionSet->id.'X';
        $columns = Schema::getColumnListing('results_'.$survey->code);
        $results = DB::table($results_table)->select($columns)->get();

        return view('surveys.result', compact('survey', 'question_categories', 'field_name', 'columns', 'results'));

    }
}
