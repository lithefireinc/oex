<?php namespace App;

class Faculty extends Engine {
    protected $table = 'FILEADVI';
//    protected $appends = ['full_name'];
    protected $primaryKey = 'ADVICODE';
    public $timestamps = false;

    public function survey()
    {
        return $this->hasMany('\App\Survey');
    }

//    public function getFullNameAttribute(){
//        return $this->last_name.", ".$this->first_name." ".$this->middle_name;
//    }
}
