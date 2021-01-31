<?php
setlocale(LC_MONETARY, 'en_US');
?>

@extends('stores.layout')

@section('content')
    <div class="row">
        <h1>Profile</h1>
    </div>
    <hr class="solid" style="border: 2px solid #bbbbbb; margin: 4px 0 4px 0;">
    <div class="row">
        <h2>Owner's Information</h2>
    </div>
    <hr class="solid" style="border: 2px solid #bbbbbb; margin: 4px 0 4px 0;">
    <div class="row">
        <div class="col-md-2">
            <h5>Name</h5>
        </div>
        <div class="col-md-10">{{ $store->seller->firstName }} {{ $store->seller->lastName }}</div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <h5>Phone</h5>
        </div>
        <div class="col-md-10">{{ $store->seller->phone }}</div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <h5>Address</h5>
        </div>
        <div class="col-md-10">{{ $store->seller->address }}</div>
    </div>
    <hr class="solid" style="border: 2px solid #bbbbbb; margin: 4px 0 4px 0;">
    <div class="row">
        <h2>Store Information</h2>
    </div>
    <hr class="solid" style="border: 2px solid #bbbbbb; margin: 4px 0 4px 0;">
    <div class="row">
        <div class="col-md-2">
            <h5>Store Name</h5>
        </div>
        <div class="col-md-10">{{ $store->name }}</div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <h5>Registered Since</h5>
        </div>
        <div class="col-md-10">{{ $store->created_at }}</div>
    </div>
    <hr class="solid" style="border: 2px solid #bbbbbb; margin: 4px 0 4px 0;">
    <div class="row">
        <h2>Active Product Listing</h2>
    </div>
    <hr class="solid" style="border: 2px solid #bbbbbb; margin: 4px 0 20px 0;">
    <div class="row">
        @if(count($store->products) > 0)
            <div class="card-group">
                @foreach($store->products as $product)
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{ $product->quantity }} products selling
                                @ {{ money_format('%i', $product->price) }} each.</small>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h5>No products listed yet.</h5>
        @endif
    </div>
@endsection
