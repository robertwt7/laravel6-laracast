<?php

namespace App\Providers;

use App\Events\ProductPurchased;
use App\Listeners\AwardAchievements;
use App\Listeners\SendShareableCoupon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // This is redundant now because of the overrider at the bottom for shouldDiscoverEvents
        ProductPurchased::class => [
            AwardAchievements::class,
            SendShareableCoupon::class,
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

    // NOTE: if this is returned as true, it overrides method of the EventServiceProvider
    // To discover the event by php reflection api, so we don't need to wire the event and listener (Like what we did above at $listen array)
    // Instead it will try to find the event that is in the parameter of the listener by itself
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
