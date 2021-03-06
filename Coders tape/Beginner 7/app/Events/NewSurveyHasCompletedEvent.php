<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Survey;

class NewSurveyHasCompletedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $survey;
    public $surveyResponses;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Survey $survey, array $surveyResponses)
    {
        $this -> survey = $survey;
        $this -> surveyResponses = $surveyResponses;
    }
}
