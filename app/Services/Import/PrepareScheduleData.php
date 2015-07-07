<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;

class PrepareScheduleData extends PrepareImportData{
    public function replace_key(&$array){
        $array = $this->replace_key_function($array, "studidnoc10", 'STUDIDNO');
        $array = $this->replace_key_function($array, "idnoc15", 'IDNO');
        $array = $this->replace_key_function($array, "namec67", 'NAME');
        $array = $this->replace_key_function($array, "scheidnoc5", 'SCHEIDNO');
        $array = $this->replace_key_function($array, "droppedl", 'DROPPED');
        $this->replace_dates($array);
    }
}