@extends('layouts.admin')

@section('title','پازل استودیو | لیست تگ ها')

@section('content')
    <div class="flex-row-fluid">
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">لیست تگ ها</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">نام تگ</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tags as $tag)
                            <tr>
                                <td> {{ $tag->name }} </td>
                                <td>
                                    <a href="{{ route('tags.destroy', $tag->id) }}" class="btn btn-danger">
                                        <i class="flaticon-delete-1"></i> حذف
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <p>
                                هیچ تگی برای نمایش وجود ندارد.
                            </p>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Content-->
    </div>
    <!--begin::Content-->
    <div class="flex-row-fluid">
        @include('partials.alerts')
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">افزودن تگ</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <form method="post" action="{{ route('tags.store') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-9">
                            <input type="text" name="name" class="form-control  " placeholder="نام تگ">
                            @if ($errors->has('name'))
                                <small class="form-text text-danger"> {{ $errors->first('name') }} </small>
                            @endif
                        </div>
                        <div class="col-3">
                            <input type="submit" class="btn btn-outline-success btn sm" value="افزودن">
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Body-->
        </div>
    </div>

@endsection
