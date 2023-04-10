@extends("administrator.default")
@section("content")
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">{{  $category->getKey() == 0 ? "Create category" : "Edit category" }}</h4>
        <div class="row">
            <div class="col-md-12">
                    <div class="bgc-white p-20 bd">
                        <div class="mT-30">
                            <form method="post" action="{{route('admin.category.edit', ['id' => $category->getKey()])}}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">
                                        Category Name
                                    </label>
                                    <input type="text" class="form-control" name="form[category_name]" value="{{ $category->category_name }}">
                                </div>
                                <div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
                                    <input
                                        type="checkbox" id="inputCall1" name="form[category_status]" class="peer" {{ $category->category_status ? 'checked' : '' }}>
                                    <label
                                        for="inputCall1" class="form-label peers peer-greed js-sb ai-c"><span
                                            class="peer peer-greed">Status</span>
                                    </label>
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
                            @if($category->getKey())
                                Modified by: {{ $category?->admin?->admin_login }} {{ \Carbon\Carbon::parse($category->updated_at)->diffForHumans() }}
                            @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
