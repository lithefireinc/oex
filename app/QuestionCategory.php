<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    protected $fillable = ['description'];

    public function questionSet()
    {
        return $this->belongsTo('\App\QuestionSet', 'question_set_id', 'id');
    }

    public function questions()
    {
        return $this->hasMany('\App\Question');
    }
}
