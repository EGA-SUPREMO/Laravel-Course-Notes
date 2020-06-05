<?php

namespace App\Http\Controllers;

use App\PaymentType;

use Illuminate\Http\Request;

class OrderController extends Controller
{
	public function create()
	{
		$paymentTypes = PaymentType::all();

		return view('order.create', compact('paymentTypes'));
	}
}
