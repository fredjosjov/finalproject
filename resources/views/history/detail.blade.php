@extends('layouts/mainLayout')

@section('title', 'History Page')

@section('container')

<div class="container">
    <!-- this needs to link to profile -->
    Account: <a class="" href="#"><?= session('custName') ?></a>
</div>

<div class="container mt-3">
    <a href="/history" class="btn btn-danger">Back</a>
    @foreach($products as $product)
    <div class="card mt-3" style="width: 45rem;">
        <h5 class="card-header">{{$product->name}}</h5>
        <div class="card-body">
            <h5 class="card-title">{{$product->description}}</h5>
            <p class="card-text">Quantity: {{ $product->pivot->quantity }}</p>
            <p class="card-text">Price each: Rp {{ $product->pivot->price }}</p>
        </div>
    </div>
    @endforeach
</div>

@endsection
