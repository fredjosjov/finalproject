<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;

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

    public function indexStore(string $id){
        $store = Store::find($id);
        return view('stores.products.index', [
            'store' => $store,
            'activeListing' => $store->products->where('is_active', $id),
            'products' => $store->products
        ]);
    }
}
