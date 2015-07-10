<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Survey extends Model {
    protected $dates = ['start_date', 'expires'];
    protected $casts = [
        'active' => 'boolean'
    ];
	protected $fillable = [
        'title',
        'description',
        'instructions',
        'question_set_id',
        'faculty_id',
        'schedule_id',
        'per_page',
        'start_date',
        'expires',
        'active',
        'code',
    ];

    public function questionSet()
    {
        return $this->belongsTo('App\QuestionSet');
    }

    public function faculty()
    {
        return $this->belongsTo('\App\Faculty');
    }

    public function scopeActive($query){
        return $query->whereActive(1);
    }

    public function scopeNotTakenSurvey($query, $user_id){
        return $query->whereRaw("code not in (select survey_code from surveys_taken where user_id = ?)", [$user_id]);
    }

    public function scopeWithinDate($query){
        return $query->where("start_date", "<=", Carbon::now())->where("expires", ">=", Carbon::now());
    }

}
