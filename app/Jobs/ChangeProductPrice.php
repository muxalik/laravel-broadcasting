<?php

namespace App\Jobs;

use App\Events\ProductPriceChanged;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ChangeProductPrice implements ShouldQueue
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
        $products = Product::inRandomOrder()->take(mt_rand(1, 3))->get();

        $products->each(function ($product) {
            $product->update([
                'discount' => $this->calculateDiscount($product),
            ]);

            event(new ProductPriceChanged($product));
        });
    }

    protected function calculateDiscount(Product $product): int
    {
        $start = max(0, $product->discount - 5);
        $end = min(50, $product->discount + 5);
        $step = 5;

        $result = null;

        do {
            $result = fake()->randomElement(range($start, $end, $step));
        } while ($result == $product->discount);

        return $result;
    }
}
