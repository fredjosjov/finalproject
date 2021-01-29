<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

    }

    public function show(Store $store, string $id)
    {
        $order = Order::where('id', $id)->get()->first();
        return view('stores.orders.show', [
            'order' => $order,
            'products' => $order->products,
            'store' => $order->store
        ]);
    }
}
