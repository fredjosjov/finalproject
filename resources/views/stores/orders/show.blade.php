<?php
setlocale(LC_MONETARY, 'en_US');
?>
@extends('stores.layout')

@section('stylesheet')

@endsection

@section('modal')

@endsection

@section('title')
    <h1>{{ ucfirst($store->name) }}'s Store</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <h1>Order #{{ $order->id }}</h1>
                <p id="order-status-tag">{{ $order->status }}</p>
            </div>
            <hr id="title-divider" class="solid" style="border: 2px solid #818181">
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-md-4 justify-content-start" style="display: flex;">
                    <p class="summary-details">Customer
                        : {{ $order->customer->firstName }} {{ $order->customer->lastName }} ({{ $order->customer_id }})</p>
                </div>
                <div class="col-md-4 justify-content-center" style="display: flex;">
                    <p class="summary-details">Order Date : {{ $order->created_at }}</p>
                </div>
                <div class="col-md-4 justify-content-end" style="display: flex;">
                    <p class="summary-details">Total Value : <span
                            id="total-value">{{ money_format('%i', $order->totalAmount) }}</span></p>
                </div>
            </div>
            <form method="post" action="{{ route('order-status.update', ['store'=> $store, 'id' => $order->id]) }}">
                @csrf
                @method('PUT')
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-4">
                        @switch($order->status)
                            @case('Newly Created')
                            <div class="form-group row" id="status-field">
                                <label id="status-label" for="status-input" class="col-md-12">Processed Your
                                    Order?</label>
                                <input type="text" id="status-input" name="status" value="Processed" hidden>
                            </div>
                            @break
                            @case('Processed')
                            <div class="form-group row" id="status-field">
                                <label id="status-label" for="status-input" class="col-md-12">Shipped Your
                                    Order?</label>
                                <input type="text" id="status-input" name="status" value="Shipped" hidden>
                            </div>
                            @break
                            @case('Shipped')
                            <div class="form-group row" id="status-field">
                                <label id="status-label" for="status-input" class="col-md-12">Having Problems?</label>
                                <input type="text" id="status-input" name="status" value="Shipped-Problematic" hidden>
                            </div>
                            @break
                            @case('Shipped-Problematic')
                            <p id="support-message">Processing your Support Request</p>
                        @endswitch
                    </div>
                    @if($order->status != 'Shipped' and $order->status != 'Shipped-Problematic')
                        <div class="col-md-2 justify-content-center" style="display: flex;">
                            <button class="btn btn-primary">Update Status</button>
                        </div>
                    @else
                        <div class="col-md-2 justify-content-center" style="display: flex;">
                            <button class="btn btn-primary">Contact Support</button>
                        </div>
                    @endif
                </div>
            </form>
        </div>
        <div class="col-md-3" id="shipping-card">
            <p id="shipping-title">Shipping Details</p>
            {{--            TODO: Shipping factory--}}
            <p class="shipping-details">Address: <br><span
                    id="address">Lorem Ipsum asdkasdklasbdlkbaslkdbaslbdasa</span></p>
            <p class="shipping-details">Status: </p>
        </div>
    </div>

    @foreach($order->products as $product)
        <div class="row">
            <div class="col-md-3">
                //TODO: Product Image
            </div>
            <div class="col-md-6 order-product-info">
                <h2 class="products-info" id="product-name">{{ $product->name }}</h2>
                <h5 class="products-info">Quantity : {{  $product->pivot->quantity }}</h5>
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="products-info">Buy Price (ea.)
                            : {{ money_format('%i', $product->pivot->price) }}</h5>
                    </div>
                    <div class="col-md-6 justify-content-end" style="display: flex;">
                        <h4 id="total-value-info" class="products-info">Total Value
                            : {{ money_format('%i', $product->pivot->quantity * $product->pivot->price) }}</h4>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
    {{--    TODO: Complete order form action--}}
    <form>
        <div class="row justify-content-center" style="display: flex; margin-bottom: 10px;">
            @if($order->status != 'Shipped')
                <button class="btn btn-primary" id="proceed-button" style="background-color: #bbbbbb" disabled>Complete
                    Order
                </button>
            @else
                <button class="btn btn-primary" id="proceed-button">Complete Order</button>
            @endif
        </div>
    </form>
@endsection

@section('js-script')
    <script type="text/javascript">
        @switch($order->status)
        @case('Newly Created')
        updateStatusColor('#0088ff');
        @break
        @case('Processed')
        updateStatusColor('#FFA500');
        @break
        @case('Shipped')
        updateStatusColor('yellow');
        @break
        @case('Completed')
        updateStatusColor('#3abf1f');
        @endswitch

        function updateStatusColor(color) {
            document.getElementById('order-status-tag').style.color = color;
            document.getElementById('order-status-tag').style.borderColor = color;
        }
    </script>
@endsection
