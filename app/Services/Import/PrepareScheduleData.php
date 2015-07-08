<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareScheduleData extends PrepareImportData{
    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data['STUDIDNO']);
        $array = $this->replace_key_function($array, $this->data['IDNO']);
        $array = $this->replace_key_function($array, $this->data['NAME']);
        $array = $this->replace_key_function($array, $this->data['SCHEIDNO']);
        $array = $this->replace_key_function($array, $this->data['DROPPED']);
        $this->replace_dates($array);
    }

    public function importData($row){
        $this->replace_key($row);
        DB::table(env('OGS').'.SCHEDULE')->insert($row);
    }
}