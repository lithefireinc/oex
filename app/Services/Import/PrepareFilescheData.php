<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;

class PrepareFilescheData extends PrepareImportData{
    public function replace_key(&$array){
        $array = $this->replace_key_function($array, "scheidnoc5", 'SCHEIDNO');
        $array = $this->replace_key_function($array, "subjidnoc5", 'SUBJIDNO');
        $array = $this->replace_key_function($array, "subjcodec25", 'SUBJCODE');
        $array = $this->replace_key_function($array, "units_ttlc5", 'UNITS_TTL');
        $array = $this->replace_key_function($array, "daysidnoc5", 'DAYSIDNO');
        $array = $this->replace_key_function($array, "timeidnoc5", 'TIMEIDNO');
        $array = $this->replace_key_function($array, "adviidnoc10", 'ADVIIDNO');
        $array = $this->replace_key_function($array, "couridnoc5", 'COURIDNO');
        $array = $this->replace_key_function($array, "sectidnoc3", 'SECTIDNO');
        $array = $this->replace_key_function($array, "roomidnoc3", 'ROOMIDNO');
        $array = $this->replace_key_function($array, "remarksm", 'REMARKS');
        $array = $this->replace_key_function($array, "dcreatedd", 'DCREATED');
        $this->replace_dates($array);
    }
}