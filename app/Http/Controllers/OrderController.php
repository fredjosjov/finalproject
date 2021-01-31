<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Order;
// use App\Models\Product;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Store $store)
    {
        $orders = $store->orders;
        return view('stores.orders.index', [
            'store' => $store,
            'orders' => $orders
        ]);
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

    public function update(Store $store, int $id, Request $request)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        return view('stores.orders.show', [
            'store' => $store,
            'order' => $order,
            'message' => 'Successfully updated Order Status.'
        ]);
    }
}
