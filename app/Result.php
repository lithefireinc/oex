<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

	protected $date = ['startdate', 'datestamp'];
    protected $guarded = ['id'];
    public $timestamps = false;

}
