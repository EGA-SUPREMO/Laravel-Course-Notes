<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\NewSurveyHasCompletedEvent;
use App\Listeners\NotifyNewSurveyViaEmailListener;
use App\Listeners\NotifyNewSurveyViaSlackListener;
use App\Listeners\CreateSurveyResponsesListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewSurveyHasCompletedEvent::class => [
            CreateSurveyResponsesListener::class,
            NotifyNewSurveyViaEmailListener::class,
            NotifyNewSurveyViaSlackListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
