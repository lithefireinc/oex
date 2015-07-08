<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareCollegeData extends PrepareImportData{
    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data['STUDIDNO']);
        $array = $this->replace_key_function($array, $this->data['IDNO']);
        $array = $this->replace_key_function($array, $this->data['NAME']);
        $array = $this->replace_key_function($array, $this->data['STTYIDNO']);
        $array = $this->replace_key_function($array, $this->data['DELEIDNO']);
        $array = $this->replace_key_function($array, $this->data['YEAR']);
        $array = $this->replace_key_function($array, $this->data['COURIDNO']);
        $array = $this->replace_key_function($array, $this->data['SECTIDNO']);
        $array = $this->replace_key_function($array, $this->data['SECTION']);
        $array = $this->replace_key_function($array, $this->data['INMOIDNO']);
        $array = $this->replace_key_function($array, $this->data['OFFIENROLL']);
        $array = $this->replace_key_function($array, $this->data['TOTALTUI']);
        $array = $this->replace_key_function($array, $this->data['TOTALMIS']);
        $array = $this->replace_key_function($array, $this->data['TOTALLAB']);
        $array = $this->replace_key_function($array, $this->data['TOTALINT']);
        $array = $this->replace_key_function($array, $this->data['TOTALFEE']);
        $array = $this->replace_key_function($array, $this->data['TOTALOTF']);
        $array = $this->replace_key_function($array, $this->data['DISCTUI']);
        $array = $this->replace_key_function($array, $this->data['DISCMIS']);
        $array = $this->replace_key_function($array, $this->data['DISCFEE']);
        $array = $this->replace_key_function($array, $this->data['AMOUNTPAID']);
        $array = $this->replace_key_function($array, $this->data['AMPAID_TUI']);
        $array = $this->replace_key_function($array, $this->data['AMPAID_MIS']);
        $array = $this->replace_key_function($array, $this->data['AMPAID_LAB']);
        $array = $this->replace_key_function($array, $this->data['AMPAID_OTF']);
        $array = $this->replace_key_function($array, $this->data['DENROLLED']);
        $array = $this->replace_key_function($array, $this->data['SCLSIDNO']);
        $this->replace_dates($array);
    }

    public function importData($row){
        $this->replace_key($row);
        DB::table(env('OGS').'.COLLEGE')->insert($row);
    }
}