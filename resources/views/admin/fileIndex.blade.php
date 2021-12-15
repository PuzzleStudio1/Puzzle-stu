@extends('layouts.admin')

@section('title', 'پازل استودیو | مدیریت فایل')

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
                    <span class="card-label font-weight-bolder text-dark">لیست فایل ها</span>
                </h3>
                <div class="card-toolbar">
                    <a href={{ route('file.create') }}
                        class="btn btn-success font-weight-bolder font-size-sm">
                        <span class="svg-icon svg-icon-md svg-icon-white">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Files\Folder-plus.svg--><svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M11,13 L11,11 C11,10.4477153 11.4477153,10 12,10 C12.5522847,10 13,10.4477153 13,11 L13,13 L15,13 C15.5522847,13 16,13.4477153 16,14 C16,14.5522847 15.5522847,15 15,15 L13,15 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,15 L9,15 C8.44771525,15 8,14.5522847 8,14 C8,13.4477153 8.44771525,13 9,13 L11,13 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon--></span>
                        آپلود فایل
                    </a>
                </div>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..."
                                            id="kt_datatable_search_query" />
                                        <span><i class="flaticon2-search-1 text-muted"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->
                <!--end: Search Form-->

                <!--begin: Datatable-->
                <div class="table-responsive">
                    <table id="puzzleTable" class="table table-hover display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">نام فایل</th>
                                <th class="text-center">عملیات</th>
                                <th class="text-center">حجم فایل</th>
                                <th class="text-center">نقش</th>
                                <th class="text-center">نوع فایل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                            <tr>
                                <td class="text-center">{{ $file->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('file.show', $file->id) }}" class="btn btn-success btn-sm">
                                        <i class="flaticon-download"></i> دانلود
                                    </a>
                                    <a href="{{ route('file.delete', $file->id) }}" class="btn btn-danger btn-sm">
                                        <i class="flaticon-delete"></i> حذف
                                    </a>
                                </td>
                                <td class="text-center">{{ number_format($file->size / (1024 * 1024), 2) }} مگابایت</td>
                                @if ($file->is_private)
                                    <td class="text-center">خصوصی</td>
                                @else
                                    <td class="text-center">عمومی</td>
                                @endif
                                <td class="text-center">{{ $file->type }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">نام فایل</th>
                                <th class="text-center">عملیات</th>
                                <th class="text-center">حجم فایل</th>
                                <th class="text-center">نقش</th>
                                <th class="text-center">نوع فایل</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!--end: Datatable-->
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Content-->
@endsection

@section('js')
    <script type=" text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#puzzleTable').DataTable({
                "scrollX": true
            });
        });

    </script>
@endsection
