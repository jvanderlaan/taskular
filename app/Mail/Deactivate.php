<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Deactivate extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $admins;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $admins)
    {
        //
        $this->name = $name;
        $this->admins = $admins;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.deactivate');
    }
}
