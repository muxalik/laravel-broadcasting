<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Jobs\ChangeOrderStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class OrderCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        Log::info('Order created', ['order' => $event->order]);

        ChangeOrderStatus::dispatch($event->order)->delay(now()->addSeconds(mt_rand(10, 20)));
    }
}
