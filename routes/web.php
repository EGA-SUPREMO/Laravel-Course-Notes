<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/role/{roleType?}', 'TestController@index') -> middleware('role');

//Route::get('/terminate', 'NormalController@index') -> middleware('terminate');

	/*function ($roleType='peasant')
{
	[
		'middleware' => "role:$roleType",
		'uses' => 'TestController@index',
	];
	return ;
});

Route::get('terminate',[
   'middleware' => 'terminate',
   'uses' => 'ABCController@index',
]);

*/
Route::controller('/just-a-normal-day', 'NormalController') -> middleware('terminate');

Route::get('user/dashboard', 'UserController@showPath') -> middleware('first');

Route::resource('mymy', 'MyController');