<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BillMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $data;
    public $view;
    public $cart;

    public function __construct($input_a, $input_b, $input_c, $input_d)
    {
        $this->subject = $input_a;
        $this->data = $input_b;
        $this->view = $input_c;
        $this->cart = $input_d;
    }

    public function build()
    {
        return $this->subject($this->subject)->view($this->view, $this->data, $this->cart);
    }
}
