@extends("administrator.default")
@section("content")
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Notifications</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Order</th>
                            <th>Content</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notifications as $i => $notification)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $notification->id_order }}</td>
                                <td>{{ $notification->notification_body }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
