<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;

class PrepareColl2015Data extends PrepareImportData{
    public function replace_key(&$array){
        $array = $this->replace_key_function($array, "studidnoc10", 'STUDIDNO');
        $array = $this->replace_key_function($array, "idnoc15", 'IDNO');
        $array = $this->replace_key_function($array, "namec67", 'NAME');
        $array = $this->replace_key_function($array, "sttyidnoc3", 'STTYIDNO');
        $array = $this->replace_key_function($array, "deleidnoc3", 'DELEIDNO');
        $array = $this->replace_key_function($array, "yearc2", 'YEAR');
        $array = $this->replace_key_function($array, "couridnoc5", 'COURIDNO');
        $array = $this->replace_key_function($array, "sectidnoc3", 'SECTIDNO');
        $array = $this->replace_key_function($array, "sectionc25", 'SECTION');
        $array = $this->replace_key_function($array, "inmoidnoc3", 'INMOIDNO');
        $array = $this->replace_key_function($array, "offienrolll", 'OFFIENROLL');
        $array = $this->replace_key_function($array, "totaltuin82", 'TOTALTUI');
        $array = $this->replace_key_function($array, "totalmisn82", 'TOTALMIS');
        $array = $this->replace_key_function($array, "totallabn82", 'TOTALLAB');
        $array = $this->replace_key_function($array, "totalintn82", 'TOTALINT');
        $array = $this->replace_key_function($array, "totalfeen82", 'TOTALFEE');
        $array = $this->replace_key_function($array, "totalotfn82", 'TOTALOTF');
        $array = $this->replace_key_function($array, "disctuin72", 'DISCTUI');
        $array = $this->replace_key_function($array, "discmisn72", 'DISCMIS');
        $array = $this->replace_key_function($array, "discfeen72", 'DISCFEE');
        $array = $this->replace_key_function($array, "amountpaidn82", 'AMOUNTPAID');
        $array = $this->replace_key_function($array, "ampaid_tuin82", 'AMPAID_TUI');
        $array = $this->replace_key_function($array, "ampaid_misn82", 'AMPAID_MIS');
        $array = $this->replace_key_function($array, "ampaid_labn82", 'AMPAID_LAB');
        $array = $this->replace_key_function($array, "ampaid_otfn82", 'AMPAID_OTF');
        $array = $this->replace_key_function($array, "denrolledd", 'DENROLLED');
        $array = $this->replace_key_function($array, "sclsidnoc5", 'SCLSIDNO');
        $this->replace_dates($array);
    }
}