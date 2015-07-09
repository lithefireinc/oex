<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareFilesttyData extends PrepareImportData {
    protected $table;

    public function __construct(){
        parent::__construct();
        $this->table = env('ENGINE').'.FILESTTY';
    }

    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data["STTYIDNO"]);
        $array = $this->replace_key_function($array, $this->data["STUDTYPE"]);
        $this->replace_dates($row);
    }


}