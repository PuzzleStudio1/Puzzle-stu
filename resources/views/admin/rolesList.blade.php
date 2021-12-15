@extends('layouts.admin')

@section('title', 'پازل استودیو | لیست نقش ها')

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        @include('partials.alerts')
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">افزودن نقش</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <form method="post" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-5 col-12">
                            <input type="text" name="name" class="form-control   mt-5 mt-md-0" placeholder="نام نقش">
                            @if ($errors->has('name'))
                                <small class="form-text text-danger"> {{ $errors->first('name') }} </small>
                            @endif
                        </div>
                        <div class="col-md-5 col-12">
                            <input type="text" name="persian_name" class="form-control  mt-5 mt-md-0" placeholder="نام فارسی نقش">
                            @if ($errors->has('persian_name'))
                                <small class="form-text text-danger"> {{ $errors->first('persian_name') }} </small>
                            @endif
                        </div>
                        <div class="col-md-2 col-12">
                            <input type="submit" class="btn btn-outline-success btn sm w-100 mt-5 mt-md-0" value="افزودن">
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Body-->
        </div>
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">لیست نقش ها</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">نام نقش</th>
                            <th scope="col">نام فارسی نقش</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td> {{ $role->name }} </td>
                                <td> {{ $role->persian_name }} </td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success">
                                        <i class="flaticon-edit"></i> ویرایش
                                    </a>
                                    <a href="{{ route('roles.destroy', $role->id) }}" class="btn btn-danger">
                                        <i class="flaticon-delete-1"></i> حذف
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <p>
                                هیچ نقشی برای نمایش وجود ندارد.
                            </p>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Content-->
@endsection
