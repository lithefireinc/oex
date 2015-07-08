<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareFileroomData extends PrepareImportData {

    public function importData($row){
        $this->replace_key($row);
        $this->replace_dates($row);
        DB::table(env('ENGINE').'.FILEROOM')->insert($row);
    }

    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data["ROOMIDNO"]);
        $array = $this->replace_key_function($array, $this->data["ROOM47"]);
        $array = $this->replace_key_function($array, $this->data["DESCRIPTIO47"]);
        $array = $this->replace_key_function($array, $this->data["ACTIVATED"]);
    }


}