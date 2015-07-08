<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareFilesttyData extends PrepareImportData {

    public function importData($row){
        $this->replace_key($row);
        $this->replace_dates($row);
        DB::table(env('ENGINE').'.FILESTTY')->insert($row);
    }

    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data["STTYIDNO"]);
        $array = $this->replace_key_function($array, $this->data["STUDTYPE"]);
    }


}