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
            @foreach($orderHistory as $history)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$history->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rp {{$history->price}}</h6>
                    <p class="card-text">Quantity ordered: {{$history->quantity}}</p>
                </div>
            </div>
            @endforeach
        </ul>
    </div>
</div>

@endsection