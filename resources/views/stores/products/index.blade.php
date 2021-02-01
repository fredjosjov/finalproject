@extends('stores.layout')

@section('modal')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="main-title">Manage Inventory</h1>
        </div>
        <div class="col-md-3">
            <form method="GET" action="{{ route('store-products.search', ['store' => $store]) }}">
            <div class="row justify-content-end" style="display: flex;">
                    <div class="col-md-6" style="padding-right: 5px;">
                        <input class="form-control mr-sm-2" type="text" name="term" placeholder="Search.."
                               aria-label="Search">
                        <input name="store_id" value="{{ $store->id }}" hidden>
                    </div>
                    <div class="col-md-3" style="padding-left: 5px;">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    <hr class="solid" style="border: 2px solid #232E3D; margin: 4px 0 8px 0;">
    <form method="POST" action="{{ route('store-products.update-price', ['store' => $store]) }}">
        @csrf
        @method('PUT')
        <div class="row justify-content-between" style="display: flex;">
            <h2 class="sub-title">Active Listings</h2>
        </div>
        <hr class="solid" style="border: 1px solid #bbbbbb; margin: 4px 0 8px 0;">
        <div class="row">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $GLOBALS['active-count'] = 1;?>
                @foreach($activeListing as $item)
                    <tr>
                        <th scope="row"><?php echo $GLOBALS['active-count']++;?></th>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td><input type="text" name="{{ $item->id }}" placeholder="{{ $item->price }}"
                                   value="{{ $item->price }}"></td>
                        <td style="text-align: center;"><a
                                href="{{ URL('/store/' .  $store->id . '/products/remove/' . $item->id) }}"><img
                                    class="small-icons"
                                    src="{{ asset('/icons/remove-icon.svg') }}"></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4 justify-content-center" style="display: flex;">
                {{--            //TODO: (Optional) Pagination--}}
            </div>
            <div class="col-md-4 justify-content-end" style="display: flex;">
                <button type="submit" class="btn btn-primary">
                    Update Prices
                </button>
            </div>
        </div>
    </form>
    <hr class="solid" style="border: 1px solid #bbbbbb; margin: 8px 0 8px 0;">
    <div class="row">
        <h2 class="sub-title">My Products</h2>
    </div>
    <hr class="solid" style="border: 1px solid #bbbbbb; margin: 4px 0 8px 0;">
    <div class="row">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $GLOBAL['products-count'] = 1;?>
            @foreach($products as $product)
                <tr>
                    <th scope="row"><?php echo $GLOBAL['products-count']++; ?></th>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td style="text-align: center;">
                        @if($product->is_active === 0)
                            <a href="{{ url('/store/' . $store->id . '/products/add/' . $product->id) }}"><img
                                    class="small-icons"
                                    src="{{ asset('/icons/add-icon.svg') }}"></a>
                        @endif
                        <a
                            href="#"
                            onclick="event.preventDefault(); document.getElementById('product-id-edit').value = {{ $product->id }}; document.getElementById('edit-form').submit()"><img
                                class="small-icons"
                                src="{{ asset('/icons/edit-icon.svg') }}"></a><a
                            href="#"
                            onclick="event.preventDefault(); document.getElementById('product-id').value = {{ $product->id }}; document.getElementById('delete-form').submit()"><img
                                class="small-icons" src="{{ asset('/icons/clear-icon.svg') }}"></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <form id="delete-form" method="POST" action="{{ route('store-products.delete', ['store' => $store]) }}">
            <input type="text" name="product_id" id="product-id" hidden>
            <input type="text" value="{{ $store->id }}" name="store_id" hidden>
            @csrf
            @method('DELETE')
        </form>
        <form id="edit-form" method="POST" action="{{ route('store-products.edit', ['store' => $store]) }}">
            @csrf
            <input type="text" name="product_id" id="product-id-edit" hidden>
            <input type="text" value="{{ $store->id }}" name="store_id" hidden>
        </form>
    </div>
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-4">
            <a href="/store/{{ $store->id }}/products/create" id="create-product">Add a New Product</a>
        </div>
        <div class="col-md-4 justify-content-center" style="display: flex;">
            {{--            //TODO: (Optional) Pagination--}}
        </div>
        <div class="col-md-4 justify-content-end" style="display: flex;">

        </div>
    </div>

@endsection
