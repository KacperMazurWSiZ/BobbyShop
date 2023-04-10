@extends("Administrator.default")
@section("content")
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Profile</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white p-20 bd">
                    <div class="mT-30">
                        <div class="mb-3">
                            @if (file_exists(public_path("storage/admins/admin" . auth()->user()->id_admin . ".png")))
                                <img class="w-2r bdrs-50p" src="{{ asset("storage/admins/admin" . auth()->user()->id_admin . ".png") }}">
                            @else
                                <img class="w-2r bdrs-50p" src="{{ asset('images/admin_default_image.png') }}">
                            @endif
                        </div>
                        <form method="post" action="{{route('admin.profile')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">
                                    Avatar
                                </label>
                                <input type="file" class="form-control" name="admin_image">
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
