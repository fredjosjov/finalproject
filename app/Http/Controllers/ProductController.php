<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        if(session()->has('credentials')){
            $product = Product::all();
            $store = \App\Models\Store::all();
            return view('product.index', ['product'=>$product, 'store'=>$store]);
        }else{
            return redirect('/');
        }
    }

    public function addToCart(Request $request)
    {
        return $request;
    }

    public function show(Product $product)
    {
        return $product;
    }
}
