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
    <link href="//db.onlinewebfonts.com/c/157c6cc36dd65b1b2adc9e7f3329c761?family=Amazon+Ember" rel="stylesheet"
          type="text/css"/>
    <title>Store Management</title>
</head>
<body>
@yield('modal')
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">{{ ucfirst($store->name) }}'s E-Commerce Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="col-md-9">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ request()->is('store/' . $store->id . '/analytics') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL('store/' . $store->id . '/analytics') }}">Dashboard</a>
                </li>
                <li class="nav-item {{ request()->is('store/' . $store->id . '/profile') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL('store/' . $store->id . '/profile') }}">Profile</a>
                </li>
                <li class="nav-item {{ request()->is('store/' . $store->id . '/customers') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ URL('store/' . $store->id . '/customers') }}">Customers</a>
                </li>
                <li class="nav-item {{ request()->is('store/' . $store->id . '/products') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ URL('store/' . $store->id . '/products') }}">Products</a>
                </li>
                <li class="nav-item {{ request()->is('store/' . $store->id . '/orders') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL('store/' . $store->id . '/orders') }}">Orders</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-1 justify-content-end" style="display: flex; padding-right: 0;">
        <a href="{{ url('logout') }}"
           style="background: red; color: white; padding: 5px 10px 5px 10px; border-radius: 8px;">Logout</a>
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
