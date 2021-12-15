@extends('layouts.admin')

@section('title', 'پازل استودیو | آپلود فایل')

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        @include('partials.alerts')
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">آپلود فایل</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <form action="{{ route('file.new') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="custom-file mb-3">
                            <input type="file" name="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">فایل خود را انتخاب کنید</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is-private" name="is-private">
                            <label class="custom-control-label" for="is-private">به صورت خصوصی آپلود شود</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class='text-center'>
                            <input type="submit" class="btn btn-outline-success btn sm" value="آپلود فایل">

                        </div>
                    </div>
                    <div class="form-group">
                        @include('partials.validation-errors')
                    </div>
                </form>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Content-->
@endsection
