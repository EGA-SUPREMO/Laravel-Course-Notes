<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

use App\Mail\NewSurveyMail;

class NotifyNewSurveyViaEmailListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        sleep(40);

        Mail::to('you@at.com') -> send(new NewSurveyMail($event -> survey));
    }
}
