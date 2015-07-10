<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Queries\Surveys\FacultySubjects;

class SchedulesController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function lists($faculty){
        return (new FacultySubjects)->lists($faculty);
    }

    public function subjectDetails($schedule_id)
    {
        return (new FacultySubjects)->subjectDetails($schedule_id);
    }
}
