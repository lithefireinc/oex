<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSet extends Model {

	protected $fillable = ['description'];

    public function questionCategory()
    {
        return $this->hasMany('\App\QuestionCategory');
    }

    public function survey()
    {
        return $this->hasMany('\App\Survey');
    }
}
