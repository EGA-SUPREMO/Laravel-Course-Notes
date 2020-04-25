<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class NormalController extends Controller
{
    public function getIndex()
    {
    	echo "<br>strike one, this guy controlls";
    }

    public function getMadeYourWebsiteWithTheUrl(string $content = 'default')
    {
    	echo $content;
    }

    public function getShow()
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
