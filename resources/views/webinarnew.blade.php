@extends('layouts.index')

@section('title')
پازل استودیو | {{ $course->name }}
@endsection

@section('css')

@if (isset($liveClass->code))
<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script src="{{ asset('js/RecordRTC.js')}}"></script>
<script src="{{ asset('js/gif-recorder.js')}}"></script>
<script src="{{ asset('js/getScreenId.js')}}"></script>
<script src="{{ asset('js/DetectRTC.js')}}"></script>
<!-- for Edige/FF/Chrome/Opera/etc. getUserMedia support -->
<script src="{{ asset('js/adapter-latest.js')}}"></script>

@if ($liveClass->id == 1 || $liveClass->id == 23 || $liveClass->id == 24 || $liveClass->id == 25 || $liveClass->id ==
26)
<link href="{{ asset('css/videojstheme.min.css') }}" rel="stylesheet">
@endif

@endif

@endsection

@section('content')


<div class="container">
    <!--begin::Row-->
    <div class="row">
        @include('partials.alerts')
    </div>

</div>

@auth

@isset($liveClass->code)

@if (
$course->teacher_id == auth()->user()->id ||
$course->institute_id == auth()->user()->id ||
Auth::user()->can('see all courses') ||
$course->type == 'free' ||
($course->type == 'login' && auth()->user()->hasCourse($course->id)) ||
($course->type == 'code' && auth()->user()->hasCourse($course->id)) ||
($course->type == 'paid' && auth()->user()->hasCourse($course->id)) ||
($course->type == 'class' && auth()->user()->hasCourse($course->id))
)
@include('partials.LiveSection')
@endif

@endisset

@endauth

@guest

@if ($course->type == 'free')

@isset($liveClass->code)
@include('partials.LiveSection')
@endisset

@endif

@endguest


<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row my-6">
            <!--begin::Product-->
            <div class="col-md-4 col-xxl-4 col-12">
                <div class="card card-custom bgi-no-repeat gutter-b p-5 rounded-xl">
                    <!--begin::Card-->
                    <div class="card card-custom card-shadowless">
                        <div class="card-body p-0">
                            <!--begin::Image-->
                            <div class="overlay">
                                <div class="overlay-wrapper rounded-xl text-center bg-light">
                                    <img src="{{ asset('storage/' . $course->photo->filePath()) }}"
                                        alt="پازل استودیو - {{ $course->name }}"
                                        class="w-100 lazyload rounded-xl border" />
                                </div>
                            </div>
                            <!--end::Image-->

                            <!--begin::Details-->
                            <div class="text-left mt-5 mb-0 d-flex flex-column">
                                <div class="font-size-h3 font-weight-boldest text-dark">{{ $course->name }}</div>
                                <div class="d-block">
                                    @if ($course->type == 'free')
                                    <span class="label label-success label-pill label-inline py-2 mt-2">
                                        این دوره رایگان است.
                                    </span>
                                    @elseif(Auth::check() && auth()->user()->hasCourse($course->id))
                                    <span class="label label-success label-pill label-inline py-2 mt-2">
                                        شما عضو این دوره هستید.
                                    </span>
                                    @elseif(Auth::check() && auth()->user()->hasRole('admin'))
                                    @elseif($course->type == 'login')
                                    @guest
                                    <span class="label label-danger label-pill label-inline py-2 mt-2">
                                        این دوره رایگان است و شما برای استفاده از دوره باید ابتدا در سایت ثبت نام کنید.
                                    </span>
                                    <a href="{{ route('auth.firstRegister.form') }}"
                                        class="w-100 btn btn-success btn-pill mt-3">
                                        ثبت نام در سایت
                                    </a>
                                    @endguest
                                    @auth
                                    <span class="label label-warning label-pill label-inline py-2 mt-2">
                                        برای دسترسی به دوره روی دکمه ثبت نام پایین کلیک کنید.
                                    </span>
                                    <a href="{{ route('signLoginCourse', $course->id) }}"
                                        class="w-100 btn btn-success btn-pill mt-4">
                                        <span class="svg-icon">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-06-223557/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Plus.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                                    <rect fill="#000000" opacity="0.3"
                                                        transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
                                                        x="4" y="11" width="16" height="2" rx="1" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        ثبت نام رایگان در دوره
                                    </a>
                                    @endauth
                                    @elseif($course->type == 'class')
                                    @guest
                                    <span class="label label-danger label-pill label-inline py-2 mt-2">
                                        برای استفاده از دوره ابتدا باید وارد سایت شوید.
                                    </span>
                                    @endguest
                                    @auth
                                    @if ($course->teacher_id == auth()->user()->id ||
                                    $course->institute_id == auth()->user()->id)
                                        
                                    @else
                                    <span class="label label-danger label-pill label-inline py-2 mt-2">
                                        دسترسی به محتوای این دوره صرفا توسط برگزار کننده امکان پذیر است .لطفا با
                                        برگزارکننده در تماس باشید.
                                    </span>
                                    @endif
                                    @endauth
                                    @elseif($course->type == 'paid')
                                    @if ($course->discount_price != null)
                                    <span
                                        class="price font-weight-bolder font-size-h2 text-success faNum">{{ number_format($course->discount_price) }}تومان</span>
                                    <span
                                        class="price font-weight-bolder mt-3 text-muted faNum"><del>{{ number_format($course->price) }}تومان</del></span>
                                    @else
                                    <div class="price font-weight-bolder font-size-h3 mt-3 text-success faNum">
                                        {{ number_format($course->price) }}تومان</div>
                                    @endif
                                    <a href="{{ route('basket.add', $course->id) }}"
                                        class="btn btn-success btn-pill w-100 mt-4">
                                        ثبت نام دوره
                                    </a>
                                    @elseif($course->type == 'code')
                                    @guest
                                    <span class="label label-danger label-pill label-inline py-2 mt-2">
                                        برای استفاده از دوره باید ابتدا در سایت ثبت نام کنید.
                                    </span>
                                    <a href="{{ route('auth.firstRegister.form') }}"
                                        class="w-100 btn btn-success btn-pill mt-3">
                                        ثبت نام در سایت
                                    </a>
                                    @endguest
                                    @auth
                                    <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                        شما هم اکنون وارد سایت شدید برای استفاده از دوره کد ورود خود را در باکس پایین
                                        وارد
                                        کنید سپس بر روی دکمه ثبت نام دوره بزنید.
                                        <br>
                                        <form action="{{ route('CodeLoginCourse', $course->id) }}" method="post"
                                            class="mt-5">
                                            @csrf
                                            <div class="form-group">
                                                <label class="font-size-h6 font-weight-bolder text-dark">کد
                                                    دسترسی:</label>
                                                <input type="text"
                                                    class="input-group input-group-solid rounded-lg border py-5 px-6 font-size-h6"
                                                    name="access_code" id="pz_accescode_mask"
                                                    placeholder="____-____-____-____" style="direction: ltr;" />
                                                <span class="form-text text-muted">خط فاصله به صورت خودکار وارد
                                                    می‌شود</span>
                                            </div>
                                            <button class="w-100 btn btn-success rounded-lg mb-4 py-4">ثبت نام
                                                دوره</button>
                                        </form>
                                    </div>
                                    @endauth
                                    @endif
                                </div>
                            </div>
                            <!--end::Details-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                @if(Auth::check() && auth()->user()->hasRole('admin'))
                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-primary w-100 btn-pill btn-sm">
                    <span class="svg-icon svg-icon-2x">
                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-06-223557/theme/html/demo1/dist/../src/media/svg/icons/General/Settings-2.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                    fill="#000000" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    ویرایش دوره
                </a>
                <a href="{{ route('classroom.courseClassroom', $course->id) }}"
                    class="btn btn-success w-100 btn-pill btn-sm mt-3">
                    <span class="svg-icon svg-icon-2x">
                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Media/Media-library1.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <rect fill="#000000" opacity="0.9" x="2" y="9" width="20" height="13" rx="2" />
                                <rect fill="#000000" opacity="0.8" x="5" y="5" width="14" height="2" rx="0.5" />
                                <rect fill="#000000" opacity="0.7" x="7" y="1" width="10" height="2" rx="0.5" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    لیست جلسات
                </a>
                <a href="{{ route('course.courseStudentList', $course->id) }}"
                    class="btn btn-warning w-100 btn-pill btn-sm mt-3">
                    <span class="svg-icon svg-icon-2x">
                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
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
                    لیست دانش آموزان
                </a>
                <a href="{{ route('booklet.indexCourse', $course->id) }}"
                    class="btn btn-info w-100 btn-pill btn-sm mt-3">
                    <span class="svg-icon svg-icon-2x">
                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Files/Selected-file.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
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
                    لیست فایل‌ها
                </a>
                @endif
            </div>
            <!--end::Product-->
            <div class="col-lg-8 col-xxl-8 col-12">
                <div class="card card-custom gutter-b rounded-xl">

                    <!--Begin::Header-->
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x "
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#info">
                                        <span class="nav-icon"><i class="flaticon2-information"></i></span>
                                        <span class="nav-text font-size-h6">توضیحات دوره</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#files"
                                        aria-controls="contact">
                                        <span class="nav-icon"><i class="flaticon2-protected"></i></span>
                                        <span class="nav-text font-size-h6">فایل‌ها</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content p-5 mt-4" id="myTabContent">

                        <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="home-tab">
                            <p class="font-size-h6">
                                {!! $course->description !!}
                            </p>
                        </div>
                        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    @guest
                                    @if ($course->type == 'free')
                                    @include('partials.webinarHandout')
                                    @include('partials.webinarHW')
                                    @include('partials.webinarAnswer')
                                    @else
                                    <div class="alert alert-custom alert-danger" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                        <div class="alert-text">دسترسی فایل‌های این دوره محدود به شرکت‌کنندگان دوره
                                            است..</div>
                                    </div>
                                    @endif
                                    @endguest
                                    @auth
                                    @if (
                                    $course->teacher_id == auth()->user()->id ||
                                    $course->institute_id == auth()->user()->id ||
                                    Auth::user()->can('see all courses') ||
                                    $course->type == 'free' ||
                                    ($course->type == 'login' && auth()->user()->hasCourse($course->id)) ||
                                    ($course->type == 'code' && auth()->user()->hasCourse($course->id)) ||
                                    ($course->type == 'paid' && auth()->user()->hasCourse($course->id)) ||
                                    ($course->type == 'class' && auth()->user()->hasCourse($course->id))
                                    )
                                    @include('partials.webinarHandout')
                                    @include('partials.webinarHW')
                                    @include('partials.webinarAnswer')

                                    @else
                                    <div class="alert alert-custom alert-danger" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                        <div class="alert-text">دسترسی فایل‌های این دوره محدود به شرکت‌کنندگان دوره
                                            است..</div>
                                    </div>
                                    @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-custom gutter-b rounded-xl">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="teacherDetail my-2">
                                    <div class="d-flex flex-row">
                                        @if ($course->teacher->photo != null)
                                        <img src="{{ asset('storage/' . $course->teacher->photo->filePath()) }}"
                                            alt="پازل استودیو - {{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}"
                                            width="60px" height="60px">
                                        @endif
                                        <a href="{{ route('teacher.frontend', $course->teacher) }}"
                                            class="h3 text-dark font-weight-bolder my-auto ml-4 faNum">{{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}</a>
                                    </div>
                                    <div class="teacherInfo">
                                        <p class="text-dark-75 font-size-h6 mt-4">
                                            {{ $course->teacher->info }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @if ($course->teacher_id != $course->institute_id)
                            <div class="col-md-6 col-12">
                                <div class="teacherDetail my-2">
                                    <div class="d-flex flex-row">
                                        @if ($course->institute->photo != null)
                                        <img src="{{ asset('storage/' . $course->institute->photo->filePath()) }}"
                                            alt="پازل استودیو - {{ $course->institute->first_name . ' ' . $course->institute->last_name }}"
                                            width="60px" height="60px">
                                        @endif
                                        <a href="{{ route('institute.frontend', $course->institute) }}"
                                            class="h3 text-dark font-weight-bolder my-auto ml-4 faNum">{{ $course->institute->first_name . ' ' . $course->institute->last_name }}</a>
                                    </div>
                                    <div class="teacherInfo">
                                        <p class="text-dark-75 font-size-h6 mt-4">
                                            {{ $course->institute->info }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card card-custom gutter-b rounded-xl">
                    <!--begin::Header-->
                    <div class="card-header">
                        <h3 class="card-title">
                            <span class="card-label font-weight-bolder text-dark">کلاس ها</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <div class="card-body">
                        <div class="row">
                            @if($course->limited == true)
                            <div class="alert alert-custom rounded-xl alert-danger w-100" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                <div class="alert-text">
                                </div>
                            </div>
                            @elseif ( (Auth::check() && auth()->user()->hasCourse($course->id)) || (Auth::check() && auth()->user()->hasRole('admin')) || $course->type == 'free' || (Auth::check() && $course->teacher_id == auth()->user()->id) ||
                            (Auth::check() && $course->institute_id == auth()->user()->id))
                                @include('partials.webinarClassrooms')
                            @else
                                <div class="alert alert-custom rounded-xl alert-danger w-100" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">براي مشاهده کامل آرشیو این دوره باید ثبت نام کنید.
                                    </div>
                                </div>
                            @include('partials.webinarClassrooms')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

@endsection

@section('footer')
@include('partials.footer')
@endsection

@section('script')

@if (isset($liveClass->code))
<script src="https://code.jquery.com/jquery-latest.min.js"></script>

<script>
    $(document).ready(function() {
        $("#pz_accescode_mask").inputmask("9999-9999-9999-9999", {
            "placeholder": "____-____-____-____",
            autoUnmask: true
        });

        $('#TheaterMode').click(function(e) {
            $('#liveBox').toggleClass('container');
            $('#liveBox').toggleClass('container-fluid');
        });
    });
</script>

<script src="{{ asset('/js/app.js') }}"></script>

@include('partials.LiveScripts')

@else
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script>
    $(document).ready(function() {
        $("#pz_accescode_mask").inputmask("9999-9999-9999-9999", {
            "placeholder": "____-____-____-____",
            autoUnmask: true
        });
    });
</script>
@endif

@endsection