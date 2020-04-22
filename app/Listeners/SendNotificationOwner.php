<?php

namespace App\Listeners;

use App\Events\MessageWasRecibe;
use App\Mail\MessageSend;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotificationOwner implements ShouldQueue
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
        Mail::to('jefe.isc@gmail.com')->queue(new MessageSend($event->msj));
    }
}
