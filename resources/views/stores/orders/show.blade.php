<?php
setlocale(LC_MONETARY, 'en_US');
?>
@extends('stores.layout')

@section('title')
    <h1>{{ ucfirst($store->name) }}'s Store</h1>
@endsection

@section('content')
    <h1>Order #{{$order->id}}</h1>
    <hr class="solid" style="border: 2px solid #bbb">
    @foreach($order->products as $product)

        <div class="col-md-3">
            {{ $product->name }}
            {{ $product->pivot->quantity }}
            {{ money_format('%i', $product->pivot->quantity * $product->pivot->price)}}
        </div>
    @endforeach
@endsection
