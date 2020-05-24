<?php
declare(strict_types=1);

namespace App\Billing;

use Illuminate\Support\Str;
/**
 * 
 */
class PaymentGateway
{
	private string $currency;
	private int $discount;

	public function __construct($currency)
	{
		$this -> currency = $currency;
		$this -> discount = 0;
	}

	public function setDiscount($amount)
	{
		$this -> discount = $amount;
	}
	
	function charge(int $amount): array
	{
		$details = [
			'amount' => $amount,
			'confirmation_number' => Str::random(),
			'currency' => $this -> currency,
			'discount' => $this -> discount,
		];

		return $details;
	}
}