<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Order::factory()->create();
        $store = \App\Models\Seller::get()->random(1)->first()->store;
        $products = $store->products->random(random_int(1, count($store->products)));
        $order = \App\Models\Order::get()->last();
        $totalAmount = 0;
        foreach ($products as $product) {
            $quantity = random_int(0, 10);
            $totalProductPrice = $product->price * $quantity;
            DB::table('order_details')->insertOrIgnore([
                ['order_id' => $order->id, 'product_id' => $product->id, 'quantity' => $quantity, 'price' => $totalProductPrice]
            ]);
            $totalAmount += $totalProductPrice;
        }
        DB::table('orders')->where('id', $order->id)->update(['totalAmount' => $totalAmount]);
    }
}
