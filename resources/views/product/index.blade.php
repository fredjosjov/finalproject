@extends('layouts/mainLayout')

@section('title', 'Product Page')

@section('container')

<div class="container">
    <a class="" href="#"><?= session('custName') ?></a>
</div>

<div class="container mt-2 mb-4">
    <form action="/product" method="post">
    @csrf
        <div class="row">
            @foreach( $product as $products )
                <div class="col mt-3">
                    <div class="card" style="width: 15rem;">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/51k6JSEUR3L._AC_SL1100_.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                            <div name="productId" style="display: none">
                                {{$products->id}}
                            </div>
                            <div name="storeId" style="display: none">
                                {{$products->store_id}}
                            </div>
                            <h5 class="card-title">{{$products->name}}</h5>
                            <p class="card-text">{{$products->description}}</p>
                            <p class="" id="price" name="price">{{$products->price}}</p>
                            <button class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </form>
</div>

@endsection