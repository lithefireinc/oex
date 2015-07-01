<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSet extends Model {

	protected $fillable = ['description'];

    public function questions()
    {
        return $this->hasMany('\App\Question');
    }

    public function survey()
    {
        return $this->hasMany('\App\Survey');
    }
}
