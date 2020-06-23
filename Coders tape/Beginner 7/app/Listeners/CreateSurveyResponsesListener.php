<?php

namespace App\Providers;

use App\Events\NewSurveyHasCompletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateSurveyResponsesListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewSurveyHasCompletedEvent  $event
     * @return void
     */
    public function handle(NewSurveyHasCompletedEvent $event)
    {
        //
    }
}
