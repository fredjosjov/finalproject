<?php
setlocale(LC_MONETARY, 'en_US');
?>
@extends('stores.layout')

@section('stylesheet')

@endsection

@section('modal')
    <div class="modal" tabindex="-1" role="dialog" id="confirmation-message-modal">

        @csrf
        @method('PUT')
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @switch($order->status)
                        @case('Paid')
                        <p id="confirmation-message">Order status will be updated to <span
                                class="confirmation-warning">Processed. </span><br> Make sure that
                            the you are ready to ship the items and the details of the products are correct. <br>
                            <span
                                class="confirmation-warning">Once updated, reverting will require support from us.</span><br>
                            <br>
                            For inquiries and support, kindly contact admin at support@fredjosjov.com.
                        </p>
                        @break
                        @case('Processed')
                        <p id="confirmation-message">The order will be <span
                                class="confirmation-warning">Shipped.</span><br>
                            Make sure that
                            the you already ship the items and the proof of shipment is documentation is ready. <br>
                            <span
                                class="confirmation-warning">Once updated, reverting will require support from us.</span><br>
                            <br>
                            For inquiries and support, kindly contact admin at support@fredjosjov.com.
                        </p>
                        @break
                        @case('Shipped')
                        <p id="confirmation-message">The order will be <span
                                class="confirmation-warning">Completed.</span><br>
                            Only complete the order when the customer has received the item(s).<br>
                            <span
                                class="confirmation-warning">Once updated, reverting will require support from us.</span><br>
                            <br>
                            For inquiries and support, kindly contact admin at support@fredjosjov.com.
                        </p>
                    @endswitch
                </div>
                <div class="modal-footer">
                    <form id="update-order-status" method="post"
                          action="{{ route('order-status.update', ['store'=> $store, 'id' => $order->id]) }}">
                        @csrf
                        @method('PUT')
                        @switch($order->status)
                            @case('Paid')
                            <input name="status" type="text" value="Processed" hidden>
                            @break
                            @case('Processed')
                            <input name="status" type="text" value="Shipped" hidden>
                            @break
                            @case('Shipped')
                            <input name="status" type="text" value="Completed" hidden>
                            @break
                        @endswitch
                        <button type="button" class="btn btn-primary" onclick="submit('update-order-status');">Confirm
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
            <hr id="title-divider" class="solid" style="border: 2px solid #232E3D">
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-md-4 justify-content-start" style="display: flex;">
                    <p class="summary-details">Customer
                        : {{ $order->customer->firstName }}
                        {{ $order->customer->lastName }} ({{ $order->customer_id }})</p>
                </div>
                <div class="col-md-4 justify-content-center" style="display: flex;">
                    <p class="summary-details">Order Date : {{ $order->created_at }}</p>
                </div>
                <div class="col-md-4 justify-content-end" style="display: flex;">
                    <p class="summary-details">Total Value : <span
                            id="total-value">{{ money_format('%i', $order->totalAmount) }}</span></p>
                </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-md-6">
                </div>
                <div class="col-md-4">
                    @switch($order->status)
                        @case('Paid')
                        <div class="form-group row" id="status-field">
                            <label id="status-label" for="status-input" class="col-md-12">Confirm order?</label>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal"
{{--                                --}}
                                data-target="#confirmation-message-modal" {{ !isset($shipping) ? 'disabled' : '' }} {{ $order->status === 'Completed' ? 'hidden' : '' }}>
                            Update Status
                        </button>
                    </div>
                @else
                    <div class="col-md-2 justify-content-center" style="display: flex;">
                        <button class="btn btn-primary">Contact Support</button>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-3" id="shipping-card">
            <p id="shipping-title">Shipping Details</p>
            @if(isset($shipping))
                <p class="shipping-details">Address: <br><span
                        id="address">{{ $shipping->pivot->ship_address }}</span></p>
                <p class="shipping-details">Status: {{ $shipping->pivot->status }}</p>
            @else
                <p class="shipping-details">Address: <br><span
                        id="address">Not specified.</span> <span
                        style="color: red;">Contact customer: {{$order->customer->phone}}</span></p>
                <p class="shipping-details">Status: <span style="color: red;">Contact customer/support: support@fredjosjov.com</span>
                </p>
            @endif
        </div>
    </div>

    @foreach($order->products as $product)
        <div class="row">
            <div class="col-md-3 justify-content-center" style="display: flex;">
                @if(isset($product->image))
                    <img src="{{ asset($product->image) }}" style="max-width: 150px; max-height: 150px;">
                @else
                    <p style="height: 150px; line-height: 150px; text-align: center;">No product image available.</p>
                @endif
            </div>
            <div class="col-md-6 order-product-info">
                <h2 class="products-info" id="product-name">{{ $product->name }}</h2>
                <small class="text-muted description">{{ $product->description }}</small>
                <h5 class="products-info">Quantity : {{ $product->pivot->quantity }}</h5>
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
    <div class="row justify-content-center" style="display: flex; margin-bottom: 10px;">
        @if($order->status != 'Shipped' and $order->status != 'Completed')
            <button class="btn btn-primary" id="proceed-button" style="background-color: #bbbbbb; border: none;"
                    disabled>Complete
                Order
            </button>
        @elseif($order->status === 'Completed')
            <h4 id="complete-message">This order has been completed
                on {{ $order->updated_at->format('F d H:i:s') }}</h4>
        @else
            <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#confirmation-message-modal" id="proceed-button">
                Complete Order
            </button>
        @endif
    </div>
@endsection

@section('js-script')
    <script type="text/javascript">
        @switch($order->status)
        @case('Paid')
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

        function submit(form) {
            document.getElementById(form).submit();
        }
    </script>
@endsection
