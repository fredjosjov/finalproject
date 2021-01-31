<?php
setlocale(LC_MONETARY, 'en_US');
?>
@extends('stores.layout')

@section('title')
    <h1>{{ ucfirst($store->name) }}'s Store</h1>
@endsection

@section('content')
    <h1 class="main-title">Dashboard</h1>
    <hr class="solid" style="border: 2px solid #232E3D; margin: 4px 0 16px 0;">
    <div class="row justify-content-center">
        <div class="col-md-3 justify-content-center" style="display: flex;">
            <div class="card text-center" style="width: 20rem;">
                <div class="card-body main-cards">
                    <h2 class="card-title main-card-title">Products Listed</h2>
                    <h3 class="card-text"> <span style="color: blue;">{{ $activeProducts->count() }}</span> / {{ $products->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 justify-content-center" style="display: flex;">
            <div class="card text-center" style="width: 20rem;">
                <div class="card-body main-cards">
                    <h2 class="card-title main-card-title">Total Sales</h2>
                    <h3 class="card-text">{{ money_format('%i',$revenue)}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 justify-content-center" style="display: flex;">
            <div class="card text-center" style="width: 20rem;">
                <div class="card-body main-cards">
                    <h2 class="card-title main-card-title">Completed Orders</h2>
                    <h3 class="card-text"> <span style="color: red;"> {{ $completedOrders->count() }} </span> / {{ $orders->count() }} <span style="font-size: 16px;">({{ $completedOrders->count() / $orders->count() * 100 }}%)</span></h3>
                </div>
            </div>
        </div>
    </div>
    <hr class="solid" style="border: 1px solid #bbbbbb">
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
    <hr class="solid" style="border: 1px solid #bbbbbb">
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
                                    href="{{ url('/store/' . $store->id . '/customers') }}">{{ $activity->customer->firstName }} {{ $activity->customer->lastName }}</a>
                                placed an <a href="/store/{{ $store->id }}/order/{{ $activity->id }}">order</a> worth
                                of {{ money_format('%i' , $activity->totalAmount) }}.
                            </th>
                            <td>{{ $activity->created_at->format('F d H:i:s') }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js-script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        var dataMapping = new Map([
            ['Date', 'Sales']
        ]);

        @foreach($orders as $order)
        if (!dataMapping.has("{{ $order->created_at->format('F d') }}")) {
            dataMapping.set("{{ $order->created_at->format('F d') }}", {{ $order->totalAmount }});
        } else {
            dataMapping.set("{{ $order->created_at->format('F d') }}", dataMapping.get("{{ $order->created_at->format('F d') }}") + {{ $order->totalAmount }});
        }
        @endforeach

        function drawChart() {
            var data = google.visualization.arrayToDataTable(Array.from(dataMapping));

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

            if (Array.from(dataMapping).length === 2) {
                document.getElementById('sales-trend').innerHTML = "<h5 style=\"text-align: center;\">Not enough data to display results.</h5>"
            } else {
                var chart = new google.visualization.LineChart(document.getElementById('sales-trend'));

                chart.draw(data, options);
            }
        }
    </script>
@endsection
