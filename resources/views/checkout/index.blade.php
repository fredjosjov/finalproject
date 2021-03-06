@extends('layouts.app2')

@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Product Checkout</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Product Checkout</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /row -->
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Product Summary</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($cart))
                        @foreach($cart as $p)
                        <tr>
                            <td><img src="{{ $p->image }}" style="max-width: 120px;" /></td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->quantity }}</td>
                            <td>{{ $p->price }}</td>
                        </tr>
                        @endforeach
                        @endif
                        @if(!empty($cart))
                        <tr>

                            <td colspan="3" class="font-500" align="right">Total Amount</td>
                            <td class="font-500">{{$cart->sum('price')}}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <h3 class="box-title">Choose payment Option</h3>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active nav-item"><a href="#iprofile" class="nav-link" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Debit Card</span></a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="iprofile">
                    <div class="col-md-7 col-sm-5">
                        <form method="post" action="/checkout/payment">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">CARD NUMBER</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                    <input type="number" class="form-control" name="card_number" placeholder="Card Number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="ship_address" placeholder="Address" rows="4" cols="50"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Courier</label>
                                        <select class="form-control" name="vendor">
                                            <option value="JNE">JNE</option>
                                            <option value="TIKI">TIKI</option>
                                            <option value="Pos Indonesia">Pos Indonesia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-info">Make Payment</button>
                            {{-- Below is an addition to be able to pull product when making payment--}}
                            @if(isset($productId))
                            <input type="text" value="{{ $productId }}" name="product_id" hidden>
                            @endif
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection