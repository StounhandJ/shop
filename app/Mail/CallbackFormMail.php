<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallbackFormMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public string $phone;


    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }


    public function build()
    {
        return $this->markdown('mail.callback_form')
            ->subject("Просьба перезвонить");
    }
}
