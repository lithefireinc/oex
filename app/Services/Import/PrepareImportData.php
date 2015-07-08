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
        "STTYIDNO"=>["sttyidnoc3", 'STTYIDNO'],
        "DELEIDNO"=>["deleidnoc3", 'DELEIDNO'],
        "YEAR"=>["yearc2", 'YEAR'],
        "SECTION"=>["sectionc25", 'SECTION'],
        "INMOIDNO"=>["inmoidnoc3", 'INMOIDNO'],
        "OFFIENROLL"=>["offienrolll", 'OFFIENROLL'],
        "TOTALTUI"=>["totaltuin82", 'TOTALTUI'],
        "TOTALMIS"=>["totalmisn82", 'TOTALMIS'],
        "TOTALLAB"=>["totallabn82", 'TOTALLAB'],
        "TOTALINT"=>["totalintn82", 'TOTALINT'],
        "TOTALFEE"=>["totalfeen82", 'TOTALFEE'],
        "TOTALOTF"=>["totalotfn82", 'TOTALOTF'],
        "DISCTUI"=>["disctuin72", 'DISCTUI'],
        "DISCMIS"=>["discmisn72", 'DISCMIS'],
        "DISCFEE"=>["discfeen72", 'DISCFEE'],
        "AMOUNTPAID"=>["amountpaidn82", 'AMOUNTPAID'],
        "AMPAID_TUI"=>["ampaid_tuin82", 'AMPAID_TUI'],
        "AMPAID_MIS"=>["ampaid_misn82", 'AMPAID_MIS'],
        "AMPAID_LAB"=>["ampaid_labn82", 'AMPAID_LAB'],
        "AMPAID_OTF"=>["ampaid_otfn82", 'AMPAID_OTF'],
        "DENROLLED"=>["denrolledd", 'DENROLLED'],
        "SCLSIDNO"=>["sclsidnoc5", 'SCLSIDNO'],
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