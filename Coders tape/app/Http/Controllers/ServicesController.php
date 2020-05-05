<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
	public function index()
	{
		$services = [
			'Service 1',
			'Service 2',
			'Service 3',
			'Service 4',
		];
		return view('services', compact('services'));
	}
}
