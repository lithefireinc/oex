<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model {

    public function survey()
    {
        return $this->hasMany('\App\Survey');
    }

}
