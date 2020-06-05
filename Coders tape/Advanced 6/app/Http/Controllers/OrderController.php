<?php

namespace App\Http\Controllers;

use App\PaymentType;

use Illuminate\Http\Request;

class OrderController extends Controller
{
	public function create()
	{
		return view('order.create');
	}
}
