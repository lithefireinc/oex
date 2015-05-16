<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSet extends Model {

	protected $fillable = ['description'];

    public function question()
    {
        return $this->hasMany('App\Question');
    }
}
