<?php namespace App\Services\Import;

use App\Services\Import\PrepareImportData;
use DB;
class PrepareSubjfileData extends PrepareImportData{
    protected $table;

    public function __construct(){
        parent::__construct();
        $this->table = env('OGS').'.FILESUBJ';
    }

    public function replace_key(&$array){
        $array = $this->replace_key_function($array, $this->data['SUBJIDNO']);
        $array = $this->replace_key_function($array, $this->data['SUBJCODE']);
        $array = $this->replace_key_function($array, $this->data['COURSEDESC']);
        $array = $this->replace_key_function($array, $this->data['UNITS_LEC']);
        $array = $this->replace_key_function($array, $this->data['UNITS_LAB']);
        $array = $this->replace_key_function($array, $this->data['UNITS_TTL']);
        $array = $this->replace_key_function($array, $this->data['FEE_TUI']);
        $array = $this->replace_key_function($array, $this->data['FEE_LAB']);
        $array = $this->replace_key_function($array, $this->data['FEE_TUT']);
        $array = $this->replace_key_function($array, $this->data['FEE02_TUI']);
        $array = $this->replace_key_function($array, $this->data['FEE02_LAB']);
        $array = $this->replace_key_function($array, $this->data['FEE02_TUT']);
        $array = $this->replace_key_function($array, $this->data['REMARKS']);
        $array = $this->replace_key_function($array, $this->data['ACTIVATED']);
        $this->replace_dates($array);
    }
}