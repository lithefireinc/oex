<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareFiletimeData extends PrepareImportData {

    public function importData($row){
        $this->replace_key($row);
        $this->replace_dates($row);
        DB::table(env('ENGINE').'.FILETIME')->insert($row);
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
    }


}