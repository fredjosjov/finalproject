@extends('layouts.app2')

@section('content')
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Products</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Products</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    @foreach($product as $p)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="product-img">
                                <img src="{{ asset('image/' . $p->image) }}" />
                                <div class="pro-img-overlay">
                                    <a href="javascript:void(0)" onclick="addCart('{{$p->id}}')" class="bg-success"><i class="ti-shopping-cart"></i></a>
                                    <a href="javascript:void(0)" onclick="addWishlist('{{$p->id}}')" class="bg-danger"><i class="ti-heart"></i></a>
                                </div>
                            </div>
                            <div class="product-text">
                                <span class="pro-price bg-danger">{{$p->price}}</span>
                                <h3 class="box-title m-b-0">{{$p->name}}</h3>
                                <small class="text-muted db">Stock : {{$p->quantity}}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach                   
                </div>
                <!-- /.row -->
<script type="text/javascript">

function addWishlist(id) {
   $.ajax({
            url: '/wishlist/addWishlist/'+id,
            type: 'POST',
            //data: 'id=' + '"id"',
            cache: false,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (record) {
                if(record.status == 0)
                {
                    alert('Product added to wishlist!');
                }
                else
                {
                    alert('Product removed from wishlist!');
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert('Failed to add product to wishlist!');
                //alert('failed to add product!');
                console.log(xhr.responseText);
            }
        });
}
</script>
@endsection