<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        $products = Product::factory(1)->create();
        $order = Order::factory()->create();

        $products->random(mt_rand(1, $products->count()))->each(function ($product) use ($order) {
            $quantity = mt_rand(1, 5);
            
            $product->orders()->attach($order->id, [
                'quantity' => $quantity,
            ]);
        });

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.ru',
            'password' => bcrypt('password'),
        ]);
    }
}
