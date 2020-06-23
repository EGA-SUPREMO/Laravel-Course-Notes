<?php

namespace App\Listeners;

use App\Events\NewSurveyHasCompletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateSurveyResponsesListener
{
    /**
     * Handle the event.
     *
     * @param  NewSurveyHasCompletedEvent  $event
     * @return void
     */
    public function handle(NewSurveyHasCompletedEvent $event)
    {
        $event->survey -> responses() -> createMany($event->surveyResponses);
    }
}
