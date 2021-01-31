@extends('stores.layout')

@section('content')
    <div class="row">
        <h1>Orders List</h1>
    </div>
    <div class="row">
        <table class="table table-striped order-table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Order Date</th>
                <th scope="col">Last Status Update</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->customer_id }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td><p style="color:
                        @switch($order->status)
                            @case('Paid')
                            #0088ff
                            @break
                            @case('Processed')
                            #FFA500
                            @break
                            @case('Shipped')
                            yellow
                            @break
                            @case('Completed')
                            #3abf1f
                            @break
                        @endswitch
                            ; margin-bottom: 0;">{{$order->status}}</p>
                    </td>
                    <td><a href="{{ URL('/store/' . $store->id . '/order/' . $order->id) }}" class="order-jump-button">Details</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
