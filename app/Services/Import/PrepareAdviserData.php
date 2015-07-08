<?php namespace App\Services\Import;
use App\Services\Import\PrepareImportData;

class PrepareAdviserData extends PrepareImportData {

    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data["ADVIIDNO"]);
        $array = $this->replace_key_function($array, $this->data["IDNO"]);
        $array = $this->replace_key_function($array, $this->data["ADVISER"]);
        $array = $this->replace_key_function($array, $this->data["YEAR"]);
        $array = $this->replace_key_function($array, $this->data["ROOM"]);
    }
}