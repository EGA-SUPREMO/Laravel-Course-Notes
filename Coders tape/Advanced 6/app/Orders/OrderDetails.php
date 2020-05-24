<?php
declare(strict_types=1);

namespace App\Orders;

use App\Billing\PaymentGatewayContract;
/**
 * 
 */
class OrderDetails {

	private $paymentGateway;

	function __construct(PaymentGatewayContract $paymentGateway)
	{
		$this->paymentGateway = $paymentGateway;
	}

	public function all()
	{
		$this -> paymentGateway -> setDiscount(500);

		$infos = [
			'address' => 'Darkest Desert',
			'name' => 'Ega'
		];
		return $infos;
	}

}
