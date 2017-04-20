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
        'App\Events\DetailPageAccess' => [
            'App\Listeners\PageViewIncrement',
        ],
        'App\Events\NewUserWelcome' => [
            'App\Listeners\SendMailNewUser',
        ],
        'App\Events\NewOrderThanks' => [
            'App\Listeners\SendOrderDetail',
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
