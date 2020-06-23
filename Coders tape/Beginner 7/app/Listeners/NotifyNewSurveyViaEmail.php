<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

use App\Mail\NewSurveyMail;

class NotifyNewSurveyViaEmail
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to('you@at.com') -> send(new NewSurveyMail($event -> survey));
    }
}
