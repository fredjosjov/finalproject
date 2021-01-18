@extends('stores.analytics.layout')
@section('content')
    <h1>{{ ucfirst($store->name) . '\'s Store Statistics' }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="row justify-content-center">
                <h2>Products</h2>
            </div>
            <div class="row justify-content-center">{{ $products->count() }}</div>
        </div>
        <div class="col-md-3">
            <div class="row justify-content-center">
                <h2>Sales</h2>
            </div>
            <div class="row justify-content-center">{{ $orders->first()->totalAmount }}</div>
        </div>
        <div class="col-md-3">
            <div class="row justify-content-center">
                <h2>Orders</h2>
            </div>
            <div class="row justify-content-center">{{ $orders->count() }}</div>
        </div>
    </div>
    <div class="row justify-content-center">
        Cards
    </div>
    <div class="row justify-content-center">
        Activity
        {{--should be a table that list all of the live activity in the store--}}
    </div>
@endsection
