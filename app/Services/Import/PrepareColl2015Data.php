<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;

class PrepareColl2015Data extends PrepareImportData{
    public function replace_key(&$array){
        $array = $this->replace_key_function($array, "STUDIDNOC10", 'STUDIDNO');
        $array = $this->replace_key_function($array, "IDNOC15", 'IDNO');
        $array = $this->replace_key_function($array, "NAMEC67", 'NAME');
        $array = $this->replace_key_function($array, "STTYIDNOC3", 'STTYIDNO');
        $array = $this->replace_key_function($array, "DELEIDNOC3", 'DELEIDNO');
        $array = $this->replace_key_function($array, "YEARC2", 'YEAR');
        $array = $this->replace_key_function($array, "COURIDNOC5", 'COURIDNO');
        $array = $this->replace_key_function($array, "SECTIDNOC3", 'SECTIDNO');
        $array = $this->replace_key_function($array, "SECTIONC25", 'SECTION');
        $array = $this->replace_key_function($array, "INMOIDNOC3", 'INMOIDNO');
        $array = $this->replace_key_function($array, "OFFIENROLL,L", 'OFFIENROLL');
        $array = $this->replace_key_function($array, "TOTALTUIN82", 'TOTALTUI');
        $array = $this->replace_key_function($array, "TOTALMISN82", 'TOTALMIS');
        $array = $this->replace_key_function($array, "TOTALLABN82", 'TOTALLAB');
        $array = $this->replace_key_function($array, "TOTALINTN82", 'TOTALINT');
        $array = $this->replace_key_function($array, "TOTALFEEN82", 'TOTALFEE');
        $array = $this->replace_key_function($array, "TOTALOTFN82", 'TOTALOTF');
        $array = $this->replace_key_function($array, "DISCTUIN72", 'DISCTUI');
        $array = $this->replace_key_function($array, "DISCMISN72", 'DISCMIS');
        $array = $this->replace_key_function($array, "DISCFEEN72", 'DISCFEE');
        $array = $this->replace_key_function($array, "AMOUNTPAIDN82", 'AMOUNTPAID');
        $array = $this->replace_key_function($array, "AMPAID_TUIN82", 'AMPAID_TUI');
        $array = $this->replace_key_function($array, "AMPAID_MISN82", 'AMPAID_MIS');
        $array = $this->replace_key_function($array, "AMPAID_LABN82", 'AMPAID_LAB');
        $array = $this->replace_key_function($array, "AMPAID_OTFN82", 'AMPAID_OTF');
        $array = $this->replace_key_function($array, "DENROLLEDD", 'DENROLLED');
        $array = $this->replace_key_function($array, "SCLSIDNOC5", 'SCLSIDNO');
        $this->replace_dates($array);
    }
}