<?php
namespace App\Providers;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\MessageWasRecibe' => [
        'App\Listeners\SendAutoResponse',
        'App\Listeners\SendNotificationOwner',
        ],
        'App\Events\ProjectCreated' => [
        'App\Listeners\NotifyUserAboutNewProjec',
        ],
    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        //
    }
}