<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\OrderDetails;
use App\Models\Order;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('credentials')){
            $orderHistory = History::where('customer_id', session('custId'))
                                    ->join('sellers', 'sellers.id', '=', 'orders.seller_id')
                                    ->join('stores', 'stores.seller_id', '=', 'sellers.id')
                                    ->get();
            return view('history.index', compact('orderHistory'));
        }else{
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetails  $orderDetails
//     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
//        $orderDetails = \App\Models\OrderDetails::where('order_id', $request->orderId)
//                        ->join('products', 'products.id', '=', 'order_details.product_id')
//                        ->get();

        $order = Order::get()->where('id', $request->orderId);
        $products = $order->products;

//        return view('history.detail', compact('orderDetails'));
        return view('history.detail', [
            'order' => $order,
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        //
    }
}
