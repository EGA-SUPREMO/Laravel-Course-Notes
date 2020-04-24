<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(Request $request, string $roleType)
    {
    	echo "<br> What is $roleType?";
    	echo "<br> What is this?";
    	echo "<br> The TestController!";
    }
}
