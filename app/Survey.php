<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model {

	protected $fillable = [
        'title',
        'description',
        'instructions',
        'question_set_id',
        'faculty_id',
        'start_date',
        'expires'
    ];

    public function questionSet()
    {
        return $this->belongsTo('\App\QuestionSet');
    }

    public function faculty()
    {
        return $this->belongsTo('\App\Faculty');
    }

}
