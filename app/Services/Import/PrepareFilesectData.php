<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;

class PrepareFilesectData extends PrepareImportData{
    public function replace_key(&$array){
        $array = $this->replace_key_function($array, "sectidnoc3", 'SECTIDNO');
        $array = $this->replace_key_function($array, "yearc2", 'YEAR');
        $array = $this->replace_key_function($array, "sectionc35", 'SECTION');
        $array = $this->replace_key_function($array, "sectorderc2", 'SECTORDER');
        $array = $this->replace_key_function($array, "descriptioc35", 'DESCRIPTIO');
        $array = $this->replace_key_function($array, "malen30", 'MALE');
        $array = $this->replace_key_function($array, "femalen30", 'FEMALE');
        $array = $this->replace_key_function($array, "studcountn30", 'STUDCOUNT');
        $array = $this->replace_key_function($array, "couridnoc5", 'COURIDNO');
        $array = $this->replace_key_function($array, "activatedl", 'ACTIVATED');
        $this->replace_dates($array);
    }
}