@extends("administrator.default")
@section("content")
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Admins</h4>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.admin.edit') }}" class="btn cur-p btn-secondary btn-color mB-30">Add Admin</a>
            </div>
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Login</th>
                            <th>Super Admin</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $i => $admin)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $admin->admin_login }}</td>
                                <td>{{ $admin->admin_superadmin ? 'Yes' : 'No' }}</td>
                                <td>{{ $admin->admin_status ? 'Active' : 'Inactive'}}</td>
                                <td>
                                    <a href="{{route('admin.admin.edit', ['id' => $admin->getKey()])}}" class="btn cur-p btn-warning"><i class="ti-pencil"></i></a>
                                    @if(!$admin->admin_superadmin)
                                        <a href="{{route('admin.admin.delete', ['id' => $admin->getKey()])}}" class="btn cur-p btn-danger btn-color"><i class="ti-trash"></i></a>
                                    @endif
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
