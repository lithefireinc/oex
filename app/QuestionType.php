<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model {

    protected $fillable = ['question_type'];

    public function questions()
    {
        return $this->hasMany('\App\Question');
    }
}
