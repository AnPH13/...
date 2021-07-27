<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Request;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name = "";
    protected $message = "";
    protected $title = "";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->name = $request->name;
        $this->message = $request->message;
        $this->title = $request->title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('hoangan@gmail.com', 'hoangan')
            ->subject('hello')
            ->markdown('sendMail')
            ->with([
                'name'=>$this->name,
                'message'=>$this->message,
                'title'=>$this->title,
            ]);
    }
}
