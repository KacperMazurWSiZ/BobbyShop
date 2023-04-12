@extends("Administrator.default")
@section("content")
{{--    <div class="container-fluid">--}}
{{--        <h4 class="c-grey-900 mT-10 mB-30">Announcements</h4>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="bgc-white bd bdrs-3 p-20 mB-20">--}}
{{--                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>#</th>--}}
{{--                            <th>Admin name</th>--}}
{{--                            <th>Title</th>--}}
{{--                            <th>Content</th>--}}
{{--                            <th>Actions</th>--}}

{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($announcements as $i => $announcement)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $i + 1 }}</td>--}}
{{--                                <td>{{ $announcement->admin->admin_login }}</td>--}}
{{--                                <td>{{ $announcement->announcement_title }}</td>--}}
{{--                                <td>{{ $announcement->announcement_content }}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{route('admin.announcement.delete', ['id' => $announcement->getKey()])}}" class="btn cur-p btn-danger btn-color"><i class="ti-trash"></i></a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-12">--}}
{{--                <form method="post" action="{{route('admin.announcement.create')}}">--}}
{{--                    @csrf--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label" for="exampleInputEmail1">--}}
{{--                            Announcement title--}}
{{--                        </label>--}}
{{--                        <input type="text" class="form-control" name="form[announcement_title]">--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label" for="exampleInputEmail1">--}}
{{--                            Announcement content--}}
{{--                        </label>--}}
{{--                        <input type="text" class="form-control" name="form[announcement_content]">--}}
{{--                    </div>--}}
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert-danger alert">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <button type="submit" class="btn btn-primary btn-color">Save</button>--}}
{{--                </form>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="full-container">
            <div class="peers fxw-nw pos-r">


                <div class="peer peer-greed" id="chat-box">
                    <div class="layers h-100">
                        <div class="layer w-100 fxg-1 bgc-grey-200 scrollable pos-r">

                            <div class="p-20 gapY-15">
                                @foreach($announcements as $announcement)
                                    @if($announcement->id_admin != auth()->user()->id_admin)
                                    <div class="peers fxw-nw">
                                    <div class="peer mR-20">
                                        {!!  $announcement->announcement_with_photo ? '<img class="w-2r bdrs-50p" src="' . asset("storage/admins/admin" . $announcement->id_admin . ".png") . '" alt="">' : '' !!}
                                    </div>
                                    <div class="peer peer-greed">
                                        <div class="layers ai-fs gapY-5">

                                            <div class="layer">
                                                <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                                    <div class="peer mR-10">
                                                        <small>{{ \Carbon\Carbon::parse($announcement->created_at)->format('H:i d F') }}</small>
                                                    </div>
                                                    <div class="peer-greed">
                                                        <span>{{ $announcement->announcement_content }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @else
                                <div class="peers fxw-nw ai-fe">
                                    <div class="peer ord-1 mL-20">

                                        {!!  $announcement->announcement_with_photo ? '<img class="w-2r bdrs-50p" src="' . asset("storage/admins/admin" . $announcement->id_admin . ".png") . '" alt="">' : '' !!}
                                    </div>
                                    <div class="peer peer-greed ord-0">
                                        <div class="layers ai-fe gapY-10">
                                            <div class="layer">
                                                <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                                                    <div class="peer mL-10 ord-1">
                                                        <small>{{ \Carbon\Carbon::parse($announcement->created_at)->format('H:i d F') }}</small>
                                                    </div>
                                                    <div class="peer-greed ord-0">
                                                        <span>{{ $announcement->announcement_content }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="layer w-100">

                            <div class="p-20 bdT bgc-white">
                                <div class="pos-r">
                                    <form method="post" action="{{route('admin.announcement.create')}}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control bdrs-10em m-0" name="form[announcement_content]" placeholder="Message" required>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary btn-color">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
