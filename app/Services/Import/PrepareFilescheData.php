<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareFilescheData extends PrepareImportData{
    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data['SCHEIDNO']);
        $array = $this->replace_key_function($array, $this->data['SUBJIDNO']);
        $array = $this->replace_key_function($array, $this->data['SUBJCODE']);
        $array = $this->replace_key_function($array, $this->data['UNITS_TTL']);
        $array = $this->replace_key_function($array, $this->data['DAYSIDNO']);
        $array = $this->replace_key_function($array, $this->data['TIMEIDNO']);
        $array = $this->replace_key_function($array, $this->data['ADVIIDNO']);
        $array = $this->replace_key_function($array, $this->data['COURIDNO']);
        $array = $this->replace_key_function($array, $this->data['SECTIDNO']);
        $array = $this->replace_key_function($array, $this->data['ROOMIDNO']);
        $array = $this->replace_key_function($array, $this->data['REMARKS']);
        $this->replace_dates($array);
    }

    public function importData($row){
        $this->replace_key($row);
        DB::table(env('OGS').'.FILESCHE')->insert($row);
    }
}