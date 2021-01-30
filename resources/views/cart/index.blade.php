@extends('layouts/mainLayout')

@section('title', 'Shopping Cart')

@section('container')

@section('heading', 'Shopping Cart')

<div class="container mt-3 mb-4">
    @foreach( $cart as $carts )
        <div class="card mt-2 mb-2">
            <div class="card-header">
                {{$carts->store->store_name}}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$carts->product->name}}</h5>
                <p class="card-text">{{$carts->product->description}}</p>
                <div class="row">

                    <div class="col-sm-2">
                        <form action="/cart/{{$carts->id}}" method="post">
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
                                    <input type="text" name="id" id="id" value="{{$carts->id}}" style="display: none">
                                    <input type="text" name="quantity" id="quantity" value="{{$carts->quantity}}" style="display: none">
                                    <button type="submit" class="btn btn-outline-secondary">-</button>
                                </form>
                                <button type="button" class="btn btn-outline-secondary" disabled>{{$carts->quantity}}</button>
                                <form action="/addQty" method="post">
                                @csrf
                                    <input type="text" name="id" id="id" value="{{$carts->id}}" style="display: none">
                                    <input type="text" name="quantity" id="quantity" value="{{$carts->quantity}}" style="display: none">
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