@extends('layouts.admin')

@section('title', 'پازل استودیو | آپلود ویدیو')

@section('content')
<!--begin::Content-->
<div class="flex-row-fluid">
    @include('partials.alerts')

    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">آپلود ویدیو ها</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--Begin::Body-->
        <div class="card-body table-responsive">
            @include('partials.alerts')
            @include('partials.validation-errors')
            <form method="post" class="dropzone" id="my-awesome-dropzone" action=" {{ route('admin.upload.store') }} " enctype="multipart/form-data">
                @csrf
                <div class="fallback">
                    <input name="file" type="file" />
                </div>
            </form>
            <input type="submit" class="btn btn-success btn w-25" value="ثبت عکس">
        </div>
        <!--end::Body-->
    </div>
</div>
<!--end::Content-->
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
@endsection
@section('js')
<script src="{{ asset('js/dropzone.min.js') }}"></script>
<script>
    $("#my-awesome-dropzone").dropzone({ url: "/file/post" });
</script>
@endsection