<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class NormalController extends Controller
{
    public function index()
    {
    	echo "<br>strike one, this guy controlls";
    }

    public function makeYourWebsiteWithTheUrl(string $content = 'default')
    {
        echo "<br>this don't have CSRF protection. Enjoy!!<br>";
        echo "Try <a href=\"http://127.0.0.1:8000/normal/make-website/%3Cb%3EHello%20there%3Cbr%3E%3Cbig%3Ethis%20work%3Cbig%3E\">this!</a><br>";
    	echo $content . "<br>";
    }

    public function show()
    {
    	echo "<br>this is a must, one of my favorite shows:";
    	echo "Kaguya-sama - Love is War";
    }

    public function postProfile($value='')
    {
    	echo "post profile";
    	echo $value;
    }
}
