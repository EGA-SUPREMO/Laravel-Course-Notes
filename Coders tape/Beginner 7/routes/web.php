<?php

use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeMail;
use App\Costumer;
use App\User;
use App\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/costumers');
});

Route::view('/about-us', 'aboutUs');
Route::get('/service', 'ServicesController@index');
Route::post('/service', 'ServicesController@store');

Route::get('/costumers', 'CostumerController@index') -> middleware('test');
Route::get('/costumers/create', 'CostumerController@create');
Route::post('/costumers', 'CostumerController@store');
Route::get('/costumers/{costumer}', 'CostumerController@show')->middleware('can:view,costumer');
Route::get('/costumers/{costumer}/edit', 'CostumerController@edit');
Route::patch('/costumers/{costumer}', 'CostumerController@update');
Route::delete('/costumers/{costumer}', 'CostumerController@destroy');

Route::get('/email', function()
{
	return new WelcomeMail(new Costumer());
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/questionnaires', 'QuestionnaireController');
Route::resource('/questionnaires/{questionnaire}/questions', 'QuestionController');

Route::get('/survey/{questionnaire}-{slug}', 'SurveyController@show');//Purposefully not following the RESTful controllers cuz I want to document the slug usage
Route::post('/survey/{questionnaire}-{slug}', 'SurveyController@store');

Route::get('/relationships', function()
{
	$user = User::first();

	$roles = Role::all();

	$user->roles()->attach($roles);

});