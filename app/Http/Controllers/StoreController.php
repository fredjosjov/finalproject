<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class StoreController extends Controller
{
    public function stats(Store $store){
        $orders = $store->orders()->get();
        $revenue = 0 ;
        $chartDisplay = false;
        foreach($orders as $order){
            $revenue += $order->totalAmount;
        }
        //TODO: total revenue categorization per day
        $chartData = $orders->pluck('created_at', 'totalAmount');
        //TODO: 5 most recent activity of the store
        return view('stores.analytics.dashboard', [
            'store' => $store,
            'products' => $store->products(),
            'orders' => $orders,
            'revenue' => $revenue,
            'charts' => $chartDisplay,
            'chartData' => $chartData->all(),
            ]);
    }
}
