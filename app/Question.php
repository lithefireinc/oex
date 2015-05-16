<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $fillable = [
        'question_type',
        'title',
        'question',
        'required',
        'order',
    ];

    public function questionSet()
    {
        return $this->belongsTo('\App\QuestionSet');
    }
}
