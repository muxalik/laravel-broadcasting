<?php

namespace App\Jobs;

use App\Enums\OrderStatus;
use App\Events\OrderStatusChanged;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ChangeOrderStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected Order $order
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $currentStatus = $this->order->status;
        $newStatus = "";
        $found = false;

        foreach (OrderStatus::values() as $status) {
            if ($found) {
                $newStatus = $status;
                break;
            } 

            if ($currentStatus == $status) {
                $found = true;
            }
        }

        if ($newStatus == "") {
            Log::debug('Order completed!!!!!!!!');
            return;
        }

        $this->order->update([
            'status' => $newStatus,
        ]);

        event(new OrderStatusChanged($this->order));
        
        ChangeOrderStatus::dispatch($this->order)->delay(now()->addSeconds(mt_rand(10, 20)));
    }
}
