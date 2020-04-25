<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct($request)
	{
		$this ->  middleware('Second');
	}

	public function showPath($request)
	{
		echo "<br>";
		$uri = $request -> path();
		echo $uri;

		echo "<br>";
		$url = $request -> url();
		echo $url;

		echo "<br> $request -> method()";

	}
}
