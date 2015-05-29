<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Survey;
use Datatables;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{

    public function getIndex()
    {
        $surveys = Survey::latest('created_at')->get();

        return view('surveys.demo', compact('surveys'));
    }

    public function getData()
    {
//        $surveys = Survey::with('faculty')->select('*');
        $surveys = Survey::leftJoin('faculties', 'surveys.faculty_id', '=', 'faculties.id')
            ->select([
                'last_name',
                'first_name',
                'middle_name',
                'title',
                'description',
                'expires',
                DB::raw('CONCAT(last_name, ", ", first_name, " ", middle_name) AS last_name')
            ]);

        return Datatables::of($surveys)
            ->make(true);
    }

}