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
        return $this->belongsTo('\App\QuestionSet', 'question_set_id', 'id');
    }

    public function questionType()
    {
        return $this->belongsTo('\App\QuestionType', 'question_type_id', 'id');
    }
}
