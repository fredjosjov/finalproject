@extends('layouts/productLayout')

@section('title', 'Product Page')

@section('container')

<div class="container mt-5">

  <div class="row">
    <div class="col">
      <div class="card" style="width: 18rem;">
        <img src="https://images-na.ssl-images-amazon.com/images/I/51k6JSEUR3L._AC_SL1100_.jpg" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">Product 1</h5>
            <p class="card-text">Product Description</p>
            <p class="card-text">Rp 10,000</p>
            <a href="/shoppingCart" class="btn btn-primary">Add to Cart</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection