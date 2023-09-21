<?php

namespace App\Jobs;

use App\Mail\sendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $mail_to;
    private $subject;
    private $data;
    private $view;

    public function __construct($input_a, $input_b, $input_c, $input_d)
    {
        $this->mail_to = $input_a;
        $this->subject = $input_b;
        $this->data = $input_c;
        $this->view = $input_d;
    }

    public function handle()
    {
        Mail::to($this->mail_to)->send(new sendMail($this->subject, $this->data, $this->view));
        // Ai gọi JOB này, cần cấp $x['email'] và $x['tieu_de'], $x['full_name'], $x['link']
    }
}
