<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $data;
    public $view;

    public function __construct($input_a, $input_b, $input_c)
    {
        $this->subject = $input_a;
        $this->data = $input_b;
        $this->view = $input_c;
    }

    public function build()
    {
        return $this->subject($this->subject)->view($this->view, $this->data);
    }
}
