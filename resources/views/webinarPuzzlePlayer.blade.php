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
    @endif
    <link href="{{ asset('css/videojstheme.min.css') }}" rel="stylesheet">

@endsection

@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container">
            @include('partials.alerts')
        </div>
    </div>
    @if (Auth::check())
        @if ($course->teacher_id == auth()->user()->id || $course->institute_id == auth()->user()->id)
            @if (isset($liveClass->code))
                <div class="d-flex flex-column-fluid">
                    <div class="container-fluid">
                        <div class="row bg-black d-flex flex-md-row flex-column-reverse  mt-md-0 mt-30">
                            <div class="col-md-3 col-12 px-0">
                                @include('partials.questionStore')
                            </div>
                            <div class="col-md-9 col-12 px-0">
                                <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin mx-md-0 mx-auto" style="width:100%"
                                    
                                    poster="{{ asset('storage/image/clear-cover-min.jpg') }}" controls
                                    preload="auto">
                                    <source src="{{ $liveClass->code }}{{ $course->live_class }}.m3u8"
                                        type="application/x-mpegURL">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class=" container ">
                    <!--begin::Row-->
                    <div class="row my-6">
                        <!--begin::Product-->
                        <div class="col-md-4 col-xxl-4 col-12">
                            <div class="card card-custom bgi-no-repeat gutter-b p-5">
                                <!--begin::Card-->
                                <div class="card card-custom card-shadowless">
                                    <div class="card-body p-0">
                                        <!--begin::Image-->
                                        <div class="overlay">
                                            <div class="overlay-wrapper rounded text-center bg-light">
                                                <img src="{{ asset('storage/' . $course->photo->filePath()) }}"
                                                    alt="پازل استودیو - {{ $course->name }}" class="w-100 lazyload" />
                                            </div>
                                        </div>
                                        <!--end::Image-->

                                        <!--begin::Details-->
                                        <div class="text-left mt-5 mb-0 d-flex flex-column">
                                            <a href="#"
                                                class="font-size-h2 mx-4 my-2 font-weight-bolder text-dark-75 text-hover-primary mb-1 add-loader">{{ $course->name }}</a>
                                            @role('admin')
                                            <a href="{{ route('course.edit', $course->id) }}"
                                                class="btn btn-light-dark my-2 my-md-4 py-2 py-md-4">
                                                ویرایش دوره
                                            </a>
                                            <div class="d-flex flex-row justify-content-around">
                                                <a href="{{ route('classroom.courseClassroom', $course->id) }}"
                                                    class="btn btn-outline-success btn-sm">
                                                    <i class="fas fa-chalkboard"></i>
                                                    کلاس ها
                                                </a>
                                                <a href="{{ route('course.courseStudentList', $course->id) }}"
                                                    class="btn btn-outline-warning btn-sm">
                                                    <i class="fas fa-graduation-cap"></i>
                                                    دانش آموزان
                                                </a>
                                                <a href="{{ route('booklet.indexCourse', $course->id) }}"
                                                    class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-book"></i>
                                                    جزوات
                                                </a>
                                            </div>
                                            @endrole
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>
                        </div>
                        <!--end::Product-->
                        <div class="col-lg-8 col-xxl-8 col-12">
                            <div class="card card-custom gutter-b p-5">

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
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#notes"
                                                    aria-controls="profile">
                                                    <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                    <span class="nav-text font-size-h6">جزوات</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#homeworks"
                                                    aria-controls="contact">
                                                    <span class="nav-icon"><i class="flaticon2-writing"></i></span>
                                                    <span class="nav-text font-size-h6">تکالیف</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#answer"
                                                    aria-controls="contact">
                                                    <span class="nav-icon"><i class="flaticon2-protected"></i></span>
                                                    <span class="nav-text font-size-h6">پاسخنامه</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content mt-4" id="myTabContent">

                                    <div class="tab-pane fade active show" id="info" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <p class="font-size-h6">
                                            {!! $course->description !!}
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @include('partials.webinarHandout')
                                                @include('partials.webinarHW')
                                                @include('partials.webinarAnswer')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-custom gutter-b">
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
                                                        class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}</a>
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
                                                            class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->institute->first_name . ' ' . $course->institute->last_name }}</a>
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
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bolder text-dark">کلاس ها</span>
                                    </h3>
                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--end::Header-->
                                <div class="card-body">
                                    <div class="row">
                                        @include('partials.webinarClassrooms')
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
        @endif
        @can('see all courses')
            @if (isset($liveClass->code))
                <div class="d-flex flex-column-fluid">
                    <div class="container-fluid">
                        <div class="row bg-black d-flex flex-md-row flex-column-reverse mt-md-0">
                            <div class="col-md-3 col-12 px-0">
                                @include('partials.questionStore')
                            </div>
                            <div class="col-md-9 col-12 px-0">
                                <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin mx-md-0 mx-auto" style="width:100%"
                                    
                                    poster="{{ asset('storage/image/clear-cover-min.jpg') }}" controls
                                    preload="auto">
                                    <source src="{{ $liveClass->code }}{{ $course->live_class }}.m3u8"
                                        type="application/x-mpegURL">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class=" container ">
                    <!--begin::Row-->
                    <div class="row my-6">
                        <!--begin::Product-->
                        <div class="col-md-4 col-xxl-4 col-12">
                            <div class="card card-custom bgi-no-repeat gutter-b p-5">
                                <!--begin::Card-->
                                <div class="card card-custom card-shadowless">
                                    <div class="card-body p-0">
                                        <!--begin::Image-->
                                        <div class="overlay">
                                            <div class="overlay-wrapper rounded text-center bg-light">
                                                <img src="{{ asset('storage/' . $course->photo->filePath()) }}"
                                                    alt="پازل استودیو - {{ $course->name }}" class="w-100 lazyload" />
                                            </div>
                                        </div>
                                        <!--end::Image-->

                                        <!--begin::Details-->
                                        <div class="text-left mt-5 mb-0 d-flex flex-column">
                                            <a href="#"
                                                class="font-size-h2 mx-4 my-2 font-weight-bolder text-dark-75 text-hover-primary mb-1 add-loader">{{ $course->name }}</a>
                                            @role('admin')
                                            <a href="{{ route('course.edit', $course->id) }}"
                                                class="btn btn-light-dark my-2 my-md-4 py-2 py-md-4">
                                                ویرایش دوره
                                            </a>
                                            <div class="d-flex flex-row justify-content-around">
                                                <a href="{{ route('classroom.courseClassroom', $course->id) }}"
                                                    class="btn btn-outline-success btn-sm">
                                                    <i class="fas fa-chalkboard"></i>
                                                    کلاس ها
                                                </a>
                                                <a href="{{ route('course.courseStudentList', $course->id) }}"
                                                    class="btn btn-outline-warning btn-sm">
                                                    <i class="fas fa-graduation-cap"></i>
                                                    دانش آموزان
                                                </a>
                                                <a href="{{ route('booklet.indexCourse', $course->id) }}"
                                                    class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-book"></i>
                                                    جزوات
                                                </a>
                                            </div>
                                            @endrole
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>
                        </div>
                        <!--end::Product-->
                        <div class="col-lg-8 col-xxl-8 col-12">
                            <div class="card card-custom gutter-b p-5">

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
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#notes"
                                                    aria-controls="profile">
                                                    <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                    <span class="nav-text font-size-h6">جزوات</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#homeworks"
                                                    aria-controls="contact">
                                                    <span class="nav-icon"><i class="flaticon2-writing"></i></span>
                                                    <span class="nav-text font-size-h6">تکالیف</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#answer"
                                                    aria-controls="contact">
                                                    <span class="nav-icon"><i class="flaticon2-protected"></i></span>
                                                    <span class="nav-text font-size-h6">پاسخنامه</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content mt-4" id="myTabContent">

                                    <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="home-tab">
                                        <p class="font-size-h6">
                                            {!! $course->description !!}
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @include('partials.webinarHandout')
                                                @include('partials.webinarHW')
                                                @include('partials.webinarAnswer')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-custom gutter-b">
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
                                                        class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}</a>
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
                                                            class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->institute->first_name . ' ' . $course->institute->last_name }}</a>
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
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bolder text-dark">کلاس ها</span>
                                    </h3>
                                    <div class="card-toolbar">

                                    </div>
                                </div>
                                <!--end::Header-->
                                <div class="card-body">
                                    <div class="row">
                                        @include('partials.webinarClassrooms')
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
        @endcan

        @cannot('see all courses')
        @switch($course->type)
            @case('free')
                @if (!empty($course->live_class))
                    <div class="d-flex flex-column-fluid">
                        <div class="container-fluid">
                            <div class="row bg-black d-flex flex-md-row flex-column-reverse  mt-md-0 mt-30">
                                @auth
                                    <div class="col-md-3 col-12 px-0">
                                        @include('partials.questionStore')
                                    </div>
                                @endauth
                                @guest
                                    <div class="col-md-3 col-12 px-0">
                                        @include('partials.questionStoreGuest')
                                    </div>
                                @endguest
                                <div class="col-md-9 col-12 px-0">
                                    <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin mx-md-0 mx-auto" style="width:100%"
                                        
                                        poster="{{ asset('storage/image/clear-cover-min.jpg') }}" controls
                                        preload="auto">
                                        <source src="{{ $liveClass->code }}{{ $course->live_class }}.m3u8"
                                            type="application/x-mpegURL">
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class=" container ">
                        <!--begin::Row-->
                        <div class="row my-6">
                            <!--begin::Product-->
                            <div class="col-md-4 col-xxl-4 col-12">
                                <div class="card card-custom bgi-no-repeat gutter-b p-5">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-shadowless">
                                        <div class="card-body p-0">
                                            <!--begin::Image-->
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded text-center bg-light">
                                                    <img src="{{ asset('storage/' . $course->photo->filePath()) }}"
                                                        alt="پازل استودیو - {{ $course->name }}" class="w-100 lazyload" />
                                                </div>
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Details-->
                                            <div class="text-left mt-5 mb-0 d-flex flex-column">
                                                <a href="#"
                                                    class="font-size-h2 mx-4 my-2 font-weight-bolder text-dark-75 text-hover-primary mb-1 add-loader">{{ $course->name }}</a>
                                                <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-success">این دوره رایگان
                                                    است .
                                                </div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                            <!--end::Product-->
                            <div class="col-lg-8 col-xxl-8 col-12">
                                <div class="card card-custom gutter-b p-5">

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
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#notes"
                                                        aria-controls="profile">
                                                        <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                        <span class="nav-text font-size-h6">جزوات</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#homeworks"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="nav-text font-size-h6">تکالیف</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#answer"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-protected"></i></span>
                                                        <span class="nav-text font-size-h6">پاسخنامه</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content mt-4" id="myTabContent">

                                        <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="home-tab">
                                            <p class="font-size-h6">

                                                {!! $course->description !!}
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @include('partials.webinarHandout')
                                                    @include('partials.webinarHW')
                                                    @include('partials.webinarAnswer')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-custom gutter-b">
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
                                                            class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}</a>
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
                                                                class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->institute->first_name . ' ' . $course->institute->last_name }}</a>
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
                                <div class="card card-custom gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label font-weight-bolder text-dark">کلاس ها</span>
                                        </h3>
                                        <div class="card-toolbar">

                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <div class="card-body">
                                        <div class="row">
                                            @include('partials.webinarClassrooms')
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
            @break
            @case('login')
                @if (!empty($course->live_class))
                    <div class="d-flex flex-column-fluid">
                        <div class="container-fluid">
                            <div class="row bg-black d-flex flex-md-row flex-column-reverse mt-md-0">
                                @auth
                                    @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                        <div class="col-md-3 col-12 px-0">
                                            @include('partials.questionStore')
                                        </div>
                                        <div class="col-md-9 col-12 px-0">
                                            <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin mx-md-0 mx-auto" style="width:100%"
                                                
                                                poster="{{ asset('storage/image/clear-cover-min.jpg') }}" controls
                                                preload="auto">
                                                <source src="{{ $liveClass->code }}{{ $course->live_class }}.m3u8"
                                                    type="application/x-mpegURL">
                                            </video>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endif
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class=" container ">
                        <!--begin::Row-->
                        <div class="row my-6">
                            <!--begin::Product-->
                            <div class="col-md-4 col-xxl-4 col-12">
                                <div class="card card-custom bgi-no-repeat gutter-b p-5">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-shadowless">
                                        <div class="card-body p-0">
                                            <!--begin::Image-->
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded text-center bg-light">
                                                    <img src="{{ asset('storage/' . $course->photo->filePath()) }}"
                                                        alt="پازل استودیو - {{ $course->name }}" class="w-100 lazyload" />
                                                </div>
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Details-->
                                            <div class="text-left mt-5 mb-0 d-flex flex-column">
                                                <a href="#"
                                                    class="font-size-h2 mx-4 my-2 font-weight-bolder text-dark-75 text-hover-primary mb-1 add-loader">{{ $course->name }}</a>
                                                @guest
                                                    <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                        اين دوره رايگان است و شما براي استفاده از دوره باید ثبت نام کنید.
                                                        <br>
                                                        <a href="{{ route('auth.firstRegister.form') }}"
                                                            class="w-100 btn btn-success my-4 py-4">
                                                            ثبت نام
                                                        </a>
                                                    </div>
                                                @endguest
                                                @auth
                                                    @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                                        <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-success">
                                                            شما میتوانید از این دوره استفاده کنید.
                                                        </div>
                                                    @else
                                                    <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                        شما هم اکنون وارد سایت شدید برای استفاده از دوره باید ثبت نام کنید.
                                                        <br>
                                                        <a href="{{ route('signLoginCourse', $course->id) }}"
                                                            class="w-100 btn btn-success my-4 py-4">
                                                            ثبت نام
                                                        </a>
                                                    </div>
                                                    @endif
                                                @endauth
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                            <!--end::Product-->
                            <div class="col-lg-8 col-xxl-8 col-12">
                                <div class="card card-custom gutter-b p-5">
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
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#notes"
                                                        aria-controls="profile">
                                                        <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                        <span class="nav-text font-size-h6">جزوات</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#homeworks"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="nav-text font-size-h6">تکالیف</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#answer"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-protected"></i></span>
                                                        <span class="nav-text font-size-h6">پاسخنامه</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content mt-4" id="myTabContent">

                                        <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="home-tab">
                                            <p class="font-size-h6">

                                                {!! $course->description !!}
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @guest
                                                    <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                        <div class="alert-text">براي ديدن جزوات اين دوره بايد ثبت نام کنید.
                                                            <a href="{{ route('auth.firstRegister.form') }}"
                                                                class="btn btn-outline-success my-4 py-4">
                                                                ثبت نام
                                                            </a>
                                                        </div>
                                        
                                                        <div class="alert-close">
                                                        </div>
                                                    </div>
                                                    @endguest
                                                    @if (auth()->user()->hasCourse($course->id))
                                                        @include('partials.webinarHandout')
                                                        @include('partials.webinarHW')
                                                        @include('partials.webinarAnswer')
                                                    @else
                                                        <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                            <div class="alert-text">براي ديدن جزوات اين دوره بايد ثبت نام کنید.</div>
                                                            <div class="alert-close">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-custom gutter-b">
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
                                                            class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}</a>
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
                                                                class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->institute->first_name . ' ' . $course->institute->last_name }}</a>
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
                                <div class="card card-custom gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label font-weight-bolder text-dark">کلاس ها</span>
                                        </h3>
                                        <div class="card-toolbar">

                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <div class="card-body">
                                        <div class="row">
                                            @guest
                                                @include('partials.webinarClassrooms')
                                                <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                    <div class="alert-text">براي مشاهده کامل آرشیو این دوره باید ثبت نام کنید.
                                                        <a href="{{ route('auth.firstRegister.form') }}"
                                                            class="btn btn-outline-success my-4 py-4">
                                                            ثبت نام
                                                        </a>
                                                    </div>

                                                    <div class="alert-close">
                                                    </div>
                                                </div>
                                            @endguest
                                            @auth
                                                @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                                    @include('partials.webinarClassrooms')
                                                @else
                                                    @include('partials.webinarClassrooms')
                                                    <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                        <div class="alert-text">براي مشاهده کامل آرشیو این دوره باید ثبت نام کنید.
                                                        </div>
                                                    </div>

                                                @endif

                                            @endauth
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
            @break
            @case('paid')
                @if (!empty($course->live_class))
                    @auth
                        <div class="d-flex flex-column-fluid">
                            <div class="container-fluid">
                                <div class="row bg-black d-flex flex-md-row flex-column-reverse mt-md-0">
                                    @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                        <div class="col-md-3 col-12 px-0">
                                            @include('partials.questionStore')
                                        </div>
                                        <div class="col-md-9 col-12 px-0">
                                            <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin mx-md-0 mx-auto" style="width:100%"
                                                
                                                poster="{{ asset('storage/image/clear-cover-min.jpg') }}" controls
                                                preload="auto">
                                                <source src="{{ $liveClass->code }}{{ $course->live_class }}.m3u8"
                                                    type="application/x-mpegURL">
                                            </video>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endauth
                @endif
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class=" container ">
                        <!--begin::Row-->
                        <div class="row my-6">
                            <!--begin::Product-->
                            <div class="col-md-4 col-xxl-4 col-12">
                                <div class="card card-custom bgi-no-repeat gutter-b p-5">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-shadowless">
                                        <div class="card-body p-0">
                                            <!--begin::Image-->
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded text-center bg-light">
                                                    <img src="{{ asset('storage/' . $course->photo->filePath()) }}"
                                                        alt="پازل استودیو - {{ $course->name }}" class="w-100 lazyload" />
                                                </div>
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Details-->
                                            <div class="text-left mt-5 mb-0 d-flex flex-column">
                                                <a href="#"
                                                    class="font-size-h2 mx-4 my-2 font-weight-bolder text-dark-75 text-hover-primary mb-1 add-loader">{{ $course->name }}</a>
                                                @auth
                                                    @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                                        <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-success">
                                                            شما دوره را قبلا تهیه کرده اید.
                                                        </div>
                                                    @else
                                                        <div class="price font-size-h6 font-weight-normal mx-4 my-2">
                                                            @if ($course->discount_price != null)
                                                                <span><del>{{ $course->price }} تومان</del></span>
                                                                <span>{{ $course->discount_price }}تومان</span>
                                                            @else
                                                                <span>{{ $course->price }}تومان</span>

                                                            @endif
                                                        </div>
                                                        <a href="{{ route('basket.add', $course->id) }}"
                                                            class="btn btn-success my-4 py-4">
                                                            ثبت نام دوره
                                                        </a>
                                                    @endif
                                                @endauth
                                                @guest
                                                    <div class="price font-size-h6 font-weight-normal mx-4 my-2">
                                                        @if ($course->discount_price != null)
                                                            <span><del>{{ $course->price }} تومان</del></span>
                                                            <span>{{ $course->discount_price }}تومان</span>
                                                        @else
                                                            <span>{{ $course->price }}تومان</span>

                                                        @endif
                                                    </div>
                                                    <a href="{{ route('auth.firstRegister.form') }}" class="btn btn-success my-4 py-4">
                                                        ثبت نام دوره
                                                    </a>
                                                @endguest
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                            <!--end::Product-->
                            <div class="col-lg-8 col-xxl-8 col-12">
                                <div class="card card-custom gutter-b p-5">

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
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#notes"
                                                        aria-controls="profile">
                                                        <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                        <span class="nav-text font-size-h6">جزوات</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#homeworks"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="nav-text font-size-h6">تکالیف</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#answer"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-protected"></i></span>
                                                        <span class="nav-text font-size-h6">پاسخنامه</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content mt-4" id="myTabContent">

                                        <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="home-tab">
                                            <p class="font-size-h6">

                                                {!! $course->description !!}
                                            </p>
                                        </div>

                                        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @guest
                                                    <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                        <div class="alert-text">براي ديدن جزوات اين دوره بايد ثبت نام کنید.
                                                            <a href="{{ route('auth.firstRegister.form') }}"
                                                                class="btn btn-outline-success my-4 py-4">
                                                                ثبت نام
                                                            </a>
                                                        </div>
                                        
                                                        <div class="alert-close">
                                                        </div>
                                                    </div>
                                                    @endguest
                                                    @if (auth()->user()->hasCourse($course->id))
                                                        @include('partials.webinarHandout')
                                                        @include('partials.webinarHW')
                                                        @include('partials.webinarAnswer')
                                                    @else
                                                        <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                            <div class="alert-text">براي ديدن جزوات اين دوره بايد ثبت نام کنید.</div>
                                                            <div class="alert-close">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-custom gutter-b">
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
                                                            class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}</a>
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
                                                                class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->institute->first_name . ' ' . $course->institute->last_name }}</a>
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
                                <div class="card card-custom gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label font-weight-bolder text-dark">کلاس ها</span>
                                        </h3>
                                        <div class="card-toolbar">

                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <div class="card-body">
                                        <div class="row">
                                            @auth
                                                @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                                    @include('partials.webinarClassrooms')
                                                @else
                                                    @include('partials.webinarClassrooms')

                                                    <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                        براي مشاهده کامل آرشیو بايد دوره را تهيه كنيد .
                                                    </div>
                                                @endif
                                            @endauth
                                            @guest
                                                @include('partials.webinarClassrooms')

                                                <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                    براي مشاهده کامل آرشیو بايد دوره را تهيه كنيد .
                                                </div>
                                            @endguest
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
            @break
            @case('class')
                @if (!empty($course->live_class))
                    @auth
                        <div class="d-flex flex-column-fluid">
                            <div class="container-fluid">
                                <div class="row bg-black d-flex flex-md-row flex-column-reverse mt-md-0">
                                    @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                        <div class="col-md-3 col-12 px-0">
                                            @include('partials.questionStore')
                                        </div>
                                        <div class="col-md-9 col-12 px-0">
                                            <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin mx-md-0 mx-auto" style="width:100%"
                                                
                                                poster="{{ asset('storage/image/clear-cover-min.jpg') }}" controls
                                                preload="auto">
                                                <source src="{{ $liveClass->code }}{{ $course->live_class }}.m3u8"
                                                    type="application/x-mpegURL">
                                            </video>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endauth
                @endif
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class=" container ">
                        <!--begin::Row-->
                        <div class="row my-6">
                            <!--begin::Product-->
                            <div class="col-md-4 col-xxl-4 col-12">
                                <div class="card card-custom bgi-no-repeat gutter-b p-5">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-shadowless">
                                        <div class="card-body p-0">
                                            <!--begin::Image-->
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded text-center bg-light">
                                                    <img src="{{ asset('storage/' . $course->photo->filePath()) }}"
                                                        alt="پازل استودیو - {{ $course->name }}" class="w-100 lazyload" />
                                                </div>
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Details-->
                                            <div class="text-left mt-5 mb-0 d-flex flex-column">
                                                <a href="#"
                                                    class="font-size-h2 mx-4 my-2 font-weight-bolder text-dark-75 text-hover-primary mb-1 add-loader">{{ $course->name }}</a>
                                                @auth
                                                    @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                                        <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-success">
                                                            شما دانش آموز این دوره اید.
                                                        </div>
                                                    @else
                                                        <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                            دسترسی به محتوای این دوره صرفا توسط برگزارکننده امکان پذیر است. لطفا با
                                                            برگزارکننده در تماس باشید.
                                                        </div>
                                                    @endif
                                                @endauth
                                                @guest
                                                    <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                        برای استفاده از دوره ابتدا باید وارد سایت شوید.
                                                    </div>
                                                @endguest
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                            <!--end::Product-->
                            <div class="col-lg-8 col-xxl-8 col-12">
                                <div class="card card-custom gutter-b p-5">

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
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#notes"
                                                        aria-controls="profile">
                                                        <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                        <span class="nav-text font-size-h6">جزوات</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#homeworks"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="nav-text font-size-h6">تکالیف</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#answer"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-protected"></i></span>
                                                        <span class="nav-text font-size-h6">پاسخنامه</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content mt-4" id="myTabContent">

                                        <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="home-tab">
                                            <p class="font-size-h6">

                                                {!! $course->description !!}
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @guest
                                                    <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                        <div class="alert-text">براي ديدن جزوات اين دوره بايد ثبت نام کنید.
                                                            <a href="{{ route('auth.firstRegister.form') }}"
                                                                class="btn btn-outline-success my-4 py-4">
                                                                ثبت نام
                                                            </a>
                                                        </div>
                                        
                                                        <div class="alert-close">
                                                        </div>
                                                    </div>
                                                    @endguest
                                                    @if (auth()->user()->hasCourse($course->id))
                                                        @include('partials.webinarHandout')
                                                        @include('partials.webinarHW')
                                                        @include('partials.webinarAnswer')
                                                    @else
                                                        <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                            <div class="alert-text">براي ديدن جزوات اين دوره بايد ثبت نام کنید.</div>
                                                            <div class="alert-close">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-custom gutter-b">
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
                                                            class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}</a>
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
                                                                    alt="{{ $course->institute->first_name . ' ' . $course->institute->last_name }}"
                                                                    width="60px" height="60px">
                                                            @endif
                                                            <a href="{{ route('institute.frontend', $course->institute) }}"
                                                                class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->institute->first_name . ' ' . $course->institute->last_name }}</a>
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
                                <div class="card card-custom gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label font-weight-bolder text-dark">کلاس ها</span>
                                        </h3>
                                        <div class="card-toolbar">

                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <div class="card-body">
                                        <div class="row">
                                            @auth
                                                @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                                    @include('partials.webinarClassrooms')
                                                @else
                                                    @include('partials.webinarClassrooms')

                                                    <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                        براي مشاهده کامل آرشیو مدرس دوره بايد شما را به دوره اضافه كند.
                                                    </div>
                                                @endif
                                            @endauth
                                            @guest
                                                @include('partials.webinarClassrooms')

                                                <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                    براي مشاهده کامل آرشیو مدرس دوره بايد شما را به دوره اضافه كند.
                                                </div>
                                            @endguest
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
            @break
        @endswitch
        @endcannot
    @else
        @switch($course->type)
            @case('free')
                @if (!empty($course->live_class))
                    <div class="d-flex flex-column-fluid">
                        <div class="container-fluid">
                            <div class="row bg-black d-flex flex-md-row flex-column-reverse mt-md-0">
                                @auth
                                    <div class="col-md-3 col-12 px-0">
                                        @include('partials.questionStore')
                                    </div>
                                @endauth
                                @guest
                                    <div class="col-md-3 col-12 px-0">
                                        @include('partials.questionStoreGuest')
                                    </div>
                                @endguest
                                <div class="col-md-9 col-12 px-0">
                                    <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin mx-md-0 mx-auto" style="width:100%"
                                        
                                        poster="{{ asset('storage/image/clear-cover-min.jpg') }}" controls
                                        preload="auto">
                                        <source src="{{ $liveClass->code }}{{ $course->live_class }}.m3u8"
                                            type="application/x-mpegURL">
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class=" container ">
                        <!--begin::Row-->
                        <div class="row my-6">
                            <!--begin::Product-->
                            <div class="col-md-4 col-xxl-4 col-12">
                                <div class="card card-custom bgi-no-repeat gutter-b p-5">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-shadowless">
                                        <div class="card-body p-0">
                                            <!--begin::Image-->
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded text-center bg-light">
                                                    <img src="{{ asset('storage/' . $course->photo->filePath()) }}"
                                                        alt="پازل استودیو - {{ $course->name }}" class="w-100 lazyload" />
                                                </div>
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Details-->
                                            <div class="text-left mt-5 mb-0 d-flex flex-column">
                                                <a href="#"
                                                    class="font-size-h2 mx-4 my-2 font-weight-bolder text-dark-75 text-hover-primary mb-1 add-loader">{{ $course->name }}</a>
                                                <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-success">این دوره رایگان
                                                    است .
                                                </div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                            <!--end::Product-->
                            <div class="col-lg-8 col-xxl-8 col-12">
                                <div class="card card-custom gutter-b p-5">

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
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#notes"
                                                        aria-controls="profile">
                                                        <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                        <span class="nav-text font-size-h6">جزوات</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#homeworks"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="nav-text font-size-h6">تکالیف</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#answer"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-protected"></i></span>
                                                        <span class="nav-text font-size-h6">پاسخنامه</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content mt-4" id="myTabContent">

                                        <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="home-tab">
                                            <p class="font-size-h6">

                                                {!! $course->description !!}
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @include('partials.webinarHandout')
                                                    @include('partials.webinarHW')
                                                    @include('partials.webinarAnswer')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-custom gutter-b">
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
                                                            class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}</a>
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
                                                                class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->institute->first_name . ' ' . $course->institute->last_name }}</a>
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
                                <div class="card card-custom gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label font-weight-bolder text-dark">کلاس ها</span>
                                        </h3>
                                        <div class="card-toolbar">

                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <div class="card-body">
                                        <div class="row">
                                            @include('partials.webinarClassrooms')
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
            @break
            @case('login')
                @if (!empty($course->live_class))
                    <div class="d-flex flex-column-fluid">
                        <div class="container-fluid">
                            <div class="row bg-black d-flex flex-md-row flex-column-reverse mt-md-0">
                                @auth
                                    @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                        <div class="col-md-3 col-12 px-0">
                                            @include('partials.questionStore')
                                        </div>
                                        <div class="col-md-9 col-12 px-0">
                                            <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin mx-md-0 mx-auto" style="width:100%"
                                                
                                                poster="{{ asset('storage/image/clear-cover-min.jpg') }}" controls
                                                preload="auto">
                                                <source src="{{ $liveClass->code }}{{ $course->live_class }}.m3u8"
                                                    type="application/x-mpegURL">
                                            </video>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endif
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class=" container ">
                        <!--begin::Row-->
                        <div class="row my-6">
                            <!--begin::Product-->
                            <div class="col-md-4 col-xxl-4 col-12">
                                <div class="card card-custom bgi-no-repeat gutter-b p-5">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-shadowless">
                                        <div class="card-body p-0">
                                            <!--begin::Image-->
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded text-center bg-light">
                                                    <img src="{{ asset('storage/' . $course->photo->filePath()) }}"
                                                        alt="پازل استودیو - {{ $course->name }}" class="w-100 lazyload" />
                                                </div>
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Details-->
                                            <div class="text-left mt-5 mb-0 d-flex flex-column">
                                                <a href="#"
                                                    class="font-size-h2 mx-4 my-2 font-weight-bolder text-dark-75 text-hover-primary mb-1 add-loader">{{ $course->name }}</a>
                                                @guest
                                                    <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                        اين دوره رايگان است و شما براي استفاده از دوره باید ثبت نام کنید.
                                                        <br>
                                                        <a href="{{ route('auth.firstRegister.form') }}"
                                                            class="w-100 btn btn-success my-4 py-4">
                                                            ثبت نام
                                                        </a>
                                                    </div>
                                                @endguest
                                                @auth
                                                    @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                                        <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-success">
                                                            شما میتوانید از این دوره استفاده کنید.
                                                        </div>
                                                    @else
                                                    <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                        شما هم اکنون وارد سایت شدید برای استفاده از دوره باید ثبت نام کنید.
                                                        <br>
                                                        <a href="{{ route('signLoginCourse', $course->id) }}"
                                                            class="w-100 btn btn-success my-4 py-4">
                                                            ثبت نام
                                                        </a>
                                                    </div>
                                                    @endif
                                                @endauth
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                            <!--end::Product-->
                            <div class="col-lg-8 col-xxl-8 col-12">
                                <div class="card card-custom gutter-b p-5">
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
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#notes"
                                                        aria-controls="profile">
                                                        <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                        <span class="nav-text font-size-h6">جزوات</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#homeworks"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="nav-text font-size-h6">تکالیف</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#answer"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-protected"></i></span>
                                                        <span class="nav-text font-size-h6">پاسخنامه</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content mt-4" id="myTabContent">

                                        <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="home-tab">
                                            <p class="font-size-h6">

                                                {!! $course->description !!}
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @guest
                                                    <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                        <div class="alert-text">براي ديدن جزوات اين دوره بايد ثبت نام کنید.
                                                            <a href="{{ route('auth.firstRegister.form') }}"
                                                                class="btn btn-outline-success my-4 py-4">
                                                                ثبت نام
                                                            </a>
                                                        </div>
                                        
                                                        <div class="alert-close">
                                                        </div>
                                                    </div>
                                                    @endguest
                                                    @if (auth()->user()->hasCourse($course->id))
                                                        @include('partials.webinarHandout')
                                                        @include('partials.webinarHW')
                                                        @include('partials.webinarAnswer')
                                                    @else
                                                        <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                            <div class="alert-text">براي ديدن جزوات اين دوره بايد ثبت نام کنید.</div>
                                                            <div class="alert-close">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-custom gutter-b">
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
                                                            class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}</a>
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
                                                                class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->institute->first_name . ' ' . $course->institute->last_name }}</a>
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
                                <div class="card card-custom gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label font-weight-bolder text-dark">کلاس ها</span>
                                        </h3>
                                        <div class="card-toolbar">

                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <div class="card-body">
                                        <div class="row">
                                            @guest
                                                @include('partials.webinarClassrooms')
                                                <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                    <div class="alert-text">براي مشاهده کامل آرشیو این دوره باید ثبت نام کنید.
                                                        <a href="{{ route('auth.firstRegister.form') }}"
                                                            class="btn btn-outline-success my-4 py-4">
                                                            ثبت نام
                                                        </a>
                                                    </div>

                                                    <div class="alert-close">
                                                    </div>
                                                </div>
                                            @endguest
                                            @auth
                                                @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                                    @include('partials.webinarClassrooms')
                                                @else
                                                    @include('partials.webinarClassrooms')
                                                    <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                        <div class="alert-text">براي مشاهده کامل آرشیو این دوره باید ثبت نام کنید.
                                                        </div>
                                                    </div>

                                                @endif

                                            @endauth
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
            @break
            @case('paid')
                @if (!empty($course->live_class))
                    @auth
                        <div class="d-flex flex-column-fluid">
                            <div class="container-fluid">
                                <div class="row bg-black d-flex flex-md-row flex-column-reverse mt-md-0">
                                    @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                        <div class="col-md-3 col-12 px-0">
                                            @include('partials.questionStore')
                                        </div>
                                        <div class="col-md-9 col-12 px-0">
                                            <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin mx-md-0 mx-auto" style="width:100%"
                                                
                                                poster="{{ asset('storage/image/clear-cover-min.jpg') }}" controls
                                                preload="auto">
                                                <source src="{{ $liveClass->code }}{{ $course->live_class }}.m3u8"
                                                    type="application/x-mpegURL">
                                            </video>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endauth
                @endif
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class=" container ">
                        <!--begin::Row-->
                        <div class="row my-6">
                            <!--begin::Product-->
                            <div class="col-md-4 col-xxl-4 col-12">
                                <div class="card card-custom bgi-no-repeat gutter-b p-5">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-shadowless">
                                        <div class="card-body p-0">
                                            <!--begin::Image-->
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded text-center bg-light">
                                                    <img src="{{ asset('storage/' . $course->photo->filePath()) }}"
                                                        alt="پازل استودیو - {{ $course->name }}" class="w-100 lazyload" />
                                                </div>
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Details-->
                                            <div class="text-left mt-5 mb-0 d-flex flex-column">
                                                <a href="#"
                                                    class="font-size-h2 mx-4 my-2 font-weight-bolder text-dark-75 text-hover-primary mb-1 add-loader">{{ $course->name }}</a>
                                                @auth
                                                    @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                                        <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-success">
                                                            شما دوره را قبلا تهیه کرده اید.
                                                        </div>
                                                    @else
                                                        <div class="price font-size-h6 font-weight-normal mx-4 my-2">
                                                            @if ($course->discount_price != null)
                                                                <span><del>{{ $course->price }} تومان</del></span>
                                                                <span>{{ $course->discount_price }}تومان</span>
                                                            @else
                                                                <span>{{ $course->price }}تومان</span>

                                                            @endif
                                                        </div>
                                                        <a href="{{ route('basket.add', $course->id) }}"
                                                            class="btn btn-success my-4 py-4">
                                                            ثبت نام دوره
                                                        </a>
                                                    @endif
                                                @endauth
                                                @guest
                                                    <div class="price font-size-h6 font-weight-normal mx-4 my-2">
                                                        @if ($course->discount_price != null)
                                                            <span><del>{{ $course->price }} تومان</del></span>
                                                            <span>{{ $course->discount_price }}تومان</span>
                                                        @else
                                                            <span>{{ $course->price }}تومان</span>

                                                        @endif
                                                    </div>
                                                    <a href="{{ route('auth.firstRegister.form') }}" class="btn btn-success my-4 py-4">
                                                        ثبت نام دوره
                                                    </a>
                                                @endguest
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                            <!--end::Product-->
                            <div class="col-lg-8 col-xxl-8 col-12">
                                <div class="card card-custom gutter-b p-5">

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
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#notes"
                                                        aria-controls="profile">
                                                        <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                        <span class="nav-text font-size-h6">جزوات</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#homeworks"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="nav-text font-size-h6">تکالیف</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#answer"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-protected"></i></span>
                                                        <span class="nav-text font-size-h6">پاسخنامه</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content mt-4" id="myTabContent">

                                        <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="home-tab">
                                            <p class="font-size-h6">

                                                {!! $course->description !!}
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @guest
                                                    <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                        <div class="alert-text">براي ديدن جزوات اين دوره بايد ثبت نام کنید.
                                                            <a href="{{ route('auth.firstRegister.form') }}"
                                                                class="btn btn-outline-success my-4 py-4">
                                                                ثبت نام
                                                            </a>
                                                        </div>
                                        
                                                        <div class="alert-close">
                                                        </div>
                                                    </div>
                                                    @endguest
                                                    @if (auth()->user()->hasCourse($course->id))
                                                        @include('partials.webinarHandout')
                                                        @include('partials.webinarHW')
                                                        @include('partials.webinarAnswer')
                                                    @else
                                                        <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                            <div class="alert-text">براي ديدن جزوات اين دوره بايد ثبت نام کنید.</div>
                                                            <div class="alert-close">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-custom gutter-b">
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
                                                            class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}</a>
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
                                                                class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->institute->first_name . ' ' . $course->institute->last_name }}</a>
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
                                <div class="card card-custom gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label font-weight-bolder text-dark">کلاس ها</span>
                                        </h3>
                                        <div class="card-toolbar">

                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <div class="card-body">
                                        <div class="row">
                                            @auth
                                                @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                                    @include('partials.webinarClassrooms')
                                                @else
                                                    @include('partials.webinarClassrooms')

                                                    <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                        براي مشاهده کامل آرشیو بايد دوره را تهيه كنيد .
                                                    </div>
                                                @endif
                                            @endauth
                                            @guest
                                                @include('partials.webinarClassrooms')

                                                <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                    براي مشاهده کامل آرشیو بايد دوره را تهيه كنيد .
                                                </div>
                                            @endguest
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
            @break
            @case('class')
                @if (!empty($course->live_class))
                    @auth
                        <div class="d-flex flex-column-fluid">
                            <div class="container-fluid">
                                <div class="row bg-black d-flex flex-md-row flex-column-reverse mt-md-0">
                                    @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                        <div class="col-md-3 col-12 px-0">
                                            @include('partials.questionStore')
                                        </div>
                                        <div class="col-md-9 col-12 px-0">
                                            <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin mx-md-0 mx-auto" style="width:100%"
                                                
                                                poster="{{ asset('storage/image/clear-cover-min.jpg') }}" controls
                                                preload="auto">
                                                <source src="{{ $liveClass->code }}{{ $course->live_class }}.m3u8"
                                                    type="application/x-mpegURL">
                                            </video>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endauth
                @endif
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class=" container ">
                        <!--begin::Row-->
                        <div class="row my-6">
                            <!--begin::Product-->
                            <div class="col-md-4 col-xxl-4 col-12">
                                <div class="card card-custom bgi-no-repeat gutter-b p-5">
                                    <!--begin::Card-->
                                    <div class="card card-custom card-shadowless">
                                        <div class="card-body p-0">
                                            <!--begin::Image-->
                                            <div class="overlay">
                                                <div class="overlay-wrapper rounded text-center bg-light">
                                                    <img src="{{ asset('storage/' . $course->photo->filePath()) }}"
                                                        alt="پازل استودیو - {{ $course->name }}" class="w-100 lazyload" />
                                                </div>
                                            </div>
                                            <!--end::Image-->

                                            <!--begin::Details-->
                                            <div class="text-left mt-5 mb-0 d-flex flex-column">
                                                <a href="#"
                                                    class="font-size-h2 mx-4 my-2 font-weight-bolder text-dark-75 text-hover-primary mb-1 add-loader">{{ $course->name }}</a>
                                                @auth
                                                    @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                                        <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-success">
                                                            شما دانش آموز این دوره اید.
                                                        </div>
                                                    @else
                                                        <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                            دسترسی به محتوای این دوره صرفا توسط برگزارکننده امکان پذیر است. لطفا با
                                                            برگزارکننده در تماس باشید.
                                                        </div>
                                                    @endif
                                                @endauth
                                                @guest
                                                    <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                        برای استفاده از دوره ابتدا باید وارد سایت شوید.
                                                    </div>
                                                @endguest
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                    </div>
                                    <!--end::Card-->
                                </div>
                            </div>
                            <!--end::Product-->
                            <div class="col-lg-8 col-xxl-8 col-12">
                                <div class="card card-custom gutter-b p-5">

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
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#notes"
                                                        aria-controls="profile">
                                                        <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                        <span class="nav-text font-size-h6">جزوات</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#homeworks"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-writing"></i></span>
                                                        <span class="nav-text font-size-h6">تکالیف</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#answer"
                                                        aria-controls="contact">
                                                        <span class="nav-icon"><i class="flaticon2-protected"></i></span>
                                                        <span class="nav-text font-size-h6">پاسخنامه</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content mt-4" id="myTabContent">

                                        <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="home-tab">
                                            <p class="font-size-h6">

                                                {!! $course->description !!}
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="contact-tab">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @guest
                                                    <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                        <div class="alert-text">براي ديدن جزوات اين دوره بايد ثبت نام کنید.
                                                            <a href="{{ route('auth.firstRegister.form') }}"
                                                                class="btn btn-outline-success my-4 py-4">
                                                                ثبت نام
                                                            </a>
                                                        </div>
                                        
                                                        <div class="alert-close">
                                                        </div>
                                                    </div>
                                                    @endguest
                                                    @if (auth()->user()->hasCourse($course->id))
                                                        @include('partials.webinarHandout')
                                                        @include('partials.webinarHW')
                                                        @include('partials.webinarAnswer')
                                                    @else
                                                        <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                            <div class="alert-text">براي ديدن جزوات اين دوره بايد ثبت نام کنید.</div>
                                                            <div class="alert-close">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-custom gutter-b">
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
                                                            class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}</a>
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
                                                                    alt="{{ $course->institute->first_name . ' ' . $course->institute->last_name }}"
                                                                    width="60px" height="60px">
                                                            @endif
                                                            <a href="{{ route('institute.frontend', $course->institute) }}"
                                                                class="h3 text-dark text-hover-primary my-auto ml-4">{{ $course->institute->first_name . ' ' . $course->institute->last_name }}</a>
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
                                <div class="card card-custom gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label font-weight-bolder text-dark">کلاس ها</span>
                                        </h3>
                                        <div class="card-toolbar">

                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <div class="card-body">
                                        <div class="row">
                                            @auth
                                                @if (auth()
                        ->user()
                        ->hasCourse($course->id))
                                                    @include('partials.webinarClassrooms')
                                                @else
                                                    @include('partials.webinarClassrooms')

                                                    <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                        براي مشاهده کامل آرشیو مدرس دوره بايد شما را به دوره اضافه كند.
                                                    </div>
                                                @endif
                                            @endauth
                                            @guest
                                                @include('partials.webinarClassrooms')

                                                <div class="fon-size-h6 font-weight-normal mx-4 my-2 text-danger">
                                                    براي مشاهده کامل آرشیو مدرس دوره بايد شما را به دوره اضافه كند.
                                                </div>
                                            @endguest
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
            @break
        @endswitch
    @endif
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@section('script')

    @if (isset($liveClass->code))
        <script src="https://code.jquery.com/jquery-latest.min.js"></script>

        <script src="{{ asset('/js/app.js') }}"></script>
        <script>
            (function() {
                var params = {},
                    r = /([^&=]+)=?([^&]*)/g;
    
                function d(s) {
                    return decodeURIComponent(s.replace(/\+/g, ' '));
                }
    
                var match, search = window.location.search;
                while (match = r.exec(search.substring(1))) {
                    params[d(match[1])] = d(match[2]);
    
                    if (d(match[2]) === 'true' || d(match[2]) === 'false') {
                        params[d(match[1])] = d(match[2]) === 'true' ? true : false;
                    }
                }
    
                window.params = params;
            })();
    
        </script>
    
        <script>
            var recordingDIV = document.querySelector('.recordrtc');
            var recordingPlayer = recordingDIV.querySelector('video');
    
            recordingDIV.querySelector('.voiceS').onclick = function() {
                var button = this;
    
                if (button.classList.contains("fa-arrow-alt-circle-up")) {
                    button.disabled = true;
                    button.disableStateWaiting = true;
                    setTimeout(function() {
                        button.disabled = false;
                        button.disableStateWaiting = false;
                    }, 2 * 1000);
    
                    // button.innerHTML = 'Start Recording';
                    button.classList.add("fa-microphone");
                    button.classList.remove("fa-arrow-alt-circle-up");
    
                    function stopStream() {
                        if (button.stream && button.stream.stop) {
                            button.stream.stop();
                            button.stream = null;
                        }
                    }
    
                    if (button.recordRTC) {
                        if (button.recordRTC.length) {
                            button.recordRTC[0].stopRecording(function(url) {
                                if (!button.recordRTC[1]) {
                                    button.recordingEndedCallback(url);
                                    stopStream();
    
                                    saveToDiskOrOpenNewTab(button.recordRTC[0]);
                                    return;
                                }
    
                                button.recordRTC[1].stopRecording(function(url) {
                                    button.recordingEndedCallback(url);
                                    stopStream();
                                });
                            });
                        } else {
                            button.recordRTC.stopRecording(function(url) {
                                button.recordingEndedCallback(url);
                                stopStream();
    
                                saveToDiskOrOpenNewTab(button.recordRTC);
                            });
                        }
                    }
    
                    return;
                }
    
                button.disabled = true;
    
                var commonConfig = {
                    onMediaCaptured: function(stream) {
                        button.stream = stream;
                        if (button.mediaCapturedCallback) {
                            button.mediaCapturedCallback();
                        }
    
                        button.classList.remove("fa-microphone");
                        button.classList.add("fa-arrow-alt-circle-up");
    
                        button.disabled = false;
                    },
                    onMediaStopped: function() {
                        button.classList.remove("fa-microphone");
    
                        if (!button.disableStateWaiting) {
                            button.disabled = false;
                        }
                    },
                    onMediaCapturingFailed: function(error) {
                        if (error.name === 'PermissionDeniedError' && !!navigator.mozGetUserMedia) {
                            InstallTrigger.install({
                                'Foo': {
                                    URL: 'https://addons.mozilla.org/en-US/firefox/addon/enable-screen-capturing/',
                                    toString: function() {
                                        return this.URL;
                                    }
                                }
                            });
                        }
    
                        commonConfig.onMediaStopped();
                    }
                };
    
                captureAudio(commonConfig);
    
                button.mediaCapturedCallback = function() {
                    button.recordRTC = RecordRTC(button.stream, {
                        type: 'audio',
                        bufferSize: typeof params.bufferSize == 'undefined' ? 0 : parseInt(params
                            .bufferSize),
                        sampleRate: typeof params.sampleRate == 'undefined' ? 44100 : parseInt(
                            params.sampleRate),
                        leftChannel: params.leftChannel || false,
                        disableLogs: params.disableLogs || false,
                        recorderType: DetectRTC.browser.name === 'Edge' ? StereoAudioRecorder : null
                    });
    
                    button.recordingEndedCallback = function(url) {
                        var audio = new Audio();
                        audio.src = url;
                        audio.controls = true;
    
                        if (audio.paused) audio.play();
    
                        audio.onended = function() {
                            audio.pause();
                            audio.src = URL.createObjectURL(button.recordRTC.blob);
                        };
                    };
    
                    button.recordRTC.startRecording();
                };
            };
            function captureAudio(config) {
                captureUserMedia({
                    audio: true
                }, function(audioStream) {
                    recordingPlayer.srcObject = audioStream;
    
                    config.onMediaCaptured(audioStream);
    
                    audioStream.onended = function() {
                        config.onMediaStopped();
                    };
                }, function(error) {
                    config.onMediaCapturingFailed(error);
                });
            }
    
            function captureUserMedia(mediaConstraints, successCallback, errorCallback) {
                navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);
            }
    
            function setMediaContainerFormat(arrayOfOptionsSupported) {
                var options = Array.prototype.slice.call(
                    mediaContainerFormat.querySelectorAll('option')
                );
    
                var selectedItem;
                options.forEach(function(option) {
                    option.disabled = true;
    
                    if (arrayOfOptionsSupported.indexOf(option.value) !== -1) {
                        option.disabled = false;
    
                        if (!selectedItem) {
                            option.selected = true;
                            selectedItem = option;
                        }
                    }
                });
            }
    
            recordingMedia.onchange = function() {
                if (this.value === 'record-audio') {
                    setMediaContainerFormat(['WAV', 'Ogg']);
                    return;
                }
                setMediaContainerFormat(['WebM', /*'Mp4',*/ 'Gif']);
            };
    
            if (DetectRTC.browser.name === 'Edge') {
                console.warn(
                    'Neither MediaRecorder API nor webp is supported in Microsoft Edge. You cam merely record audio.'
                );
    
                recordingMedia.innerHTML = '<option value="record-audio">Audio</option>';
                setMediaContainerFormat(['WAV']);
            }
    
            if (DetectRTC.browser.name === 'Firefox') {
                recordingMedia.innerHTML = '<option value="record-audio-plus-video">Audio+Video</option>' +
                    '<option value="record-audio-plus-screen">Audio+Screen</option>' +
                    recordingMedia.innerHTML;
            }

            if (false && DetectRTC.browser.name === 'Chrome') {
                recordingMedia.innerHTML = '<option value="record-audio-plus-video">Audio+Video</option>' +
                    recordingMedia.innerHTML;
                console.info(
                    'This RecordRTC demo merely tries to playback recorded audio/video sync inside the browser. It still generates two separate files (WAV/WebM).'
                );
            }
    
            var MY_DOMAIN = 'webrtc-experiment.com';
    
            function isMyOwnDomain() {
                return document.domain.indexOf(MY_DOMAIN) !== -1;
            }
    
            function saveToDiskOrOpenNewTab(recordRTC) {
    
                if (isMyOwnDomain()) {
                    recordingDIV.querySelector('#upload-to-server').disabled = true;
                    recordingDIV.querySelector('#upload-to-server').style.display = 'none';
                } else {
                    recordingDIV.querySelector('#upload-to-server').disabled = false;
                }
    
                    if (isMyOwnDomain()) {
                        alert('PHP Upload is not available on this domain.');
                        return;
                    }
    
                    if (!recordRTC) return alert('No recording found.');
                    this.disabled = true;
    
                    uploadToServer(recordRTC, function(progress, fileURL) {
                    });
            }
    
            function uploadToServer(recordRTC, callback) {
                var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.blob;
                var fileType = blob.type.split('/')[0] || 'audio';
                var fileName = (Math.random() * 1000).toString().replace('.', '');
    
                if (fileType === 'audio') {
                    fileName += '.' + (!!navigator.mozGetUserMedia ? 'ogg' : 'wav');
                } else {
                    fileName += '.webm';
                }
    
                var formData = new FormData();
                formData.append(fileType + '-filename', fileName);
                formData.append(fileType + '-blob', blob);
    
                callback('Uploading ' + fileType + ' recording to server.');
    
                var upload_url = "{{ route('voice.save',$classid) }}";
    
                var upload_directory = 'uploads/';
    
                makeXMLHttpRequest(upload_url, formData, function(progress) {
                    if (progress !== 'upload-ended') {
                        callback(progress);
                        return;
                    }
    
                    callback('ended', upload_directory + fileName);
    
                });
            }
    
            function makeXMLHttpRequest(url, data, callback) {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        callback('upload-ended');
                    }
                };
    
                request.upload.onloadstart = function() {
                    callback('Upload started...');
                };
    
                request.upload.onprogress = function(event) {
                    callback('Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%");
                };
    
                request.upload.onload = function() {
                    callback('progress-about-to-end');
                };
    
                request.upload.onload = function() {
                    callback('progress-ended');
                };
    
                request.upload.onerror = function(error) {
                    callback('Failed to upload to server');
                    console.error('XMLHttpRequest failed', error);
                };
    
                request.upload.onabort = function(error) {
                    callback('Upload aborted.');
                    console.error('XMLHttpRequest aborted', error);
                };
    
                request.open('POST', url);
                request.send(data);
            }
    
        </script>
        @auth
            <script>
                var userID = {{$userID}};
                var userName = "{{ $username }}";
                var classID = {{$classid}};
                $(function() {

                    //make connection to socket
                    var socket = io("https://ouc.puzzle-stu.com:3000")
                    var room = classID;
                    socket.emit('join', room);
                    socket.emit('set_userid', {
                        userid: userID
                    });
                    socket.emit('set_username', {
                        username: userName
                    });

                    // Attach a submit handler to the form
                    $("#socketForm").submit(function(event) {

                        // Stop form from submitting normally
                        event.preventDefault();

                        // Get some values from elements on the page:
                        var $form = $(this),
                            term = $form.find("input[name='text']").val();

                        //Emit message
                        socket.emit("new_message", {
                            message: term,
                            room: room,
                        });

                        //Clear input value
                        $form.find("input[name='text']").val("");

                    });

                    //Listen for new_message
                    socket.on("new_message", (data) => {
                        console.log(data)
                        if (data.userid == userID) {
                            var li = $('<li></li>');
                        } else {
                            var li = $('<li class="notcurrent"></li>');
                        }
                        li.html(`<div class="name">` + data.username + `</div><div class="message">` + data
                            .message + `</div>`);
                        $("#list").append(li);
                    })


                });

            </script>
        @endauth
        @guest
            <script>
                var userID = {{$userID}};
                var userName = "{{ $username }}";
                var classID = {{$classid}};
                // var userName = $form.find("input[name='name']").val();
                $(function() {

                    //make connection to socket
                    var socket = io("https://ouc.puzzle-stu.com:3000")
                    var room = classID;
                    socket.emit('join', room);
                    socket.emit('set_userid', {
                        userid: userID
                    });
                    socket.emit('set_username', {
                        username: userName
                    });

                    // Attach a submit handler to the form
                    $("#socketForm").submit(function(event) {

                        // Stop form from submitting normally
                        event.preventDefault();

                        // Get some values from elements on the page:
                        var $form = $(this),
                            term = $form.find("input[name='text']").val();

                        //Emit message
                        socket.emit("new_message", {
                            message: term,
                            room: room,
                            username: $form.find("input[name='name']").val()
                        });

                        //Clear input value
                        $form.find("input[name='text']").val("");

                    });

                    //Listen for new_message
                    socket.on("new_message", (data) => {
                        console.log(data)
                        if (data.userid == userID) {
                            var li = $('<li></li>');
                        } else {
                            var li = $('<li class="notcurrent"></li>');
                        }
                        li.html(`<div class="name">` + data.username + `</div><div class="message">` + data
                            .message + `</div>`);
                        $("#list").append(li);
                    })


                });

            </script>
        @endguest

    @endif

    <script src="{{ asset('js/video.min.js') }}"></script>
    <script src="{{ asset('js/nuevo.min.js') }}"></script>

    <script>
        videojs.options.hls.overrideNative = true;
        videojs.options.html5.nativeAudioTracks = false;
        videojs.options.html5.nativeTextTracks = false;
        videojs.options.liveui = true;
        var player = videojs('myplayer');
        player.nuevo({
            logocontrolbar: "{{ asset('storage/image/rsz_logo_new.png') }}",
            logourl: "https://puzzle-stu.com",
            shareMenu: false
        });
        player.on('resolutionchange', function(event, data) {
            var resolution = data.res;
            var label = data.label;
        });

    </script>
@endsection
