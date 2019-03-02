<?php

namespace App\Mail;

use App\Job;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $recipients;
    public $job;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job, $recipients)
    {
        //
        $this->recipients = $recipients;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.jobupdated');
    }
}
