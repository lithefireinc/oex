<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    protected $fillable = [
        'description',
        'order',
    ];

    public function questions()
    {
        return $this->hasMany('\App\Question');
    }
}
