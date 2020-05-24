<?php
declare(strict_types=1);

namespace App\Billing;

use Illuminate\Support\Str;
/**
 * 
 */
class BankPaymentGateway implements PaymentGatewayContract
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
		$details = [
			'amount' => $amount - $this -> discount,
			'confirmation_number' => Str::random(),
			'currency' => $this -> currency,
			'discount' => $this -> discount,
		];

		return $details;
	}
}