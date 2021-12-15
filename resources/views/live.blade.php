@extends('layouts.landing')

@section('title', 'پازل استودیو | صفحه نخست')

@section('css')
<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <img src="{{ asset('media/event-hamedani.jpeg')}}" class="w-100 mx-auto mb-10 card shadow rounded-xl">
        </div>
    </div>
</div>
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

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-custom gutter-b rounded-xl">

                <!--Begin::Header-->
                <div class="card-header card-header-tabs-line">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x "
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#info">
                                    <span class="nav-icon"><i class="flaticon2-information"></i></span>
                                    <span class="nav-text font-size-h6">توضیحات رویداد</span>
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
                        <span class="card-label font-weight-bolder text-dark">آرشیو رویداد</span>
                    </h3>
                </div>
                <!--end::Header-->
                <div class="card-body">
                    <div class="row">

                        @if ( (Auth::check() && auth()->user()->hasCourse($course->id)) || (Auth::check() && auth()->user()->hasRole('admin')) || $course->type == 'free' || (Auth::check() && $course->teacher_id == auth()->user()->id) ||
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
        <div class="col-12">
            <!--begin::Page Layout-->
            <div class="d-flex flex-row ">
                <div class="flex-row-fluid ">
                    <a href="https://instagram.com/puzzlestudio_org" class="w-100">
                        <div class="card card-custom card-stretch bg-primary rounded-xl py-10"
                            style="background: url({{ asset('media/pattern.png') }}),linear-gradient(-145deg,#285aeb,#d6249f,#fd5949)">
                            <div class="card-body ">
                                <div class="row d-flex justify-content-between align-items-center ">
                                    <div class="text-center col-md-6 col-12">
                                        <span class="font-weight-boldest text-white font-size-h3 ">برای با
                                            خبر شدن از جدیدترین اخبار اینستاگرام پازل را دنبال کنید.</span>
                                    </div>
                                    <div class="text-center col-md-2 col-12">
                                        <button class="btn btn-lg btn-transparent-white rounded-circle">
                                            <i class="socicon-instagram py-3 px-1 icon-3x"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Page Layout-->
        </div>
    </div>
</div>

@endsection

@section('footer')
<div class="footer bg-dark py-10 border-0">
    <div class="container">
        <div class="row py-15 text-white">
            <div class="col-md-3">
                <h1 class="display-1 font-weight-boldest d-flex text-center">پازل <span
                        class="font-weight-lighter d-inline display-4">استودیو</span></h1>
                <p class="text-justify mt-5">
                    گروه پازل با بهره‌گیری از جدیدترین تکنولوژی های روز، بستری فراهم دیده است تا شما بتوانید به راحتی
                    پخش زنده همایش‌ها، کلاس‌ها و ایونت های خود را بدون استرس از مشکلات پیش‌بینی نشده انجام دهید.
                </p>
            </div>
            <div class="col-md-3">
                <h3 class="font-weight-boldest">درباره پازل استودیو</h3>
                <ul class="list-group bg-transparent">
                    <li class="border-0 bg-transparent list-group-item">درباره ما</li>
                    <li class="border-0 bg-transparent list-group-item">قوانین و مقررات</li>
                    <li class="border-0 bg-transparent list-group-item">حریم خصوصی</li>
                    <li class="border-0 bg-transparent list-group-item">شرایط استفاده</li>
                    <li class="border-0 bg-transparent list-group-item">سوالات متداول</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3 class="font-weight-boldest">خدمات پازل استودیو</h3>
                <ul class="list-group bg-transparent">
                    <li class="border-0 bg-transparent list-group-item">پخش زنده سیار</li>
                    <li class="border-0 bg-transparent list-group-item">استودیو زنجیره‌ای</li>
                    <li class="border-0 bg-transparent list-group-item">تجهیز استودیو</li>
                    <li class="border-0 bg-transparent list-group-item">طراحی سایت</li>
                    <li class="border-0 bg-transparent list-group-item">ضبط آفلاین</li>
                </ul>
            </div>
            <div class="col-md-3 d-table">
                <img src="https://www.p30web.org/wp-content/uploads/2016/12/enamad_icon_text_color_blue_1024.png"
                    class="w-50" alt="">
                <img src="https://files.virgool.io/upload/users/296/posts/z3exdmqlrnv8/2bkhoyoyr9pt.png" class="w-50"
                    alt="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-latest.min.js"></script>

<script>
    $(document).ready(function() {
        $('#TheaterMode').click(function(e) {
            $('#liveBox').toggleClass('container');
            $('#liveBox').toggleClass('container-fluid');
        });
    });
</script>

@endsection