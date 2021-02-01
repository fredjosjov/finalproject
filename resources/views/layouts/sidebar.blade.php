<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"></div> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{session('custName')}} <span class="caret"></span></a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="/edit-profile/{{session('custId')}}"><i class="ti-user"></i> My Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="login.html"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li class="nav-small-cap m-t-10">--- Main Menu</li>
            <li> <a href="index.html" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> E-commerce <span class="fa arrow"></span></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="index.html">Dashboard</a> </li>
                    <li> <a href="{{url('/product')}}">Products</a> </li>
                    <li> <a href="{{url('/shipping')}}">Product Orders</a> </li>
                    <li> <a href="{{url('/cart')}}">Product Cart</a> </li>
                    <li> <a href="{{url('/checkout')}}">Product Checkout</a> </li>
                    <li> <a href="{{url('/wishlist')}}">Product Wishlist</a> </li>
                </ul>
            </li>
        </ul>
    </div>
</div>