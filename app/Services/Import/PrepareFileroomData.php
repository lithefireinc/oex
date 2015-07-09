<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareFileroomData extends PrepareImportData {
    protected $table;

    public function __construct(){
        parent::__construct();
        $this->table = env('ENGINE').'.FILEROOM';
    }

    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data["ROOMIDNO"]);
        $array = $this->replace_key_function($array, $this->data["ROOM47"]);
        $array = $this->replace_key_function($array, $this->data["DESCRIPTIO47"]);
        $array = $this->replace_key_function($array, $this->data["ACTIVATED"]);
        $this->replace_dates($row);
    }


}