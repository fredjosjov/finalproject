@extends('layouts/mainLayout')

@section('title', 'History Page')

@section('container')

<div class="container">
    <!-- this needs to link to profile -->
    Account: <a class="" href="#"><?= session('custName') ?></a>
</div>

<div class="container mt-3">
    <div style="width: 40rem;">
        <ul class="list-group list-group-flush">
            @foreach($orders as $order)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Store: {{$order->seller->store->store_name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Amount: Rp {{$order->totalAmount}}</h6>
                        <form action="/detail" method="post">
                        @csrf
                            <input type="text" name="orderId" style="display:none" value="{{$order->id}}">
                            <button class="btn btn-primary">Details</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
</div>

@endsection