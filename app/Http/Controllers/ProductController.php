<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;

class ProductController extends Controller
{
    public function index()
    {
        if (session()->has('credentials')) {
            $product = Product::all();
            $store = \App\Models\Store::all();
            return view('product.index', ['product' => $product, 'store' => $store]);
        } else {
            return redirect('/');
        }
    }

    public function indexStore(string $id)
    {
        $store = Store::find($id);
        return view('stores.products.index', [
            'store' => $store,
            'activeListing' => $store->products->where('is_active', true),
            'products' => $store->products
        ]);
    }

    public function editListingItem(string $store, string $mode, string $id)
    {
        $product = Product::find($id);
        switch ($mode) {
            case('remove'):
                $product->is_active = false;
                break;
            case('add'):
                $product->is_active = true;
                break;
        }
        $product->save();
        return redirect('/store/' . $store . '/products');
    }

    public function updateListingPrices(string $store, Request $request)
    {
        $inputArray = $request->input();
        unset($inputArray['_token']);
        unset($inputArray['_method']);

        //TODO: Required validations
        foreach ($inputArray as $id => $newPrice) {
            $product = Product::find(intval($id));
            $product->price = floatval($newPrice);
            $product->save();
        }
        return redirect('/store/' . $store . '/products');
    }

    public function create(string $store)
    {
        return view('stores.products.create', [
            'store' => Store::find($store),
            'edit' => false
        ]);
    }

    public function store()
    {
        Product::create($this->validateInputs());
        return redirect('/store/' . request()->store_id . '/products');
    }

    public function destroy()
    {
        $product = Product::find(request()->product_id);
        $product->delete();
        return redirect('store/' . request()->store_id . '/products');
    }

    public function search(Request $request)
    {
        $input = $request->search;
        $product = Product::where('name', 'like', '%' . $input . '%')->get();
        $store = \App\Models\Store::all();

        if ($input == '') {
            return redirect('/product');
        } else {
            return view('product.index', ['product' => $product, 'store' => $store]);
        }
    }

    public function update(Store $store)
    {
        $product = Product::find(request()->product_id);
        $product->update($this->validateInputs());
        return redirect('/store/' . $store->id . '/products');
    }

    public function showSpecific()
    {
        return view('stores.products.create', [
            'store' => Store::find(request()->store_id),
            'product' => Product::find(request()->product_id),
            'edit' => true
        ]);
    }

    public function validateInputs(): array
    {
        return request()->validate([
            'store_id' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
            'is_active' => 'required'
        ]);
    }
}
