<?php

namespace App\Mail;

use App\Models\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterUser extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The order instance.
     *
     * @var Contact
     */
    public $newsletter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('fatboar.contact@gmail.com')
                    ->subject($this->newsletter->titre)
                    ->view('emails.newsletter_user')
                    ->with('newsletter', $this->newsletter);
    }
}
