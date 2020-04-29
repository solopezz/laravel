<?php

namespace App\Listeners;

use App\Events\ProjectCreated;
use App\Models\User;
use App\Notifications\ProjectPublished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
//ShouldQueue es importane implemntar coas si el trabajo es tardado por ejemplo enviar notificacion a 1000 usuario cuando un proyecto es creado 
class NotifyUserAboutNewProjec implements ShouldQueue
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
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        //Notificaion por emai masivos cuando se crea un proyecto se envia a todos los usuarios
        $users = User::all();
        Notification::send($users, new ProjectPublished($event->project));
    }
}
