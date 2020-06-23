<?php

namespace App\Listeners;

use App\Events\NewSurveyHasCompletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyNewSurveyViaSlackListener
{
    /**
     * Handle the event.
     *
     * @param  NewSurveyHasCompletedEvent  $event
     * @return void
     */
    public function handle(NewSurveyHasCompletedEvent $event)
    {
        dump('every hear me, pls, somobody completed the survey, this channel is slack');
    }
}
