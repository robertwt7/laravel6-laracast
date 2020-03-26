<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMe extends Mailable
{
    use Queueable, SerializesModels;

    // Any public property on mail class will be available on the view
    public $topic;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $topic)
    {
        $this->topic = $topic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Use --markdown=emails.contact-me when using artisan make:mail command to generate boilerplate for markdown emails
        // it also generate the views in the emails folder and create contact-me blade file

        // return $this->view('emails.contact-me')
        //         ->subject('More information about '.$this->topic);

        return $this->markdown('emails.contact-markdown');
    }
}
