<?php

namespace App\Listeners;

use App\Events\MessageWasRecibe;
use App\Mail\MessageSend;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAutoResponse
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageWasRecibe  $event
     * @return void
     */
    public function handle(MessageWasRecibe $event)
    {
        //queue envio de correo en segundo plano osea retorna el mensaje si que tal vez el correo aun no se envie 
        Mail::to('solopez.isc@gmail.com')->queue(new MessageSend($event->msj));
    }
}
