<?php namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
