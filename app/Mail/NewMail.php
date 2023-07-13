<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;
    public $cart;
    public $recipient;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($lead, $cart, $recipient)
    {
        $this->lead = $lead;
        $this->cart = $cart;
        $this->recipient = $recipient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->recipient === 'client') {
            return $this->subject('New Mail - Client')->view('emails.lead.client');
        } elseif ($this->recipient === 'owner') {
            return $this->subject('New Mail - Owner')->view('emails.lead.owner');
        }
    }
}
