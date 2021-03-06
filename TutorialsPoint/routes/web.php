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

Route::get('/weeb', ['as' => 'ya-hoo', function () {
    return view('ohayo');
}]);

Route::get('/weee', function () {
    return redirect() -> route('ya-hoo');
});

Route::get('/header/{type}', function (string $type)
{
	return response('helo!', 200) -> header('Content-type', $type)
   		->header('X-Header-One', 'Header Value')
   		->header('X-Header-Two', 'Header Value')
   		->withcookie('name','Virat Gandhi');;
});

Route::get('/json', function() {
   return response()->json(['name' => 'Virat Gandhi', 'state' => 'Gujarat']);
});

Route::get('/role/cookies/{roleType?}', 'TestController@index') -> middleware('role');
Route::get('/role/give-cookies', 'TestController@cookie') -> middleware('role');

Route::get('/role/cuukies', function () {
    return redirect() -> action('TestController@cookie');
});
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
Route::get('/normal', 'NormalController@index');

Route::get('/normal/just-a-normal-day', 'NormalController@show') -> middleware('terminate');
Route::get('/normal/make-website/{content?}', 'NormalController@makeYourWebsiteWithTheUrl') -> middleware('terminate');

Route::get('user/dashboard', 'UserController@showPath') -> middleware('first');

Route::resource('mymy', 'MyController');