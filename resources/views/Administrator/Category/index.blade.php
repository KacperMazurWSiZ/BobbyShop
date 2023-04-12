@extends("administrator.default")
@section("content")
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Categories</h4>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.category.edit') }}" class="btn cur-p btn-secondary btn-color mB-30">Add Category</a>
            </div>
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Modified by</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $i => $category)
                            <tr>
                                <td>{{ $i + 1}}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{!!  $category->category_status ? '<span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c rounded-pill">Active</span>'
                                : '<span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c rounded-pill">Inactive</span>
                                '!!}</td>
                                <td>{{ $category->product_count }}</td>
                                <td>{{ $category?->admin?->admin_login }}</td>
                                <td>{{ \Carbon\Carbon::parse($category->updated_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{route('admin.category.edit', ['id' => $category->getKey()])}}" class="btn cur-p btn-warning"><i class="ti-pencil"></i></a>
                                    <a href="{{route('admin.category.delete', ['id' => $category->getKey()])}}" class="btn cur-p btn-danger btn-color"><i class="ti-trash"></i></a>
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
