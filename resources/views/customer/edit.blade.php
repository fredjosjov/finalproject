@extends('layouts.app2')

@section('content')
                <div class="row bg-title">
                    <div class="col">
                        <h4 class="page-title">Customer Profile</h4>
                    </div>
                    <div class="col">
                        Switch to seller account: <a href="/store/<?= session('storeId') ?>/analytics" class="badge badge-primary">Switch</a>
                    </div>
                    <div class="col">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Customer Profile</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Edit Customer</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form method="post" action="/edit-profile/update/{{ $customer->id }}">
                                        {{ csrf_field() }}
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">First Name</label>
                                                        <input type="text" name="firstName" class="form-control" value=" {{ $customer->firstName }}"> 
                                                        @if($errors->has('firstName'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('firstName')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Last Name</label>
                                                        <input type="text" name="lastName" class="form-control" value=" {{ $customer->lastName }}"> 
                                                        @if($errors->has('lastName'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('lastName')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Phone</label>
                                                        <input type="text" name="phone" class="form-control" value=" {{ $customer->phone }}"> 
                                                        @if($errors->has('phone'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('phone')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Address</label>
                                                        <textarea type="text" name="address" class="form-control" rows="4" cols="50">{{ $customer->address }} </textarea>
                                                        @if($errors->has('address'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('address')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                        <div class="form-actions m-t-40">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                            <button href="/checkout" type="button" class="btn btn-default">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection