@extends('stores.layout')

@section('modal')

@endsection

@section('content')
    <div class="row">
        <h1>Manage Inventory</h1>
    </div>
    <hr class="solid" style="border: 2px solid #818181; margin: 4px 0 8px 0;">
    <form>
        <div class="row justify-content-between" style="display: flex;">
            <h2>Active Listings</h2>
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
                        <td><input type="text" name="new-price" placeholder="{{ $item->price }}"></td>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productsModal">
                    Update Prices
                </button>
            </div>
        </div>
    </form>
    <hr class="solid" style="border: 1px solid #bbbbbb; margin: 4px 0 8px 0;">
    <div class="row">
        <h2>My Products</h2>
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
                        <a href="{{ url('/store/' . $store->id . '/products/add/' . $product->id) }}"><img class="small-icons"
                                                                     src="{{ asset('/icons/add-icon.svg') }}"></a>
                        @endif
                        <a
                            href="#"><img class="small-icons"
                                          src="{{ asset('/icons/edit-icon.svg') }}"></a><a
                            href="#"><img class="small-icons" src="{{ asset('/icons/clear-icon.svg') }}"></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-4">
            <a href="/store/{{ $store->id }}/create-product" id="create-product">Create a New Product</a>
        </div>
        <div class="col-md-4 justify-content-center" style="display: flex;">
            {{--            //TODO: (Optional) Pagination--}}
        </div>
        <div class="col-md-4 justify-content-end" style="display: flex;">

        </div>
    </div>

@endsection
