<?php

namespace App\Mail;

use App\Costumer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    private $costumer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Costumer $costumer)
    {
        $this->costumer = $costumer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.welcome') -> with(['costumer' => $this ->costumer]);
    }
}
