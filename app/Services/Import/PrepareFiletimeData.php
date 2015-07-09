<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareFiletimeData extends PrepareImportData {
    protected $table;

    public function __construct(){
        parent::__construct();
        $this->table = env('ENGINE').'.FILETIME';
    }

    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data["TIMEIDNO"]);
        $array = $this->replace_key_function($array, $this->data["TIME"]);
        $array = $this->replace_key_function($array, $this->data["TIME24"]);
        $array = $this->replace_key_function($array, $this->data["DESCRIPTIO47"]);
        $array = $this->replace_key_function($array, $this->data["TIMATRIX01"]);
        $array = $this->replace_key_function($array, $this->data["TIMATRIX02"]);
        $array = $this->replace_key_function($array, $this->data["TIMATRIX03"]);
        $array = $this->replace_key_function($array, $this->data["ACTIVATED"]);
        $this->replace_dates($array);
    }


}