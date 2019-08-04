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
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],

        'App\Events\UserWasCreated' => [
            'App\Listeners\UserWasCreatedSuccessfully',
        ],

        'App\Events\PromotionWasCreated' => [
            'App\Listeners\PromotionWasCreatedSuccessfully',
        ],

        'App\Events\UserWasNotified' => [
            'App\Listeners\UserWasNotifiedSuccessfully',
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
