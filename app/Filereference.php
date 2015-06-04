<?php namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class Filereference extends Model {

	protected $connection;

    public function __construct(){
        $this->connection = env('FILEFERENCE', 'engine');
    }

}
