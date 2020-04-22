<?php

namespace App\Providers;

use App\Interfaces\MessagesInterface;
use App\Repo\CacheMessages;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            MessagesInterface::class,
            CacheMessages::class
        );
    }
}
