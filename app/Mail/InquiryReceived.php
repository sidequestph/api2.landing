<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The lead instance.
     *
     * @var \App\Models\Lead
     */
    public $lead;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Lead  $lead
     * @return void
     */
    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Inquiry Received: ' . $this->lead->interest)
                    ->view('emails.inquiry');
    }
}
