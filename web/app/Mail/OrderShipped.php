<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $setting;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$setting)
    {
        $this->order = $order;
        $this->setting = $setting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = $this->order;
        $setting = $this->setting;
        // dd($order);
        return $this->from('codezeera@gmail.com', 'Order Created')
                ->view('email',compact('order','setting'));

               
                
                
    }
}
