<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;

use App\PaymentType;
use App\View\Composers\PaymentTypeComposer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function($app) {
            if(request()->has('credit'))
                return new CreditPaymentGateway('usd');
            return new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* Option 1, one for everyone
        View::share('paymentTypes', PaymentType::orderBy('name') -> get());*/
/*      Option 2, granular shit
        View::composer(['order.create', 'paymentType.index'], function($view)
        {
            $view -> with('paymentTypes', PaymentType::orderBy('name', 'desc') -> get());
        });*/
        // Option 3, classic, real deal here
        View::composer('components.partials.payment-type.*', PaymentTypeComposer::class);
    }
}
