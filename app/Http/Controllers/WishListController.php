<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Cart;


use Illuminate\Support\Carbon;

class WishListController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::join('products', 'wishlists.product_id', '=', 'products.id')
            ->where('customer_id', '=', session('custId'))
            ->select('wishlists.*', 'products.name', 'products.quantity', 'products.description', 'products.price', 'products.image')->get();
        return view('wishlist.index', ['wishlist' => $wishlist]);
    }

    public function addWishlist($id)
    {
        $wishlist =  Wishlist::where('product_id', '=', $id)->where('customer_id', '=', session('custId'))->first();
        $product = Product::where('id', '=', $id)->first();
        $isExist = 0;
        try {
            if (is_null($wishlist)) {
                Wishlist::create([
                    'customer_id' => session('custId'),
                    'product_id' => $product->id,
                    'store_id' => $product->store_id,
                    'date_added' => Carbon::now()->format('Y-m-d h:i:s'),
                ]);
            } else {
                $isExist = 1;
                $wishlist->delete();
            }
        } catch (\Exception $exception) {
            //return back()->with($notification);
            return response()->json(['message' => $exception->getMessage(), 'status' => 'error']);
        }
        return response()->json(['message' => 'success', 'status' => $isExist]); // Return OK to user's browser
    }

    public function addCart($id)
    {

        $cart =  Cart::where('product_id', '=', $id)->first();
        $product = Product::where('id', '=', $id)->first();

        try {
            if (is_null($cart)) {
                Cart::create([
                    'customer_id' => session('custId'),
                    'product_id' => $id,
                    'store_id' => $product->store_id,
                    'quantity' => 1,
                    'price' => $product->price
                ]);
            } else {
                $cart->quantity = $cart->quantity + 1;
                $cart->price = $cart->price + $product->price;
                $cart->save();

                $notification = array(
                    'message' => 'Cart added successfully!',
                    'alert-type' => 'success'
                );
            }
        } catch (\Exception $exception) {
            $notification = array(
                'message' => 'Failed to add Cart!',
                'alert-type' => 'error'
            );
            //return back()->with($notification);
            return response()->json(['message' => $exception->getMessage(), 'status' => 'error']);
        }
        return response()->json(['message' => 'success', 'status' => 'success']); // Return OK to user's browser
    }
}
