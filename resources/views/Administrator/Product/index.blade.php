@extends("administrator.default")
@section("content")
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Products</h4>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.product.edit') }}" class="btn cur-p btn-secondary btn-color mB-30">Add Product</a>
                <form action="{{ route('admin.product.fetchAndSave') }}" method="POST">
                    @csrf
                    <button type="button" id="myButton" class="btn btn-primary btn-color mb-3">Fetch and Save Products</button>
                </form>

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
                                <td>{!!  $product->product_status ? '<span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c rounded-pill">Active</span>'
                                : '<span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c rounded-pill">Inactive</span>
                                '!!}</td>
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
@push('js')
    <script>

        document.addEventListener('DOMContentLoaded', () => {
            const myButton = document.getElementById('myButton');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


            myButton.addEventListener('click', () => {
                let temp = myButton.innerHTML;
                myButton.innerHTML = "Fetching...";
                fetch('{{ route('admin.product.fetchAndSave') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken

                    },
                    body: ''
                })
                    .then(response => {

                        myButton.innerHTML = temp;
                        if(response.status !== 200){
                            alert('Fetching error!');
                        }
                        location.reload();
                    })
            });
        });
    </script>
@endpush
