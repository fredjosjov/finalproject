@extends('layouts/mainLayout')

@section('title', 'History Page')

@section('container')

<div class="container">
    <!-- this needs to link to profile -->
    Account: <a class="" href="#"><?= session('custName') ?></a>
</div>

<div class="container mt-3">
    <a href="/history" class="btn btn-danger">Back</a>
{{--    @foreach($orderDetails as $detail)--}}
    @foreach($products as $product)
    <div class="card mt-3" style="width: 45rem;">
{{--        <h5 class="card-header">{{$detail->name}}</h5>--}}
        <h5 class="card-header">{{$product->name}}</h5>
        <div class="card-body">
{{--            <h5 class="card-title">{{$detail->description}}</h5>--}}
            <h5 class="card-title">{{$product->description}}</h5>
{{--            <p class="card-text">Price: Rp {{$detail->price}}</p>--}}
            <p class="card-text">Price: Rp {{ $product->pivot->quantity }}</p>
            <p class="card-text">Price: Rp {{ $product->pivot->price }}</p>
        </div>
    </div>
    @endforeach
{{--    @endforeach--}}
</div>

@endsection
