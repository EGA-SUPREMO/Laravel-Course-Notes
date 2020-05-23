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

	public function __construct($currency)
	{
		$this -> currency = $currency;
	}
	
	function charge(int $amount): array
	{
		$details = [
			'amount' => $amount,
			'confirmation_number' => Str::random(),
			'currency' => $this -> currency,
		];

		return $details;
	}
}