<?php namespace App\Services\Import;

use Carbon\Carbon;

abstract class PrepareImportData implements PrepareImportDataInterface {
    public function replace_key_function($array, $key1, $key2)
    {
        $keys = array_keys($array);
        $index = array_search($key1, $keys);
        if ($index !== false) {
            $keys[$index] = $key2;
            $array = array_combine($keys, $array);
        }
        return $array;
    }

    public function replace_dates(&$array)
    {
        $array = $this->replace_key_function($array, "dcreatedd", 'DCREATED');
        $array = $this->replace_key_function($array, "tcreatedc8", 'TCREATED');
        $array = $this->replace_key_function($array, "dmodifiedd", 'DMODIFIED');
        $array = $this->replace_key_function($array, "tmodifiedc8", 'TMODIFIED');
        $array['DMODIFIED'] = Carbon::parse($array['DMODIFIED'])->toDateString();
        $array['DCREATED'] = Carbon::parse($array['DCREATED'])->toDateString();
    }
}