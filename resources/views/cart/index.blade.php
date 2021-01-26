@extends('layouts/mainLayout')

@section('title', 'Shopping Cart')

@section('container')

<div class="container">
    <!-- this needs to link to profile -->
    Account: <a class="" href="#"><?= session('custName') ?></a>
</div>

<div class="container mt-3 mb-4">
    @foreach( $cart as $carts )
        <div class="card mt-2">
            <div class="card-header">
                (Store Name)
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$carts->id}}</h5>
                <p class="card-text">Product Description</p>
                <form action="/cart/{{$carts->id}}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger">Remove</button>
                </form>
                <form action="">
                    
                </form>
            </div>
        </div>
    @endforeach
</div>

<!-- This button connects to chekout page -->
<div class="container mb-4">
    <a class="btn btn-primary" href="/checkout">Checkout</a>
</div>

@endsection