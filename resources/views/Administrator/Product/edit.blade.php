@extends("administrator.default")
@section("content")
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">{{  $product->getKey() == 0 ? "Create product" : "Edit product" }}</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white p-20 bd">
                    <div class="mT-30">
                        <form method="post" action="{{route('admin.product.edit', ['id' => $product->getKey()])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">
                                    Product Name
                                </label>
                                <input type="text" class="form-control" name="form[product_name]" value="{{ $product->product_name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">
                                    Category Name
                                </label>
                                <select class="form-control" name="form[id_category]">
                                    <option value=""></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id_category }}" {{ $category->id_category == $product->id_category ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">
                                    Product Price
                                </label>
                                <input type="number" class="form-control" name="form[product_price]" value="{{ $product->product_price }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">
                                    Product Image
                                </label>
                                <input type="file" class="form-control" name="product_filepath">
                                <span>{{$product->product_filepath}}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">
                                    Product Description
                                </label>
                                <input type="text" class="form-control" name="form[product_description]" value="{{ $product->product_description }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">
                                    Product Quantity
                                </label>
                                <input type="number" class="form-control" name="form[product_quantity]" value="{{ $product->product_quantity }}">
                            </div>
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
                                <input
                                    type="checkbox" id="inputCall1" name="form[product_status]" class="peer" {{ $product->product_status ? 'checked' : '' }}>
                                <label
                                    for="inputCall1" class="form-label peers peer-greed js-sb ai-c"><span
                                        class="peer peer-greed">Status</span>
                                </label>
                            </div>
                            @if ($errors->any())
                                <div class="alert-danger alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary btn-color">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
