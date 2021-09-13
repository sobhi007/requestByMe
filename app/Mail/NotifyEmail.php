<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data ;
    public function __construct($name)
    {
        $this->data=$name;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //  $x =$this->data;
         return $this->view('Notification.notifyEmail');
    }
}
