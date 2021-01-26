@extends('layouts/mainLayout')

@section('title', 'Shopping Cart')

@section('container')

<div class="container">
    <!-- this needs to link to profile -->
    Account: <a class="" href="#"><?= session('custName') ?></a>
</div>

<div class="container mt-3 mb-4">
    @foreach( $cart as $carts )
        <div class="card mt-2 mb-2">
            <div class="card-header">
                {{$carts->store_name}}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$carts->name}}</h5>
                <p class="card-text">{{$carts->description}}</p>
                <div class="row">

                    <div class="col-sm-2">
                        <form action="/cart/{{$carts->cart_id}}" method="post">
                        @method('delete')
                        @csrf
                            <button class="btn btn-danger">Remove</button>
                        </form>
                    </div>

                    <div class="col">
                        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group" role="group" aria-label="First group">
                                Quantity:
                                <form action="/minusQty" method="post">
                                @csrf
                                    <input type="text" name="id" id="id" value="{{$carts->cart_id}}" style="display: none">
                                    <input type="text" name="quantity" id="quantity" value="{{$carts->cart_quantity}}" style="display: none">
                                    <button type="submit" class="btn btn-outline-secondary">-</button>
                                </form>
                                <button type="button" class="btn btn-outline-secondary" disabled>{{$carts->cart_quantity}}</button>
                                <form action="/addQty" method="post">
                                @csrf
                                    <input type="text" name="id" id="id" value="{{$carts->cart_id}}" style="display: none">
                                    <input type="text" name="quantity" id="quantity" value="{{$carts->cart_quantity}}" style="display: none">
                                    <button type="submit" class="btn btn-outline-secondary">+</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- This button connects to chekout page -->
<div class="container mb-4">
    <a class="btn btn-primary" href="/checkout">Checkout</a>
</div>

@endsection