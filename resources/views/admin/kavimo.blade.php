@extends('layouts.admin')

@section('title', 'پازل استودیو | کاویمو')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
@endsection

@section('content')
<!--begin::Content-->
<div class="flex-row-fluid">
    @include('partials.alerts')
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">لیست دسته بندی های کاویمو</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--Begin::Body-->
        <div class="card-body table-responsive">
            <table class="table table-striped puzzleTable">
                <thead>
                    <tr>
                        <th scope="col">شناسه</th>
                        <th scope="col">نام ویدیو</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kavimo_category['response'] as $kavimo)
                    <tr>
                        <td>{{ $kavimo['id'] }}</td>
                        <td>{{ $kavimo['name'] }}</td>
                    </tr>
                    @empty
                    <p>
                        هیچ کد ورودی یافت نشد.
                    </p>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!--end::Body-->
    </div>
    <div class="card card-custom gutter-b mt-3">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">لیست ویدیو های کاویمو</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--Begin::Body-->
        <div class="card-body table-responsive">
            <table class="table table-striped puzzleTable">
                <thead>
                    <tr>
                        <th scope="col">آیدی ویدیو</th>
                        <th scope="col">نام ویدیو</th>
                        <th scope="col">کد دسته بندی</th>
                        <th scope="col">کد ویدیو</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kavimo_videos['response'] as $kavimo)
                    <tr>
                        <td>{{ $kavimo['media_id'] }}</td>
                        <td>{{ $kavimo['title'] }}</td>
                        <td>{{ $kavimo['project_id'] }}</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control bg-dark text-light" id="kt_clipboard_1"
                                    value="{{ $kavimo['embed_script'] }}" />
                                <div class="input-group-append">
                                    <a href="#" class="btn btn-secondary" data-clipboard="true"
                                        data-clipboard-target="#kt_clipboard_1">
                                        <i class="la la-copy"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <p>
                        هیچ کد ورودی یافت نشد.
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

@section('js')
<script src="{{ asset('js/pages/clipboard.js') }}"></script>
<script type=" text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js">
</script>
<script>
    $(document).ready(function() {
        $('.puzzleTable').DataTable({
            "scrollX": true
        });
    });

</script>

@endsection