<?php namespace App;

class Filesche extends Ogs {
    protected $table = 'FILESCHE';
    protected $primaryKey = 'SCHECODE';
    public $timestamps = false;
    protected $fillable = ["SCHEIDNO"];

}
