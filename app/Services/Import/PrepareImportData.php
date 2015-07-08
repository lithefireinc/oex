<?php namespace App\Services\Import;

use Carbon\Carbon;

abstract class PrepareImportData implements PrepareImportDataInterface {
    protected $data = ["ADVIIDNO"=>["adviidnoc10", "ADVIIDNO"],
        "IDNO"=>["idnoc15", "IDNO"],
        "ADVISER"=>["adviserc55", "ADVISER"],
        "YEAR"=>["yearc2", "YEAR"],
        "ROOM"=>["roomc5", "ROOM"],
        "DCREATED"=> ["dcreatedd", "DCREATED"],
        "TCREATED"=> ["tcreatedc8", "TCREATED"],
        "SCHEIDNO"=>["scheidnoc5", 'SCHEIDNO'],
        "SUBJIDNO"=>["subjidnoc5", 'SUBJIDNO'],
        "SUBJCODE"=>["subjcodec25", 'SUBJCODE'],
        "UNITS_TTL"=>["units_ttlc5", "UNITS_TTL"],
        "DAYSIDNO"=>["daysidnoc5", 'DAYSIDNO'],
        "TIMEIDNO"=>["timeidnoc5", 'TIMEIDNO'],
        "ADVIIDNO"=>["adviidnoc10", 'ADVIIDNO'],
        "COURIDNO"=>["couridnoc5", 'COURIDNO'],
        "SECTIDNO"=>["sectidnoc3", 'SECTIDNO'],
        "ROOMIDNO"=>["roomidnoc3", 'ROOMIDNO'],
        "REMARKS"=>["remarksm", 'REMARKS'],
        "DCREATED"=>["dcreatedd", 'DCREATED'],
        "TCREATED"=>["tcreatedc8", 'TCREATED'],
        "DMODIFIED"=>["dmodifiedd", 'DMODIFIED'],
        "TMODIFIED"=>["tmodifiedc8", 'TMODIFIED'],
        "STUDIDNO"=>["studidnoc10", 'STUDIDNO'],
        "NAME"=>["namec67", 'NAME'],
        "SCHEIDNO"=>["scheidnoc5", 'SCHEIDNO'],
        "DROPPED"=>["droppedl", 'DROPPED'],
    ];

    public function replace_key_function($array, $data)
    {
        $keys = array_keys($array);
        $index = array_search($data[0], $keys);
        if ($index !== false) {
            $keys[$index] = $data[1];
            $array = array_combine($keys, $array);
        }
        return $array;
    }

    public function replace_dates(&$array)
    {
        $array = $this->replace_key_function($array, $this->data["DCREATED"]);
        $array = $this->replace_key_function($array, $this->data["TCREATED"]);
        $array = $this->replace_key_function($array, $this->data['DMODIFIED']);
        $array = $this->replace_key_function($array, $this->data['TMODIFIED']);
        $array['DMODIFIED'] = Carbon::parse($array['DMODIFIED'])->toDateString();
        $array['DCREATED'] = Carbon::parse($array['DCREATED'])->toDateString();
    }
}