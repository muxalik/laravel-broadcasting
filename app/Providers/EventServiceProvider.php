<?php

namespace App\Providers;

use App\Events\OrderCreated;
use App\Events\ProductCreated;
use App\Events\UserCreated;
use App\Events\UserLoggedIn;
use App\Listeners\OrderCreatedListener;
use App\Listeners\ProductCreatedListener;
use App\Listeners\UserCreatedListener;
use App\Listeners\UserLoggedInListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserLoggedIn::class => [
            UserLoggedInListener::class,
        ],
        UserCreated::class => [
            UserCreatedListener::class,
        ],
        ProductCreated::class => [
            ProductCreatedListener::class,
        ],
        OrderCreated::class => [
            OrderCreatedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
