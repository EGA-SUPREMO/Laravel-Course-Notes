<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;

use Illuminate\Http\Request;

class PayOrderController extends Controller
{
	public function store(PaymentGateway $paymentGateway): void
	{
		dd($paymentGateway -> charge(2500));
	}
}
