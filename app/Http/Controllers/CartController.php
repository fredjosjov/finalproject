<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Apps\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('credentials')){
            $user = session('custId');
            // $cart = Cart::where('customer_id', $user)
            //                 ->join('products', 'products.id', '=', 'carts.product_id')
            //                 ->join('stores', 'stores.id', '=', 'carts.store_id')
            //                 ->get();

            $cart = Cart::where('customer_id', $user)->get();
            return view('cart.index', compact('cart'));
        }else{
            return redirect('/');
        }
    }

    public function addQty(Request $request)
    {
        $qty = $request->quantity + 1;
        $price = $qty * $request->price;
        // return $price;

        Cart::where('id', $request->id)
            ->update(['quantity' => $qty,
                    'price' => $price]);

        return redirect('/cart');
    }

    public function minusQty(Request $request)
    {
        $qty = $request->quantity - 1;
        $price = $qty * $request->price;
        // return $price;

        Cart::where('id', $request->id)
            ->update(['quantity' => $qty,
                    'price' => $price]);

        return redirect('/cart');
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
        $cp = Cart::where('customer_id', session('custId'))->get();
        $pp = Cart::where('customer_id', session('custId'))
                    ->where('product_id', $request->productId)
                    ->get();
        
        if(count($cp) == 0){
            $cart = new Cart;
            $cart->customer_id = session('custId');
            $cart->product_id = $request->productId;
            $cart->store_id = $request->storeId;
            $cart->quantity = '1';
            $cart->price = $request->price;
            $cart->save();
            return redirect("/product")->with('status', 'Product has been added to cart');
        }else{
            if(count($pp) == 0){
                $cart = new Cart;
                $cart->customer_id = session('custId');
                $cart->product_id = $request->productId;
                $cart->store_id = $request->storeId;
                $cart->quantity = '1';
                $cart->price = $request->price;
                $cart->save();
                return redirect("/product")->with('status', 'Product has been added to cart');
            }else{
                foreach($pp as $p){
                    $qty = $p->quantity + 1;
                    Cart::where('id', $p->id)
                        ->update(['quantity' => $qty]);
                    return redirect("/product")->with('status', 'Product has been added to cart');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return $cart;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        Cart::destroy($cart->id);
        return redirect('/cart');
        // return $cart;
    }
}
