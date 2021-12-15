@extends('layouts.admin')

@section('title', 'پازل استودیو | لیست حضور غیاب')

@section('content')
<!--begin::Content-->
<div class="flex-row-fluid">
    @include('partials.alerts')
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">لیست حضور غیاب</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--Begin::Body-->
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-lg-4">
                    <!--begin::Stats Widget 30-->
                    <div class="card card-custom bg-info card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path
                                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path
                                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                            fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span
                                class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{number_format($students->count())}}</span>
                            <span class="font-weight-bold text-white font-size-sm">تعداد دانش آموزان</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 30-->
                </div>
                <div class="col-lg-4">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-danger card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5">
                                        </rect>
                                        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span
                                class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$hazer}}</span>
                            <span class="font-weight-bold text-white font-size-sm">تعداد حاضرین</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>
                <div class="col-lg-4">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-dark card-stretch gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path
                                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path
                                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                            fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span
                                class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{number_format($ghayeb)}}</span>
                            <span class="font-weight-bold text-white font-size-sm">تعداد غایبین</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>
            </div>
            <table class="table table-striped" id="puzzleTable">
                <thead>
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام کاربر</th>
                        <th scope="col">مدت زمان حضور(دقیقه)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                    <tr>
                        <td> {{ $count++ }} </td>
                        <td> {{ $student->first_name.' '.$student->last_name }} </td>
                        <td> {{ $student->absenceDuration}} </td>
                    </tr>
                    @empty
                    <p>
                        هیچ داده ای برای نمایش وجود ندارد.
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
<script type=" text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js"></script>
<script type=" text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type=" text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script type=" text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type=" text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type=" text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type=" text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type=" text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#puzzleTable').DataTable({
            "scrollX": true,
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });
    });

</script>
@endsection