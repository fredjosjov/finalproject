@extends('layouts/mainLayout')

@section('title', 'Shopping Cart')

@section('container')

<div class="container mt-3 mb-4">
    @foreach( $cart as $carts )
        <div class="card mt-2">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Product {{$carts->product_id}}</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-danger">Remove</a>
            </div>
        </div>
    @endforeach
</div>

<div class="container">

</div>

@endsection