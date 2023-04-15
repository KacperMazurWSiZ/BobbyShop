@extends("administrator.default")
@section("content")
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Order preview</h4>
        <div class="col-12">
            <a href="{{ route('admin.order.index') }}" class="btn cur-p btn-secondary btn-color mB-30">Back</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Photo</th>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Product Quantity</th>
                            <th>Product Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders->order_item as $i => $item)
                            <tr>
                                <td>{{ $i + 1}}</td>
                                <td> {!! !is_null($item->product->product_filepath) ? "<img src='".asset("storage/{$item->product->product_filepath}")."' alt='photo' width='200' height='300'>" : 'N/A' !!}  </td>
                                <td>{{ $item->product->product_name ?? ''}}</td>
                                <td>{{ $item->product->category->category_name ?? ''}}</td>
                                <td>{{ $item->order_item_quantity }}</td>
                                <td>{{ $item->order_item_price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
