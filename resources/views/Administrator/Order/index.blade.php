@extends("administrator.default")
@section("content")
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Orders</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $i => $order)
                            <tr>
                                <td>{{ $i + 1}}</td>
                                <td>{{ $order->order_firstname }}</td>
                                <td>{{ $order->order_lastname }}</td>
                                <td>{{ $order->order_email }}</td>
                                <td>{{ $order->order_address }}</td>
                                <td>{!!  $order->order_status ? '<span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c rounded-pill">Active</span>'
                                : '<span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c rounded-pill">Inactive</span>
                                '!!}</td>
                                <td>
                                    <a href="{{route('admin.order.show', ['id' => $order->getKey()])}}" class="btn cur-p btn-success"><i class="ti-eye"></i></a>
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
