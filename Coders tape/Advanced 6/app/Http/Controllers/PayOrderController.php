<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Orders\OrderDetails;
use App\Billing\PaymentGateway;

use Illuminate\Http\Request;

class PayOrderController extends Controller
{
	public function store(OrderDetails $orderDetails, PaymentGateway $paymentGateway): void
	{
		$order = $orderDetails-> all();
		dd($paymentGateway -> charge(2500));
	}
}
