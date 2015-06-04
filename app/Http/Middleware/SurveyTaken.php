<?php namespace App\Http\Middleware;

use App\Survey;
use App\SurveysTaken;
use Closure;

class SurveyTaken {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $survey = Survey::findOrFail($request->segment(3));

        if(SurveysTaken::where('user_id', $request->user()->id)
                ->where('survey_code', $survey->code)->count())
        {
            abort(404);
        }


		return $next($request);
	}

}
