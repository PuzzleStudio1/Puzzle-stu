@extends('layouts.admin')

@section('title','پازل استودیو | لیست نقش ها')

@section('content')
    <div class="flex-row-fluid">
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">لیست دسترسی ها</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">نام دسترسی</th>
                            <th scope="col">نام فارسی دسترسی</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $permission)
                            <tr>
                                <td> {{ $permission->name }} </td>
                                <td> {{ $permission->persian_name }} </td>
                                <td>
                                    <a href="{{ route('permissions.destroy', $permission->id) }}" class="btn btn-danger">
                                        <i class="flaticon-delete-1"></i> حذف
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <p>
                                هیچ دسترسی برای نمایش وجود ندارد.
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
                    <span class="card-label font-weight-bolder text-dark">افزودن دسترسی</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <form method="post" action="{{ route('permissions.store') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-5 col-12">
                            <input type="text" name="name" class="form-control  " placeholder="نام نقش">
                            @if ($errors->has('name'))
                                <small class="form-text text-danger"> {{ $errors->first('name') }} </small>
                            @endif
                        </div>
                        <div class="col-md-5 col-12 mt-5 mt-md-0">
                            <input type="text" name="persian_name" class="form-control " placeholder="نام فارسی نقش">
                            @if ($errors->has('persian_name'))
                                <small class="form-text text-danger"> {{ $errors->first('persian_name') }} </small>
                            @endif
                        </div>
                        <div class="col-md-2 col-12 mt-5 mt-md-0">
                            <input type="submit" class="btn btn-outline-success btn sm w-100" value="افزودن">
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Body-->
        </div>
    </div>

@endsection
