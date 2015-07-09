<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;

class PrepareFilesectData extends PrepareImportData{
    protected $table;

    public function __construct(){
        parent::__construct();
        $this->table = env('OGS').'.FILESECT';
    }

    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data['SECTIDNO']);
        $array = $this->replace_key_function($array, $this->data['YEAR']);
        $array = $this->replace_key_function($array, $this->data['SECTION35']);
        $array = $this->replace_key_function($array, $this->data['SECTORDER']);
        $array = $this->replace_key_function($array, $this->data['DESCRIPTIO']);
        $array = $this->replace_key_function($array, $this->data['MALE']);
        $array = $this->replace_key_function($array, $this->data['FEMALE']);
        $array = $this->replace_key_function($array, $this->data['STUDCOUNT']);
        $array = $this->replace_key_function($array, $this->data['COURIDNO']);
        $array = $this->replace_key_function($array, $this->data['ACTIVATED']);
        $this->replace_dates($array);
    }
}