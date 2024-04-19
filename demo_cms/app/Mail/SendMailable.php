<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $name;
    public $folio;
     public $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $folio, $id)
    {
        $this->email = $email;
        $this->name = $name;
        $this->folio = $folio;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('correo@ejemplo.com','FROM')
                    ->subject('Asunto')
                    ->bcc(['correo@ejemplo.com'])
                    
                    ->view('emails.mailPlantilla');
    }

}
