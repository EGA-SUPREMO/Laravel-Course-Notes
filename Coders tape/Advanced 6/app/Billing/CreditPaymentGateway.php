<?php
declare(strict_types=1);

namespace App\Billing;

use Illuminate\Support\Str;
/**
 * 
 */
class CreditPaymentGateway implements PaymentGatewayContract
{
	private string $currency;
	private int $discount;

	public function __construct($currency)
	{
		$this -> currency = $currency;
		$this -> discount = 0;
	}

	public function setDiscount(int $amount): void
	{
		$this -> discount = $amount;
	}
	
	public function charge(int $amount): array
	{
		$fees = $amount * 0.03;

		$details = [
			'amount' => ($amount - $this -> discount) + $fees,
			'confirmation_number' => Str::random(),
			'currency' => $this -> currency,
			'discount' => $this -> discount,
			'fees' => $fees,
		];

		return $details;
	}
}