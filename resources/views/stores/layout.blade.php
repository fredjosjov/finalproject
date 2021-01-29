<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/analytics.css') }}">
    <title>Store Management</title>
</head>
<body>
<div class="row">
    <div class="analytics col-md-2" id="analytics-navigation">
        @yield('title')
        <nav class="nav flex-column">
            <a class="nav-link active justify-content-center" href="#">Dashboard</a>
            <a class="nav-link active" href="#">Store</a>
            <a class="nav-link active" href="#">Customers</a>
            <a class="nav-link active" href="#">Products</a>
            <a class="nav-link active" href="#">Orders</a>
        </nav>

    </div>
    <div class="analytics col-md-9" id="analytics-content">
        @yield('content')
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
@yield('js-script')
</html>
