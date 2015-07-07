<?php namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class Ogs extends Model {

    protected $connection;

    public function __construct(){
        parent::__construct();
        $this->connection = 'ogs';
    }

}