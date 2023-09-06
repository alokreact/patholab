<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $emaildata;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emaildata)
    {
        $this->emaildata = $emaildata;
    }

    /**
     * Build the message.s
     *
     * @return $this
     */
    public function build(){
        //return $this->view('view.name');
        $subject = 'Welcome CALL LABS!';         
        return $this->view('Email.email')->subject($subject);
    }
}
