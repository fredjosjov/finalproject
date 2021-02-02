<?php
setlocale(LC_MONETARY, 'en_US');
?>

@extends('stores.layout')

@section('content')
    <div class="row">
        <h1 class="main-title">Store Information</h1>
    </div>
    <hr class="solid" style="border: 2px solid #232E3D; margin: 4px 0 4px 0;">
    <div class="row">
        <h2 class="sub-title">About the Owner</h2>
    </div>
    <hr class="solid" style="border: 1px solid #bbbbbb; margin: 4px 0 4px 0;">
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
    <hr class="solid" style="border: 1px solid #bbbbbb; margin: 4px 0 4px 0;">
    <div class="row">
        <h2 class="sub-title">About Store</h2>
    </div>
    <hr class="solid" style="border: 1px solid #bbbbbb; margin: 4px 0 4px 0;">
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
    <hr class="solid" style="border: 1px solid #bbbbbb; margin: 4px 0 4px 0;">
    <div class="row">
        <h2 class="sub-title">Active Product Listing</h2>
    </div>
    <hr class="solid" style="border: 1px solid #bbbbbb; margin: 4px 0 20px 0;">
    <div class="row" style="margin-bottom: 20px;">
        @if(count($store->products) > 0)
            <div class="card-group">
                @foreach($store->products as $product)
                    <div class="card">
                        @if(isset($product->image))
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="..." style="max-width: 250px; max-height: 250px; align-self: center; padding-top: 10px;">
                        @else
                            <p style="height: 200px; line-height: 200px; text-align:center;">No product image available. :(</p>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{ $product->quantity }} products selling
                                @ USD {{ $product->price }} each.</small>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h5>No products listed yet.</h5>
        @endif
    </div>
@endsection
