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
@yield('modal')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">{{ ucfirst($store->name) }}'s Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ URL('store/'. $store->id . '/analytics') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL('store/'. $store->id . '/profile') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL('store/' . $store->id . '/products') }}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL('store/' . $store->id . '/orders') }}">Orders</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="analytics col-md-12" id="analytics-content">
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
