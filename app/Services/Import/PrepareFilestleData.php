<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareFilestleData extends PrepareImportData {
    protected $table;

    public function __construct(){
        parent::__construct();
        $this->table = env('ENGINE').'.FILESTLE';
    }
    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data["STLEIDNO"]);
        $array = $this->replace_key_function($array, $this->data["YEAR"]);
        $array = $this->replace_key_function($array, $this->data["DESCRIPTIO25"]);
        $array = $this->replace_key_function($array, $this->data["ACTIVATE"]);
        $this->replace_dates($row);
    }


}