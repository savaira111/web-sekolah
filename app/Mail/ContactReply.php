<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReply extends Mailable
{
    use Queueable, SerializesModels;

    public $replyMessage;
    public $originalMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($replyMessage, $originalMessage)
    {
        $this->replyMessage = $replyMessage;
        $this->originalMessage = $originalMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Re: ' . $this->originalMessage->subject)
                    ->markdown('emails.contact-reply');
    }
}
