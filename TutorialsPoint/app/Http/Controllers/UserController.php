<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests;
//use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function __construct()
	{
		$this ->  middleware('second');
	}

	public function showPath(Request $request)
	{
		echo "<br>";
		$uri = $request -> path();
		echo "URI: ".$uri;

		echo "<br>";
		$url = $request -> url();
		echo "URL: ".$url;

		$pattern = $request->is('foo/*');
      	echo 'is Method: '.$pattern;
		$pattern = $request->is('user/*');
      	echo 'is Method: '.$pattern;
      	echo '<br>';

		echo "<br>Method: $request -> method()";

	}
}
