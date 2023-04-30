<?php

namespace App\Listeners;

use App\Events\OrderDeleted;
use App\Jobs\CreateOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class OrderDeletedListener
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
    public function handle(OrderDeleted $event): void
    {
        Log::info('Order deleted', ['order_id' => $event->id]);

        CreateOrder::dispatch()->delay(now()->addSeconds(10));
    }
}
