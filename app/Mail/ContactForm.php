<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $firstName;
    public $lastName;
    public $emailSubject;
    public $email;
    public $message;

    /**
     * Create a new message instance.
     *
     * @param $firstName
     * @param $lastName
     * @param $emailSubject
     * @param $email
     * @param $message
     */
    public function __construct($firstName, $lastName, $emailSubject, $email, $message)
    {
        //
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->emailSubject = $emailSubject;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact-form')
            ->subject('Contact Form: '.$this->emailSubject);
    }
}
