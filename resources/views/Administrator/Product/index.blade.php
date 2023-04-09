@extends("administrator.default")
@section("content")
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Products</h4>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.product.edit') }}" class="btn cur-p btn-secondary btn-color mB-30">Add Product</a>
            </div>
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id Product</th>
                            <th>Category Name</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id_product }}</td>
                                <td>{{ $product?->category?->category_name }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price }} PLN</td>
                                <td>{{ $product->product_filepath }}</td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>{{ $product->product_status }}</td>
                                <td>
                                    <a href="{{route('admin.product.edit', ['id' => $product->getKey()])}}" class="btn cur-p btn-warning"><i class="ti-pencil"></i></a>
                                    <a href="{{route('admin.product.delete', ['id' => $product->getKey()])}}" class="btn cur-p btn-danger btn-color"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
