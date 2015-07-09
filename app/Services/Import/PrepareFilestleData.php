<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareFilestleData extends PrepareImportData {

    public function importData($row){
        $this->replace_key($row);
        $this->replace_dates($row);
        DB::table(env('ENGINE').'.FILESTLE')->insert($row);
    }

    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data["STLEIDNO"]);
        $array = $this->replace_key_function($array, $this->data["YEAR"]);
        $array = $this->replace_key_function($array, $this->data["DESCRIPTIO25"]);
        $array = $this->replace_key_function($array, $this->data["ACTIVATE"]);
    }


}