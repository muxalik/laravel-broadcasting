<?php

namespace App\Jobs;

use App\Events\OrderCreated;
use App\Events\ProductCreated;
use App\Events\UserCreated;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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
        $userCount = User::nonAdmin()->count();
        $productCount = Product::count();
        $orderCount = Order::count();

        while (true) {
            if ($userCount < 10) {
                $user = User::factory()->create();
                $userCount++;

                event(new UserCreated($user));
            }

            if ($productCount < 10) {
                $product = Product::factory()->create();
                $productCount++;

                event(new ProductCreated($product));
            }

            if ($orderCount < 10) {
                $order = Order::factory()->create();
                $products = Product::take(mt_rand(2, 5))->get();

                $products->each(function ($product) use ($order) {
                    $quantity = mt_rand(1, 5);

                    $product->orders()->attach($order->id, [
                        'quantity' => $quantity,
                    ]);
                });

                $orderCount++;

                event(new OrderCreated($order));
            }

            if ($orderCount >= 10 && $productCount >= 10 && $userCount >= 10) {
                break;
            }
        }
    }
}
