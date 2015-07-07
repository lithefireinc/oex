<?php namespace App\Services\Import;

interface PrepareImportDataInterface {
    public function replace_key(&$array);
}