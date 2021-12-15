@extends('layouts.admin')

@section('title', 'پازل استودیو | لیست دوره ها')

@section('css')

@endsection

@section('content')
<!--begin::Content-->
<div class="flex-row-fluid">
    <div class="card card-custom gutter-b rounded-xl">
        <!--begin::Header-->
        <div class="card-header mb-5">
            <h3 class="card-title">
                <span class="card-label font-weight-bolder text-dark">لیست دوره ها</span>
            </h3>
            <div class="card-toolbar">
                <a href={{ route('course.create') }} class="btn btn-success font-weight-bolder font-size-sm">
                    <span class="svg-icon svg-icon-md svg-icon-white">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Files\Folder-plus.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
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
                    دوره جدید
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <form class="form px-10" action="{{route('admin.search.course')}}" method="GET">
                    <div class="form-group row">
                        <div class="col-md-8 col-6">
                            <input type="text" class="form-control" name="search" placeholder="نام دوره" />
                        </div>
                        <div class="col-md-4 col-6">
                            <input type="submit" class="btn btn-outline-success btn sm" value="جستجو" />
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!--end::Header-->
        <div class="card-body">
            @include('partials.alerts')
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-muted">
                            <th class="text-center">شناسه</th>
                            <th class="text-left">نام</th>
                            <th class="text-center">عملیات</th>
                            <th class="text-center">ویژگی</th>
                            <th class="text-center">دسته بندی</th>
                            <th class="text-center">نوع</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td class="text-center faNum">{{ $course->id }}</td>

                            <td class="text-left small font-weight-normal text-muted faNum">
                                <a class="font-weight-bold font-size-h5 text-dark"
                                    href="{{ route('webinar.frontend', $course->id) }}">
                                    @if ($course->limited == true)
                                    <span class="svg-icon svg-icon-danger">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Wallet.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5" />
                                                <rect fill="#000000" opacity="0.3"
                                                    transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                                    x="3" y="3" width="18" height="7" rx="1" />
                                                <path
                                                    d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    @endif
                                    {{ $course->name }}
                                </a><br />
                                {{ $course->institute->first_name }} {{ $course->institute->last_name }} |
                                {{ $course->teacher->first_name }} {{ $course->teacher->last_name }}
                            </td>
                            <td class="text-center">
                                <div>
                                    <a href="{{ route('course.edit', $course->id) }}"
                                        class="btn btn-success text-center btn-icon btn-circle mr-1">
                                        <span class="svg-icon svg-icon-md svg-icon-white" data-container="body"
                                            data-toggle="tooltip" data-placement="top" title="ویرایش دوره">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/General/Settings-2.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-icon btn-circle mr-1"
                                        data-toggle="modal" data-target="#deleteModel{{$course->id}}">
                                        <span class="svg-icon svg-icon svg-icon-white" data-container="body"
                                            data-toggle="tooltip" data-placement="top" title="حذف دوره">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                    <path
                                                        d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </button>
                                </div>
                            </td>
                            <td class="text-center">
                                <div>
                                    <a href="{{ route('classroom.courseClassroom', $course->id) }}"
                                        class="btn btn-success btn-circle btn-icon mr-1" data-container="body"
                                        data-toggle="tooltip" data-placement="top" title="جلسات دوره">
                                        <span class="svg-icon svg-icon svg-icon-white">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Media/Media-library1.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <rect fill="#000000" opacity="0.9" x="2" y="9" width="20"
                                                        height="13" rx="2" />
                                                    <rect fill="#000000" opacity="0.8" x="5" y="5" width="14" height="2"
                                                        rx="0.5" />
                                                    <rect fill="#000000" opacity="0.7" x="7" y="1" width="10" height="2"
                                                        rx="0.5" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>
                                    <a href="{{ route('course.courseStudentList', $course->id) }}"
                                        class="btn btn-warning btn-circle btn-icon mr-1" data-container="body"
                                        data-toggle="tooltip" data-placement="top" title="کاربران دوره">
                                        <span class="svg-icon svg-icon svg-icon-white">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>
                                    <a href="{{ route('booklet.indexCourse', $course->id) }}"
                                        class="btn btn-info btn-circle btn-icon mr-1" data-container="body"
                                        data-toggle="tooltip" data-placement="top" title="جزوات">
                                        <span class="svg-icon svg-icon svg-icon-white">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Files/Selected-file.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>
                                    {{-- <a href="{{ route('quiz.indexCourse', $course->id) }}" class="btn btn-primary
                                    btn-circle btn-icon mr-1" data-container="body" data-toggle="tooltip"
                                    data-placement="top" title="آزمون‌ها">
                                    <span class="svg-icon svg-icon svg-icon-white">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Design/Pencil.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M10.5,8 L6,19 C6.0352633,19.1332661 6.06268417,19.2312688 6.08226261,19.2940083 C6.43717645,20.4313361 8.07642225,21 9,21 C10.5,21 11,19 12.5,19 C14,19 14.5917308,20.9843119 16,21 C16.9388462,21.0104588 17.9388462,20.3437921 19,19 L14.5,8 L10.5,8 Z"
                                                    fill="#000000" />
                                                <path d="M11.3,6 L12.5,3 L13.7,6 L11.3,6 Z M14.5,8 L10.5,8 L14.5,8 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    </a> --}}
                                    @if ($course->type == 'code')
                                    <a href="{{ route('course.courseCodeList', $course->id) }}"
                                        class="btn btn-dark btn-circle btn-icon" data-container="body"
                                        data-toggle="tooltip" data-placement="top" title="کد‌های دسترسی">
                                        <span class="svg-icon svg-icon svg-icon-white">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Barcode.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M13,5 L15,5 L15,20 L13,20 L13,5 Z M5,5 L5,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,6 C2,5.44771525 2.44771525,5 3,5 L5,5 Z M16,5 L18,5 L18,20 L16,20 L16,5 Z M20,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,19 C22,19.5522847 21.5522847,20 21,20 L20,20 L20,5 Z"
                                                        fill="#000000" />
                                                    <polygon fill="#000000" opacity="0.3" points="9 5 9 20 7 20 7 5" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>
                                    @endif
                                </div>
                            </td>
                            <td class="text-center">
                                @foreach ($course->categories as $category)
                                <span
                                    class="label label-light-dark label-pill label-inline mr-2">{{ $category->name }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">{{ $course->type }}</td>
                        </tr>
                        <div class="modal fade" id="completeModel{{$course->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">اتمام دوره</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        آیا از اتمام دوره اطمینان دارید؟
                                        با تایید کردن این مرحله دانش آموزان و جزوات و کلاس های دوره حذف میشود.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold"
                                            data-dismiss="modal">انصراف</button>
                                        <a href="{{ route('course.complete', $course->id) }}"
                                            class="btn btn-secondary text-center">
                                            اتمام دوره
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModel{{$course->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">حذف دوره</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        آیا از حذف دوره اطمینان دارید؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold"
                                            data-dismiss="modal">انصراف</button>
                                        <a href="{{ route('destroy.course', $course->id) }}"
                                            class="btn btn-danger text-center btn-sm">
                                            حذف دوره
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="text-muted">
                            <th class="text-center">شناسه</th>
                            <th class="text-left">نام</th>
                            <th class="text-center">عملیات</th>
                            <th class="text-center">ویژگی</th>
                            <th class="text-center">دسته بندی</th>
                            <th class="text-center">نوع</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center align-items-center flex-wrap p-6">
                <div class="contaier">
                    <div class="d-flex flex-wrp py-2 mr-3 text-center">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--end::Content-->

@endsection

@section('js')

@endsection