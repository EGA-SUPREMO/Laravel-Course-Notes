<?php

namespace App\Http\View\Composers;

use App\PaymentType;

use Illuminate\View\View;
/**
 * 
 */
class PaymentTypeComposer
{
	
	public function compose(View $view)
	{
        $view -> with('paymentTypes', PaymentType::orderBy('name', 'desc') -> get());
	}
}