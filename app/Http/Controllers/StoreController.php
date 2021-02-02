<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Order;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class StoreController extends Controller
{
    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @param Store $store
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function stats(Store $store)
    {
        if (session()->has('credentials')) {
            $orders = $store->orders()->get()->sortBy('created_at');
            $revenue = 0;

            foreach ($orders as $order) {
                $revenue += $order->totalAmount;
            }

            $recentOrders = Order::orderBy('created_at', 'DESC')->where('store_id', $store->id)->get();
            return view('stores.analytics.dashboard', [
                'store' => $store,
                'products' => $store->products(),
                'activeProducts' => $store->products()->where('is_active', true),
                'orders' => $orders,
                'completedOrders' => $orders->where('status', 'Completed'),
                'revenue' => $revenue,
                'activities' => $recentOrders
            ]);
        } else {
            return redirect('/');
        }
    }

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @param Store $store
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function showProfile(Store $store)
    {
        if(session()->has('credentials')){
            return view('stores.profile', ['store' => $store]);
        }
        else {
            return redirect('/');
        }
    }
}
