<?php

namespace App\Jobs;

use App\Events\OrderCreated;
use App\Events\ProductBought;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CreateOrder implements ShouldQueue
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
        $order = Order::factory()->create();
        $products = Product::where('quantity', '>', '0')->inRandomOrder()->take(mt_rand(2, 5))->get();

        $products->each(function ($product) use ($order) {
            $quantity = mt_rand(1, min(5, $product->quantity));

            $product->orders()->attach($order->id, [
                'quantity' => $quantity,
            ]);
        });

        event(new OrderCreated($order));
        
        $order->products->each(function ($product) {
            $amount = $product->pivot->quantity;

            $product->increment('times_bought', $amount);
            $product->decrement('quantity', $amount);
            
            event(new ProductBought($product));
        });
    }
}
