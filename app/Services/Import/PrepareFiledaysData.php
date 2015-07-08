<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareFiledaysData extends PrepareImportData {

    public function importData($row){
        $this->replace_key($row);
        $this->replace_dates($row);
        DB::table(env('ENGINE').'.FILEDAYS')->insert($row);
    }

    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data["DAYSIDNO"]);
        $array = $this->replace_key_function($array, $this->data["DAYS"]);
        $array = $this->replace_key_function($array, $this->data["DESCRIPTIO"]);
        $array = $this->replace_key_function($array, $this->data["DAMATRIX01"]);
        $array = $this->replace_key_function($array, $this->data["DAMATRIX02"]);
        $array = $this->replace_key_function($array, $this->data["ACTIVATED"]);
    }


}