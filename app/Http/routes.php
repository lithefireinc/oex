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
    'middleware' => ['auth'],
    'uses' => 'SurveysController@takeSurvey'
]);

Route::post('surveys/takeSurvey', 'SurveysController@storeTakeSurvey');

Route::resource('surveys', 'SurveysController');

Route::resource('questionSets', 'QuestionSetsController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


