@extends('layouts/mainLayout')

@section('title', 'Product Page')

@section('container')

@section('heading', 'Product Page')
<div class="container mt-2 mb-4">
    <div class="row">
        @foreach( $product as $products )
        <div class="col mt-3">
            <form action="/cart" method="post">
                @csrf
                <div class="card" style="width: 15rem;">
                    <img src="https://images-na.ssl-images-amazon.com/images/I/51k6JSEUR3L._AC_SL1100_.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <input type="text" name="productId" id="productId" value="{{$products->id}}" style="display: none">
                        <input type="text" name="storeId" id="storeId" value="{{$products->store_id}}" style="display: none">
                        <input type="text" name="price" id="price" value="{{$products->price}}" style="display: none">

                        <h5 class="card-title">{{$products->name}}</h5>
                        <p class="card-text">{{$products->description}}</p>
                        @foreach( $store as $stores )
                        <p class="card-text">{{$stores->name}}</p>
                        @endforeach
                        <p class="" id="price" name="price">Rp {{$products->price}}</p>
                        <button class="btn btn-primary">Add to Cart</button>
                        <a href="javascript:void(0)" onclick="addWishlist('{{$products->id}}')" class="btn btn-danger"><i class="ti-heart"></i></a>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
<script type="text/javascript">
    function addWishlist(id) {
        $.ajax({
            url: '/wishlist/addWishlist/' + id,
            type: 'POST',
            //data: 'id=' + '"id"',
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(record) {
                if (record.status == 0) {
                    alert('Product added to wishlist!');
                } else {
                    alert('Product removed from wishlist!');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert('Failed to add product to wishlist!');
                //alert('failed to add product!');
                console.log(xhr.responseText);
            }
        });
    }
</script>

@endsection