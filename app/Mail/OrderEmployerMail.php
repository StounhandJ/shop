<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderEmployerMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Экземпляр заказа.
     *
     * @var Order
     */
    public Order $order;

    // public $queue = "Email";

    /**
     * Create a new message instance.
     * @param Order $order
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.employer')
            ->subject("Новый заказ");
    }
}
