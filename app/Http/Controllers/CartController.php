<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        $user = session('custId');
        $cart = Cart::where('customer_id', $user)
                        ->join('products', 'products.id', '=', 'carts.product_id')
                        ->join('stores', 'stores.id', '=', 'carts.store_id')
                        ->get();

        return view('cart.index', ['cart'=>$cart]);
    }

    public function addQty(Request $request)
    {
        $qty = $request->quantity + 1;

        Cart::where('cart_id', $request->id)
            ->update(['cart_quantity' => $qty]);

        return redirect('/cart');
    }

    public function minusQty(Request $request)
    {
        $qty = $request->quantity - 1;

        Cart::where('cart_id', $request->id)
            ->update(['cart_quantity' => $qty]);

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
            $cart->cart_quantity = '1';
            $cart->price = $request->price;
            $cart->save();
            return redirect("/product")->with('status', 'Product has been added to cart');
        }else{
            if(count($pp) == 0){
                $cart = new Cart;
                $cart->customer_id = session('custId');
                $cart->product_id = $request->productId;
                $cart->store_id = $request->storeId;
                $cart->cart_quantity = '1';
                $cart->price = $request->price;
                $cart->save();
                return redirect("/product")->with('status', 'Product has been added to cart');
            }else{
                foreach($pp as $p){
                    $qty = $p->cart_quantity + 1;
                    Cart::where('cart_id', $p->cart_id)
                        ->update(['cart_quantity' => $qty]);
                    return redirect("/product")->with('status', 'Product has been added to cart');
                }
            }
        }

        // return $request;
        // $cart = new Cart;
        // $cart->customer_id = session('custId');
        // $cart->product_id = $request->productId;
        // $cart->store_id = $request->storeId;
        // $cart->cart_quantity = '1';
        // $cart->price = $request->price;

        // $cart->save();
        // return redirect("/product")->with('status', 'Product has beend added to cart');
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
        Cart::destroy($cart->cart_id);
        return redirect('/cart');
        // return $cart;
    }
}
