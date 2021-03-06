<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Store;
use App\Traits\UploadTrait;

class ProductController extends Controller
{
    use UploadTrait;

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

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function indexStore(string $id)
    {
        if (session()->has('credentials')) {
            $store = Store::find($id);
            return view('stores.products.index', [
                'store' => $store,
                'activeListing' => $store->products->where('is_active', true),
                'products' => $store->products
            ]);
        } else {
            return redirect('/');
        }
    }

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @param string $store
     * @param string $mode
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function editListingItem(string $store, string $mode, string $id)
    {
        if (session()->has('credentials')) {
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
        } else {
            return redirect('/');
        }
    }

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @param string $store
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateListingPrices(string $store, Request $request)
    {
        if (session()->has('credentials')) {
            $inputArray = $request->input();
            unset($inputArray['_token']);
            unset($inputArray['_method']);

            foreach ($inputArray as $id => $newPrice) {
                $product = Product::find(intval($id));
                $product->price = floatval($newPrice);
                $product->save();
            }
            return redirect('/store/' . $store . '/products');
        } else {
            return redirect('/');
        }
    }

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @param string $store
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(string $store)
    {
        if (session()->has('credentials')) {
            return view('stores.products.create', [
                'store' => Store::find($store),
                'edit' => false
            ]);
        } else {
            return redirect('/');
        }

    }

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        if (session()->has('credentials')) {
            Product::create($this->validateInputs());
            return redirect('/store/' . request()->store_id . '/products');
        } else {
            return redirect('/');
        }
    }

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        if (session()->has('credentials')) {
            $product = Product::find(request()->product_id);
            $product->delete();
            return redirect('store/' . request()->store_id . '/products');
        } else {
            return redirect('/');
        }
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

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @param Store $store
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Store $store)
    {
        if (session()->has('credentials')) {
            $product = Product::find(request()->product_id);
            if(request()->has('image')){
                $image = request()->file('image');
                $name = Str::slug(request()->input('name')).'_'.time();
                $folder = '/uploads/images/';
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                $this->uploadOne($image, $folder, 'public', $name);
                $product->image = $filePath;
            }
            $product->save(); // Not the best practice, but the most simple and efficient to solve problem.
            $product->update($this->validateInputs());
            return redirect('/store/' . $store->id . '/products');
        } else {
            return redirect('/');
        }
    }

    /**
     * @author Alfriyadi Rafles <alfriyadi.rafles@binus.ac.id>
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function showSpecific()
    {
        if (session()->has('credentials')) {
            return view('stores.products.create', [
                'store' => Store::find(request()->store_id),
                'product' => Product::find(request()->product_id),
                'edit' => true
            ]);
        } else {
            return redirect('/');
        }
    }

    public function searchStore(){
        $term = request()->input('term');

        $products = Product::query()->where('name', 'LIKE', '%'.$term.'%')
            ->orWhere('description', 'LIKE', '%'.$term.'%')
            ->orWhere('id', 'like', '%'.$term.'%')->get();

        $products = $products->where('store_id', request()->input('store_id'));
        return view('stores.products.index', [
            'products' => $products,
            'activeListing' => $products->where('is_active', 1),
            'store' => Store::find(request()->input('store_id'))
        ]);
    }

    public function validateInputs(): array
    {
        return request()->validate([
            'store_id' => 'required',
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'is_active' => 'required'
        ]);
    }
}
