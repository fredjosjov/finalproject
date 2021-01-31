@extends('stores.layout')

@if($edit === true)
    <p style="display: none;">{{ $GLOBALS['form-action'] = route('store-products.update', ['store' => $store, 'product' => $product]) }}</p>
@else
    <p style="display: none;">{{ $GLOBALS['form-action'] = route('store-products.store', ['store' => $store]) }}</p>
@endif

@section('content')
    <form method="POST" action="<?php echo htmlspecialchars($GLOBALS['form-action'])?>" id="main-form">
        @csrf
        @if($edit === true)
            @method('PUT')
        @endif
        <div class="row">
            @if($edit === true)
                <h1> Edit Product</h1>
            @else
                <h1>Add a new Product</h1>
            @endif
        </div>
        <hr class="solid" style="border: 1px solid #bbbbbb; margin: 4px 0 8px 0;">
        <div class="row">
            <div class="col-md-2 justify-content-center" id="product-image">
                <div class="card h-100" style="width: 18rem;">
                    <div class="card-body">
                        <div class="row flex-row justify-content-center">
                            <h5 class="card-title" style="text-align: center;">Product Image</h5>
                        </div>
                        <div class="row flex-row justify-content-center">
                            <p class="card-text" style="text-align: center; margin-bottom: 10%;">Upload product
                                image.</p>
                        </div>
                        <div class="row flex-row justify-content-center">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image-input">
                                    <label class="custom-file-label" for="image-input">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <h2> Product Information </h2>
                </div>
                <div class="row input-fields">
                    <div class="col-md-2">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-md-4">
                        @if($edit === true)
                            <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}">
                        @else
                            <input class="form-control" type="text" name="name" id="name">
                        @endif
                    </div>
                    <div class="col-md-6">
                        @error('name')
                        <small class="form-text text-danger error-message">*Required</small>
                        @enderror
                    </div>
                </div>
                <div class="row input-fields">
                    <div class="col-md-2">
                        <label for="quantity">Quantity</label>
                    </div>
                    <div class="col-md-1">
                        @if($edit == true)
                            <input class="form-control" type="text" name="quantity" id="quantity"
                                   value="{{ $product->quantity }}">
                        @else
                            <input class="form-control" type="text" name="quantity" id="quantity">
                        @endif
                    </div>
                    <div class="col-md-9">
                        @error('quantity')
                        <small class="form-text text-danger error-message">*Required</small>
                        @enderror
                    </div>
                </div>
                <div class="row input-fields">
                    <div class="col-md-2">
                        <label for="price">Price</label>
                    </div>
                    <div class="col-md-1">
                        @if($edit === true)
                            <input class="form-control" type="text" name="price" id="price"
                                   value="{{ $product->price }}">
                        @else
                            <input class="form-control" type="text" name="price" id="price">
                        @endif
                    </div>
                    <div class="col-md-9">
                        @error('price')
                        <small class="form-text text-danger error-message">*Required</small>
                        @enderror
                    </div>
                </div>
                <div class="row input-fields">
                    <div class="col-md-2">
                        <label for="description">Description</label>
                    </div>
                    <div class="col-md-6">
                        @if($edit === true)
                            <textarea class="form-control" name="description"
                                      id="description">{{ $product->description }}</textarea>
                        @else
                            <textarea class="form-control" name="description" id="description"></textarea>
                        @endif
                    </div>
                    <div class="col-md-4">
                        @error('description')
                        <small class="form-text text-danger error-message">*Required</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h2>Product Details</h2>
        </div>
        <hr class="solid" style="border: 1px solid #bbbbbb; margin: 4px 0 8px 0;">
        <div class="row input-fields">
            <div class="col-md-2">
                <label for="color">Color</label>
            </div>
            <div class="col-md-1">
                <input class="form-control" type="text" name="color">
            </div>
            <div class="col-md-9"></div>
        </div>
        <div class="row input-fields">
            <div class="col-md-2">
                <label for="size">Size</label>
            </div>
            <div class="col-md-1">
                <input class="form-control" type="text" name="size">
            </div>
            <div class="col-md-9"></div>
        </div>
        <div class="row input-fields">
            <div class="col-md-2">
                <label for="weight">Weight</label>
            </div>
            <div class="col-md-1">
                <input class="form-control" type="text" name="weight">
            </div>
            <div class="col-md-9"></div>
        </div>
        <hr class="solid" style="border: 1px solid #bbbbbb; margin: 4px 0 8px 0;">
        <div class="row">
            <div class="col-md-9 justify-content-end"></div>
            <div class="col-md-3 justify-content-end" style="display: flex;">
                @if($edit === true)
                    <button class="btn btn-primary">
                        Update Product Information
                    </button>
                @else
                    <button class="btn btn-primary">
                        Add a New Product
                    </button>
                @endif
            </div>
        </div>
        @if($edit === true)
            <input name="product_id" value="{{ $product->id }}" type="text" hidden>
        @endif
        <input name="store_id" value="{{ $store->id }}" type="text" hidden>
        <input name="is_active" value="1" type="text" hidden>
    </form>
@endsection

@section('js-script')
    <script type="text/javascript">
        $('#image-input').on('change', function () {
            var fileName = $(this).val();
            var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
            $(this).next('.custom-file-label').html(cleanFileName);
        });
    </script>
@endsection
