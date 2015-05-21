<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

	protected $date = ['startdate', 'datestamp'];
    protected $fillable = ['email'];
    public $timestamps = false;

}
