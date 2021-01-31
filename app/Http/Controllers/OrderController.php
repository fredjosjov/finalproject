<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Order;
// use App\Models\Product;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @param Store $store
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index(Store $store)
    {
        if (session()->has('credentials')) {
            $orders = $store->orders;
            return view('stores.orders.index', [
                'store' => $store,
                'orders' => $orders
            ]);
        } else {
            return redirect('/');
        }
    }

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @param Store $store
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show(Store $store, string $id)
    {
        if (session()->has('credentials')) {
            $order = Order::where('id', $id)->get()->first();
            return view('stores.orders.show', [
                'order' => $order,
                'products' => $order->products,
                'store' => $order->store
            ]);
        } else {
            return redirect('/');
        }
    }

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @param Store $store
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Store $store, int $id, Request $request)
    {
        if(session()->has('credentials')){
            $order = Order::find($id);
            $order->status = $request->status;
            $order->save();
            return view('stores.orders.show', [
                'store' => $store,
                'order' => $order,
                'message' => 'Successfully updated Order Status.'
            ]);
        } else{
            return redirect('/');
        }
    }
}
