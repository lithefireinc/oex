<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model {

    public function survey()
    {
        return $this->hasMany('\App\Survey');
    }

    public function getFullNameAttribute(){
        return $this->last_name.", ".$this->first_name." ".$this->middle_name;
    }
}
