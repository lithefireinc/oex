<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;

class PrepareSubjfileData extends PrepareImportData{
    public function replace_key(&$array){
        $array = $this->replace_key_function($array, "subjidnoc5", 'SUBJIDNO');
        $array = $this->replace_key_function($array, "subjcodec25", 'SUBJCODE');
        $array = $this->replace_key_function($array, "coursedescc100", 'COURSEDESC');
        $array = $this->replace_key_function($array, "units_lecc5", 'UNITS_LEC');
        $array = $this->replace_key_function($array, "units_labc5", 'UNITS_LAB');
        $array = $this->replace_key_function($array, "units_ttlc5", 'UNITS_TTL');
        $array = $this->replace_key_function($array, "fee_tuin82", 'FEE_TUI');
        $array = $this->replace_key_function($array, "fee_labn82", 'FEE_LAB');
        $array = $this->replace_key_function($array, "fee_tutn82", 'FEE_TUT');
        $array = $this->replace_key_function($array, "fee02_tuin82", 'FEE02_TUI');
        $array = $this->replace_key_function($array, "fee02_labn82", 'FEE02_LAB');
        $array = $this->replace_key_function($array, "fee02_tutn82", 'FEE02_TUT');
        $array = $this->replace_key_function($array, "remarksm", 'REMARKS');
        $array = $this->replace_key_function($array, "activatedl", 'ACTIVATED');
        $this->replace_dates($array);
    }
}