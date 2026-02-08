<?php

namespace App\Mail;

use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class NewsletterSubscription extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The newsletter subscriber instance.
     *
     * @var \App\Models\NewsletterSubscriber
     */
    public $subscriber;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\NewsletterSubscriber  $subscriber
     * @return void
     */
    public function __construct(NewsletterSubscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $unsubscribeUrl = URL::signedRoute('newsletter.unsubscribe', ['id' => $this->subscriber->id]);

        return $this->subject('Welcome to SideQuest Newsletter!')
                    ->from('no-reply@sidequestph.com', 'SideQuest Philippines')
                    ->replyTo('no-reply@sidequestph.com', 'SideQuest Philippines')
                    ->view('emails.newsletter')
                    ->with(['unsubscribeUrl' => $unsubscribeUrl]);
    }
}
