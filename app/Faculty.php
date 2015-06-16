<?php namespace App;

class Faculty extends Engine {
    protected $table = 'FILEADVI';
    protected $primaryKey = 'ADVICODE';
    public $timestamps = false;
    protected $fillable = ["ADVISER", "ADVIIDNO", "IDNO"];

    public function survey()
    {
        return $this->hasMany('\App\Survey');
    }
}
