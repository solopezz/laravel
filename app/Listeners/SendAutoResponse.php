<?php

namespace App\Listeners;

use App\Events\MessageWasRecibe;
use App\Mail\MessageSend;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
//implements ShouldQueue se impplente y ya que el envio del email es tardado lo delega a que despues lo realize
class SendAutoResponse implements ShouldQueue
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
