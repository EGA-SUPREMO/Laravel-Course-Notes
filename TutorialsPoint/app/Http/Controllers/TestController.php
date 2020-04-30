<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(Request $request, string $roleType)
    {
    	echo "<br> What is $roleType?";
    	echo "<br> The TestController!" . $varPublicInEveryView;

    	$minutes = 10;
    	$response = new Response("hola");

    	$cookieUsername = cookie('username', 'Gerardo', $minutes);
    	$cookieRoleType = cookie('roleType', $roleType, $minutes);
    	$response -> withCookie($cookieUsername);
    	$response -> withCookie($cookieRoleType);

    	$name = $request->query('name');
    	echo $name;

    	return $response;
    }
    public function cookie(Request $request)
    {
    	echo "<br>" . Cookie::get('username');
    	echo "<br>" . $request->cookie('roleType');
    }
}
