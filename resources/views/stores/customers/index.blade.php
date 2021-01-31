@extends('stores.layout')

@section('content')
    <div class="row">
        <h1>Customers</h1>
    </div>
    <div class="row">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">First name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Order Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->customer->firstName }}</td>
                    <td>{{ $order->customer->lastName }}</td>
                    <td>{{ $order->customer->phone }}</td>
                    <td>{{ $order->customer->address }}</td>
                    <td>{{ $order->created_at->format('F d H:i:s') }}</td>
                    <td><a href="{{ URL('store/' . $store->id . '/order/' . $order->id) }}"
                           style="background: #0088ff; color: white; padding: 10px 5px 10px 5px; border-radius: 8px">See
                            Order</a></td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>

@endsection
