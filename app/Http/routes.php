<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'PagesController@index');
Route::get('/', function(){
    return redirect('surveys/available');
});


Route::get('surveys/available',  [
    'middleware' => ['auth'],
    'uses' => 'SurveysController@available'
]);

Route::get('surveys/takeSurvey/{id}',  [
    'uses' => 'SurveysController@takeSurvey',
    'middleware' => 'surveyTaken'
]);

Route::post('surveys/takeSurvey', 'SurveysController@recordResult');

Route::get('surveys/toggleActive/{id}', [
    'uses' => 'SurveysController@toggleActive'
]);

Route::get('surveys/data/', [
    'uses' => 'SurveysController@getData'
]);

Route::get('questionSets/data/', [
    'uses' => 'QuestionSetsController@getData'
]);

Route::get('surveys/result/{id}', [
    'uses' => 'SurveysController@viewResult'
]);


Route::resource('surveys', 'SurveysController');

Route::resource('questionSets', 'QuestionSetsController');

Route::resource('questions', 'QuestionsController');

//Route::resource('questionTypes', 'QuestionTypeController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get("questionSetList", "QuestionSetsController@lists");
Route::get("facultyList", "FacultyController@lists");
Route::get("scheduleList/{faculty}", "SchedulesController@lists");
Route::get("subjectDetails/{schedule}", "SchedulesController@subjectDetails");

Route::get('register/confirm/{confirmation_token}', 'Auth\AuthController@confirmEmail');