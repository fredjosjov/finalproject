<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Order;
use \App\Models\Store;
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
        Order::factory()->create();
        $order = Order::get()->last();
        $store = Store::get()->where('id', $order->store_id);
        $totalAmount = 0;
        $products = $store->first()->products;

        foreach($products as $product){
            $quantity = random_int(1,10);
            DB::table('order_details')->insertOrIgnore([
                [
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price
                ]
            ]);
            $totalProductPrice = $product->price * $quantity;
            $totalAmount += $totalProductPrice;
        }
        DB::table('orders')->where('id', $order->id)->update([
            'totalAmount' => $totalAmount
        ]);
    }
}
