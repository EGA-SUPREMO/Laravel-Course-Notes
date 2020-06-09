<?php

namespace App\Http\Controllers;

use App\PaymentType;

use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
	public function index()
	{
		return view('payment-type.index');
	}
}
