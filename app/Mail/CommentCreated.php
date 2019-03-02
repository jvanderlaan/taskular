<?php

namespace App\Mail;

use App\Job;
use App\User;
use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $recipients;
    public $job;
    public $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job, $comment, $recipients)
    {
        //
        $this->recipients = $recipients;
        $this->job = $job;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.commentcreated');
    }
}
