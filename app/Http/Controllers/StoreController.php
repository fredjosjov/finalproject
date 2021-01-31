<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Order;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class StoreController extends Controller
{
    public function stats(Store $store)
    {
        $orders = $store->orders()->get();
        $revenue = 0;

        foreach ($orders as $order) {
            $revenue += $order->totalAmount;
        }

        $recentOrders = Order::orderBy('created_at', 'DESC')->where('store_id', $store->id)->get();
        return view('stores.analytics.dashboard', [
            'store' => $store,
            'products' => $store->products(),
            'orders' => $orders,
            'revenue' => $revenue,
            'activities' => $recentOrders
        ]);
    }

    public function showProfile(Store $store)
    {
        return view('stores.profile', ['store' => $store]);
    }
}
