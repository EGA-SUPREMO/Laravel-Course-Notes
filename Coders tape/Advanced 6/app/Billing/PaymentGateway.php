<?php
declare(strict_types=1);

namespace App\Billing;

/**
 * 
 */
class PaymentGateway
{
	
	function charge(int $amount): array
	{
		$details = [
			'amount' => $amount,
			'confirmation_number' => Str::random(),
		];

		return $details
	}
}