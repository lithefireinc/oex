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
use Illuminate\Database\Schema\Blueprint;
use Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use yajra\Datatables\Datatables;

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
        //dd(Faculty::get()->lists('ADVISER', 'ADVICODE'));
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

        $this->saveData($request);
        flash()->success('Survey created successfully!');

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
//        $question_categories = $survey->questionSet->questionCategory;

        $question_set = $survey->questionSet()->first();
        $question_categories = $question_set->questionCategory()->orderBy('order')->get();

        $choices = [1,2,3,4,5];

        session()->flash('survey', $survey);
        session()->flash('startdate', Carbon::now());
        $fieldname = $survey->code.'X'.$survey->questionSet->id.'X';
        return view('surveys.takeSurvey', compact('survey', 'question_categories', 'choices', 'fieldname'));
    }

    public function recordResult(TakeSurveyRequest $request)
    {

        $survey = session()->get('survey');
        //dd($survey->faculty()->first()->full_name);
        $results = new Result;
        $results->setTable("results_".$survey->code);

        $results->fill(['email'=>$this->user->email, 'startdate'=>session()->get('startdate'), 'datestamp'=>Carbon::now()]+$request->all());

        $results->save();

        SurveysTaken::create(["user_id"=>$this->user->id, "survey_code"=>$survey->code]);
        flash()->success('You have successfully taken the survey for '.$survey->faculty()->first()->ADVISER);
        return redirect('surveys/available');
    }

    private function saveData(SurveyRequest $request){
        $survey = Survey::firstOrNew(['code'=>str_random(8), 'active'=>1]);
        $survey->fill($request->all());
        $survey->save();
        $question_set = $survey->questionSet()->first();
        $question_categories = $question_set->questionCategory();

        Schema::create('results_'.$survey->code, function(Blueprint $table) use ($question_categories, $survey, $question_set)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('token');
            $table->dateTime('startdate');
            $table->dateTime('datestamp');

            foreach($question_categories->orderBy('order')->get() as $question_category) {
                foreach ($question_category->questions()->orderBy('order')->get() as $question) {
                    if ($question->question_type_id == 1) {
                        $table->string($survey->code . 'X' . $question_set->id . 'X' . $question_category->id . 'X' . $question->id, 1);
                    } elseif ($question->question_type_id == 2) {
                        $table->text($survey->code . 'X' . $question_set->id . 'X' . $question_category->id . 'X' . $question->id);
                    }
                }
            }
        });
    }

    public function getData()
    {
//        $surveys = Survey::with('faculty')->select('*');
        $surveys = Survey::join('engine.FILEADVI', 'surveys.faculty_id', '=', 'engine.FILEADVI.ADVICODE')
            ->select([
                'surveys.id',
                'title',
                'description',
                'expires',
                'active',
                'surveys.created_at',
                'ADVISER',
//                DB::raw('CONCAT(last_name, ", ", first_name, " ", middle_name) AS last_name')

            ]);

        return Datatables::of($surveys)
            ->removeColumn('')
            ->addColumn('action', function ($survey) {
                $disabled = '';
                if($survey->expires < Carbon::now()){
                    $disabled='disabled';
                    $btnCls = "btn btn-sm btn-danger";
                    $iconCls = "fa fa-times";
                }else {
                    if ($survey->active == 1) {
                        $btnCls = "btn btn-sm btn-success";
                        $iconCls = "fa fa-check";
                    } else {
                        $btnCls = "btn btn-sm btn-danger";
                        $iconCls = "fa fa-times";
                    }
                }
                    return '<a href="'.url('surveys/toggleActive', [$survey->id]).'" class="'.$btnCls.'" '.$disabled.'><span class="'.$iconCls.'"></span></a>';
            })
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
}
