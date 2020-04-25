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

		echo "<br>Method: $request -> method()";

	}
}
