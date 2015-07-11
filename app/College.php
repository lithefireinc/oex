<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Ogs
{
    protected $table = 'COLLEGE';
    protected $primaryKey = 'STUDCODE';
    public $timestamps = false;

    public function user()
    {
        return $this->morphMany('\App\User', 'userable');
    }
}
