@extends('stores.layout')

@section('content')
    <form method="POST" action="{{ route('store-products.store', ['store' => $store]) }}">
        @csrf
        <div class="row">
            <h1>Add a new Product</h1>
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
                        <input class="form-control" type="text" name="name" id="name">
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
                        <input class="form-control" type="text" name="quantity" id="quantity">
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
                        <input class="form-control" type="text" name="price" id="price">
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
                        <textarea class="form-control" name="description" id="description"></textarea>
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
                <button class="btn btn-primary">
                    Add Product
                </button>
            </div>
        </div>
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
        })
    </script>
@endsection
