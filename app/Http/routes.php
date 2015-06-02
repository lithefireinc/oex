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
    'uses' => 'SurveysController@takeSurvey'
]);

Route::post('surveys/takeSurvey', 'SurveysController@recordResult');

/* Routes for Datatables */
//Route::controllers([
//    'surveys' => 'SurveysController'
//]);
Route::get('active/{id}', [
    'uses' => 'SurveysController@update'
]);
Route::get('surveys', [
    'uses' => 'SurveysController@getIndex'
]);
Route::get('surveys/data', [
    'uses' => 'SurveysController@getData'
]);


Route::resource('surveys', 'SurveysController');

Route::resource('questionSets', 'QuestionSetsController');

//Route::resource('questionTypes', 'QuestionTypeController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


