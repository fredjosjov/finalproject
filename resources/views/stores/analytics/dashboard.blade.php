<?php
setlocale(LC_MONETARY, 'en_US');
?>
@extends('stores.analytics.layout')

@section('title')
    <h1>{{ ucfirst($store->name) }}'s Store</h1>
@endsection

@section('content')
    <h1>Dashboard</h1>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="row justify-content-center">
                <div class="card text-center" style="width: 20rem;">
                    <div class="card-body">
                        <h2 class="card-title">Products Listed</h2>
                        <h3 class="card-text">{{ $products->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="width: 20rem;">
                <div class="card-body">
                    <h2 class="card-title">Total Sales</h2>
                    <h3 class="card-text">{{ money_format('%i',$revenue)}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="width: 20rem;">
                <div class="card-body">
                    <h2 class="card-title">Completed Orders</h2>
                    <h3 class="card-text">{{ $orders->count() }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <h2 id="chart-title">Store Performance</h2>
    </div>
    <div class="row justify-content-center">
        <p class="text-muted">(in USD)</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="sales-trend"></div>
        </div>
    </div>
    <div class="row">
        <h2>Most Recent Orders</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>

                <tbody>
                @if(count($activities) === null)
                    <tr>
                        <th scope="row">No recent activity.</th>
                        <td></td>
                    </tr>
                @else
                @foreach($activities as $activity)
                    <tr>
                        <th scope="row"><a
                                href="customers/{{ $activity->customer_id }}">{{ $activity->customer->firstName }} {{ $activity->customer->lastName }}</a>
                            placed an <a href="/orders/{{ $activity->id }}">order</a> worth
                            of {{ money_format('%i',$activity->totalAmount) }}.
                        </th>
                        <td>{{ $activity->created_at->format('F d') }}</td>
                    </tr>
                @endforeach
                @endif
                    </tbody>
            </table>
        </div>
    </div>

@endsection

@section('charts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        //TODO: create an automatically filling array
        var dates = [];
        var sales = [];
        @foreach($orders as $order)
        dates.push("{{ $order->created_at->format('F d') }}");
        sales.push({{ $order->totalAmount }})
        @endforeach
        function drawChart() {
            //TODO: Make the data arrays in here to be automatically resizing
            var data = google.visualization.arrayToDataTable([
                ['Date', 'Sales'],
                [dates[0], sales[0]],
                [dates[1], sales[1]],
                [dates[2], sales[2]],
                [dates[3], sales[3]],
                [dates[4], sales[4]]
            ]);

            var options = {
                legend: {
                    position: 'bottom',
                    alignment: 'center'
                },
                chartArea: {
                    width: '80%'
                },
                width: '100%',
                height: 500
            };

            var chart = new google.visualization.LineChart(document.getElementById('sales-trend'));

            chart.draw(data, options);
        }
    </script>
@endsection
