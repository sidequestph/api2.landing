<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UnsubscribeConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Quest Update: You\'ve Unsubscribed')
                    ->from('no-reply@sidequestph.com', 'SideQuest Philippines')
                    ->replyTo('no-reply@sidequestph.com', 'SideQuest Philippines')
                    ->view('emails.unsubscribe_confirmation');
    }
}
