<?php
declare(strict_types=1);

namespace App\Billing;

use Illuminate\Support\Str;
/**
 * 
 */
interface PaymentGatewayContract
{
	function setDiscount(int $amount): void;
	
	function charge(int $amount): array;
}