<?php

namespace App\Jobs;

use App\Events\OrderCreated;
use App\Events\ProductCreated;
use App\Events\UserCreated;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProgramRun implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $userCount = User::nonAdmin()->count() + 3;
        $productCount = Product::count() + 3;
        $orderCount = Order::count() + 3;

        CreateProduct::dispatch()->delay(now()->addSeconds(1));
        CreateProduct::dispatch()->delay(now()->addSeconds(3));
        CreateProduct::dispatch()->delay(now()->addSeconds(7));

        CreateUser::dispatch()->delay(now()->addSeconds(1));
        CreateUser::dispatch()->delay(now()->addSeconds(3));
        CreateUser::dispatch()->delay(now()->addSeconds(7));

        CreateOrder::dispatch()->delay(now()->addSeconds(1));
        CreateOrder::dispatch()->delay(now()->addSeconds(3));
        CreateOrder::dispatch()->delay(now()->addSeconds(7));
        
        $i = 0;

        while (true) {
            if ($userCount < 10) {
                CreateUser::dispatch()->delay(now()->addSeconds(20 * ($i + 1)));

                $userCount++;
            }

            if ($productCount < 10) {
                CreateProduct::dispatch()->delay(now()->addSeconds(20 * ($i + 1)));

                $productCount++;
            }

            if ($orderCount < 10) {
                CreateOrder::dispatch()->delay(now()->addSeconds(15 * ($i + 1)));
                
                $orderCount++;
            }
            
            ChangeProductPrice::dispatch()->delay(now()->addSeconds(10 * ($i + 1)));

            $i++;
        }
    }
}
