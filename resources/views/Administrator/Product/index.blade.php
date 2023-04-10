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
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Modified by</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $i => $product)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $product?->category?->category_name }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price }} PLN</td>
                                <td> {!! !is_null($product->product_filepath) ? "<img src='".asset("storage/$product->product_filepath")."' alt='photo' width='200' height='300'>" : 'N/A' !!}  </td>                             </td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>{{ $product->product_status ? 'Active' : 'Inactive'}}</td>
                                <td>{{ $product?->admin?->admin_login }}</td>
                                <td>{{ \Carbon\Carbon::parse($product->updated_at)->diffForHumans() }}</td>

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
