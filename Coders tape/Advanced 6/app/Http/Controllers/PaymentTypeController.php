<?php

namespace App\Http\Controllers;

use App\PaymentType;

use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
	public function index()
	{
		$paymentTypes = PaymentType::all();

		return view('paymentType.index', compact('paymentTypes'));
	}
}
