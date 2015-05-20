<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model {

    protected $appends = ['full_name'];

    public function survey()
    {
        return $this->hasMany('\App\Survey');
    }

    public function getFullNameAttribute(){
        return $this->last_name.", ".$this->first_name." ".$this->middle_name;
    }
}
