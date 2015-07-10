<?php namespace App\Http\Controllers;

use App\Faculty;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FacultyController extends Controller {

    public function __construct()
    {
        $this->middleware("auth");
    }

	public function lists(){
        return Faculty::all(['ADVISER as text', 'ADVIIDNO as value']);
	}

}
