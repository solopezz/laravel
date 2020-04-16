<?php

namespace App\Providers;

use App\Events\MessageWasRecibe;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationOwner
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
        //
    }
}
