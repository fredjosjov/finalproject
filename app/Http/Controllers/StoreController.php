<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class StoreController extends Controller
{
    //

    public function stats(Store $store){
        $orders = $store->orders()->get();
        $revenue = 0 ;
        foreach($orders as $order){
            $revenue += $order->totalAmount;
        }
        return view('stores.analytics.dashboard', [
            'store' => $store,
            'products' => $store->products(),
            'orders' => $orders,
            'revenue' => $revenue
            ]);
    }
}
