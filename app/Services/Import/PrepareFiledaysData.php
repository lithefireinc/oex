<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareFiledaysData extends PrepareImportData {
    protected $table;

    public function __construct(){
        parent::__construct();
        $this->table = env('ENGINE').'.FILEDAYS';
    }

    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data["DAYSIDNO"]);
        $array = $this->replace_key_function($array, $this->data["DAYS"]);
        $array = $this->replace_key_function($array, $this->data["DESCRIPTIO47"]);
        $array = $this->replace_key_function($array, $this->data["DAMATRIX01"]);
        $array = $this->replace_key_function($array, $this->data["DAMATRIX02"]);
        $array = $this->replace_key_function($array, $this->data["ACTIVATED"]);
        $this->replace_dates($row);
    }


}