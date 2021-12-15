@extends('layouts.index')

@section('title', 'پازل استودیو | صفحه نخست')

@section('css')
<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
@endsection

@section('content')
<!--begin::Hero-->
<div class="d-flex flex-row-fluid bg-white gutter-b">
    <div class="container">
        <div class="row my-25 align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('media/Online_presentation.svg') }}" alt="آموزش آنلاین"
                    class="w-100 px-10 d-md-block d-none">
            </div>
            <div class="col-md-6 text-left my-10">
                <h2 class="display-4"><span class="font-weight-boldest">پازل استودیو،</span><br>تجربه برگزاری یک لایو بی
                    دردسر</h2>
                <h4 class="display-5 mt-10 font-weight-light pr-md-40 pr-0 text-justify">گروه پازل با بهره‌گیری از
                    جدیدترین
                    تکنولوژی های روز، بستری فراهم دیده است تا شما بتوانید به راحتی پخش زنده همایش‌ها، کلاس‌ها و ایونت
                    های خود را بدون استرس از مشکلات پیش‌بینی نشده انجام دهید.</h4>
                <a href="tel:09129432494" class="btn btn-primary btn-pill btn-lg mt-10">
                    <span class="svg-icon">
                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-02-01-052524/theme/html/demo1/dist/../src/media/svg/icons/Communication/Active-call.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13.0799676,14.7839934 L15.2839934,12.5799676 C15.8927139,11.9712471 16.0436229,11.0413042 15.6586342,10.2713269 L15.5337539,10.0215663 C15.1487653,9.25158901 15.2996742,8.3216461 15.9083948,7.71292558 L18.6411989,4.98012149 C18.836461,4.78485934 19.1530435,4.78485934 19.3483056,4.98012149 C19.3863063,5.01812215 19.4179321,5.06200062 19.4419658,5.11006808 L20.5459415,7.31801948 C21.3904962,9.0071287 21.0594452,11.0471565 19.7240871,12.3825146 L13.7252616,18.3813401 C12.2717221,19.8348796 10.1217008,20.3424308 8.17157288,19.6923882 L5.75709327,18.8875616 C5.49512161,18.8002377 5.35354162,18.5170777 5.4408655,18.2551061 C5.46541191,18.1814669 5.50676633,18.114554 5.56165376,18.0596666 L8.21292558,15.4083948 C8.8216461,14.7996742 9.75158901,14.6487653 10.5215663,15.0337539 L10.7713269,15.1586342 C11.5413042,15.5436229 12.4712471,15.3927139 13.0799676,14.7839934 Z"
                                    fill="#000000" />
                                <path
                                    d="M14.1480759,6.00715131 L13.9566988,7.99797396 C12.4781389,7.8558405 11.0097207,8.36895892 9.93933983,9.43933983 C8.8724631,10.5062166 8.35911588,11.9685602 8.49664195,13.4426352 L6.50528978,13.6284215 C6.31304559,11.5678496 7.03283934,9.51741319 8.52512627,8.02512627 C10.0223249,6.52792766 12.0812426,5.80846733 14.1480759,6.00715131 Z M14.4980938,2.02230302 L14.313049,4.01372424 C11.6618299,3.76737046 9.03000738,4.69181803 7.1109127,6.6109127 C5.19447112,8.52735429 4.26985715,11.1545872 4.51274152,13.802405 L2.52110319,13.985098 C2.22450978,10.7517681 3.35562581,7.53777247 5.69669914,5.19669914 C8.04101739,2.85238089 11.2606138,1.72147333 14.4980938,2.02230302 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>درخواست برگزاری رویداد</a>
            </div>
        </div>
    </div>
    {{-- <img src="{{ asset('media/eyd-min.jpeg') }}" class="w-100" alt="بنر نوروز پازل ۱۴۰۰"> --}}
</div>
<!--end::Hero-->
<!--begin::Entry-->
<div>

    <!--begin::Container-->
    <div class="container my-10">
        <div class="row my-25">
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
    <!--end::Container-->

    <!--begin::Container-->
    <div class=" container ">

        <!--begin::Row-->
        <div class="row my-15" id="specials">
            <div class="col-md-3">
                <div class="card rounded-xl card-custom">
                    <div class="card-body text-center py-10">
                        <img src="{{ asset('media/studio.svg') }}" class="w-75 max-h-100px" alt="">
                        <h3 class="font-weight-boldest mt-7 text-center">اجاره استودیو و پخش زنده</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card rounded-xl card-custom">
                    <div class="card-body text-center py-10">
                        <img src="{{ asset('media/ticketing.svg') }}" class="w-75 max-h-100px" alt="">
                        <h3 class="font-weight-boldest mt-7 text-center">بلیت‌فروشی رویداد</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card rounded-xl card-custom">
                    <div class="card-body text-center py-10">
                        <img src="{{ asset('media/teaser.svg') }}" class="w-75 max-h-100px" alt="">
                        <h3 class="font-weight-boldest mt-7 text-center">طراحی تیزر تبلیغاتی</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card rounded-xl card-custom">
                    <div class="card-body text-center py-10">
                        <img src="{{ asset('media/develop.svg') }}" class="w-75 max-h-100px" alt="">
                        <h3 class="font-weight-boldest mt-7 text-center">طراحی سایت</h3>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->
    </div>
</div>

<div class="d-flex flex-column-fluid">

    <div class=" container mt-10">

        <!--begin::Row-->
        <div class="row my-15" id="conferences">
            <div class="col-md-12">
                <div class="card card-custom bgi-no-repeat gutter-b rounded-xl card-stretch">
                    <!--begin::Heading-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">همایش‌ها</h2>
                        </div>
                        <div class="card-toolbar">
                            <a href="{{ route('tag.frontend', 2) }}"
                                class="btn btn-light-warning btn-sm btn-pill font-weight-bolder">نمایش
                                همه</a>
                        </div>                
                    </div>
                    <!--end::Heading-->
                    <div class="card-body">
                        <!--begin::Products-->
                        @if ($conferences->isEmpty())
                        <div class="alert alert-custom alert-light-primary rounded-xl fade show mb-5" role="alert">
                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                            <div class="alert-text">هیچ دوره ای ثبت نشده است!!!</div>
                            <div class="alert-close">
                            </div>
                        </div>
                        @else
                        <div class="row owl-carousel product-carousel">
                            <!--begin::Product-->
                            @foreach ($conferences as $course)
                            <div class="col-12">
                                <!--begin::Card-->
                                <div class="card card-custom border-lg my-2">
                                    <div class="card-body p-0">
                                        <a href="{{ route('webinar.frontend', $course->id) }}" class="add-loader">
                                            @isset($course->photo)
                                            <!--begin::Image-->
                                            <div class="overlay">
                                                <div class="overlay-wrapper text-center bg-light">
                                                    <img src="{{ asset('storage/' . $course->photo->filePath()) }}"
                                                        alt="" class="w-100 lazyload rounded-top" />
                                                </div>
                                            </div>
                                            <!--end::Image-->
                                            @endisset
                                        </a>

                                        <!--begin::Details-->
                                        <div
                                            class="text-left mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                            <a href="{{ route('webinar.frontend', $course->id) }}"
                                                class="font-size-h4 font-weight-boldest text-dark text-hover-primary mx-4 pzst-title-height">{{ $course->name }}</a>
                                            <div class="mx-4">
                                                <a href="{{ route('teacher.frontend', $course->teacher) }}"
                                                    class="font-size-xs text-dark-50 text-hover-primary">{{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}</a>

                                            </div>
                                        </div>
                                        <!--end::Details-->
                                        <hr class="m-0">
                                        <div
                                            class="mx-4 d-flex flex-md-row flex-column justify-content-between align-items-center">

                                            @if ($course->type == 'free' || $course->type == 'login')
                                            <span
                                                class="align-self-center text-primary font-weight-normal">رايگان</span>
                                            @else
                                            <span class="align-self-center text-primary font-weight-normal">غیر
                                                رایگان</span>
                                            @endif
                                            <a href="{{ route('webinar.frontend', $course->id) }}"
                                                class="btn btn-outline-primary btn-sm my-2 my-md-4 rounded-pill">
                                                ورود به وبینار
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>
                            @endforeach
                            <!--end::Product-->
                        </div>
                        <!--end::Products-->
                        @endif
                        <!--end::Products-->
                    </div>
                </div>
            </div>
        </div>
        <!--end::Row-->


        <div class="row">
            <div class="col-xl-3 col-6">
                <!--begin::Stats Teachers -->
                <div class="card card-custom border-3 border border-success rounded-xl gutter-b">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-3x svg-icon-success">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-02-01-052524/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <div class="text-success font-weight-boldest display-4 mt-3 faNum"
                            style="direction: ltr;">
                            +300</div>
                        <a href="#" class="text-success font-weight-bold font-size-lg">مدرس</a>
                    </div>
                </div>
                <!--end::Stats Teachers-->
            </div>
            <div class="col-xl-3 col-6">
                <!--begin::Stats Widget 26-->
                <div class="card card-custom border-3 border border-danger gutter-b rounded-xl">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-3x svg-icon-danger">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-02-01-052524/theme/html/demo1/dist/../src/media/svg/icons/Media/Repeat.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M12,8 L8,8 C5.790861,8 4,9.790861 4,12 L4,13 C4,14.6568542 5.34314575,16 7,16 L7,18 C4.23857625,18 2,15.7614237 2,13 L2,12 C2,8.6862915 4.6862915,6 8,6 L12,6 L12,4.72799742 C12,4.62015048 12.0348702,4.51519416 12.0994077,4.42878885 C12.264656,4.2075478 12.5779675,4.16215674 12.7992086,4.32740507 L15.656242,6.46136716 C15.6951359,6.49041758 15.7295917,6.52497737 15.7585249,6.56395854 C15.9231063,6.78569617 15.876772,7.09886961 15.6550344,7.263451 L12.798001,9.3840407 C12.7118152,9.44801079 12.607332,9.48254921 12.5,9.48254921 C12.2238576,9.48254921 12,9.25869158 12,8.98254921 L12,8 Z"
                                        fill="#000000" />
                                    <path
                                        d="M12.0583175,16 L16,16 C18.209139,16 20,14.209139 20,12 L20,11 C20,9.34314575 18.6568542,8 17,8 L17,6 C19.7614237,6 22,8.23857625 22,11 L22,12 C22,15.3137085 19.3137085,18 16,18 L12.0583175,18 L12.0583175,18.9825492 C12.0583175,19.2586916 11.8344599,19.4825492 11.5583175,19.4825492 C11.4509855,19.4825492 11.3465023,19.4480108 11.2603165,19.3840407 L8.40328311,17.263451 C8.18154548,17.0988696 8.13521119,16.7856962 8.29979258,16.5639585 C8.32872576,16.5249774 8.36318164,16.4904176 8.40207551,16.4613672 L11.2591089,14.3274051 C11.48035,14.1621567 11.7936615,14.2075478 11.9589099,14.4287888 C12.0234473,14.5151942 12.0583175,14.6201505 12.0583175,14.7279974 L12.0583175,16 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <div class="text-danger font-weight-boldest display-4 mt-3 faNum"
                            style="direction: ltr;">+500
                        </div>
                        <a href="#" class="text-danger font-weight-bold font-size-lg">کلاس آفلاین</a>
                    </div>
                </div>
                <!--end::Stats Widget 26-->
            </div>
            <div class="col-xl-3 col-6">
                <!--begin::Stats Widget 27-->
                <div class="card card-custom border-3 border border-info gutter-b rounded-xl">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-3x svg-icon-info">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-02-01-052524/theme/html/demo1/dist/../src/media/svg/icons/Media/Youtube.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M4.22266882,4 L19.8367728,4.00001353 C21.3873185,4.00001353 22.6823897,5.1816009 22.8241881,6.72564925 C22.9414021,8.00199653 23.0000091,9.40113909 23.0000091,10.9230769 C23.0000091,12.7049599 22.9196724,14.4870542 22.758999,16.26936 L22.7589943,16.2693595 C22.6196053,17.8155637 21.3235899,19 19.7711155,19 L4.22267091,19.0000022 C2.6743525,19.0000022 1.38037032,17.8217109 1.23577882,16.2801587 C1.07859294,14.6043323 1,13.0109461 1,11.5 C1,9.98905359 1.07859298,8.39566699 1.23577893,6.7198402 L1.23578022,6.71984032 C1.38037157,5.17828994 2.67435224,4 4.22266882,4 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M11.1821576,14.8052934 L15.5856084,11.7952868 C15.8135802,11.6394552 15.8720614,11.3283211 15.7162299,11.1003494 C15.6814583,11.0494808 15.6375838,11.0054775 15.5868174,10.970557 L11.1833666,7.94156929 C10.9558527,7.78507001 10.6445485,7.84263875 10.4880492,8.07015268 C10.4307018,8.15352258 10.3999996,8.25233045 10.3999996,8.35351969 L10.3999996,14.392514 C10.3999996,14.6686564 10.6238572,14.892514 10.8999996,14.892514 C11.000689,14.892514 11.0990326,14.8621141 11.1821576,14.8052934 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <div class="text-info font-weight-boldest display-4 mt-3 faNum" style="direction: ltr;">
                            +2,000
                        </div>
                        <a href="#" class="text-info font-weight-bold font-size-lg">وبینار آنلاین</a>
                    </div>
                </div>
                <!--end::Stats Widget 27-->
            </div>
            <div class="col-xl-3 col-6">
                <!--begin::Stats Widget 28-->
                <div class="card card-custom border-3 border border-warning rounded-xl gutter-b">
                    <div class="card-body">
                        <span class="svg-icon svg-icon-3x svg-icon-warning">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-02-01-052524/theme/html/demo1/dist/../src/media/svg/icons/Home/Clock.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <div class="text-warning font-weight-boldest display-4 mt-3 faNum"
                            style="direction: ltr;">
                            +1,000,000
                        </div>
                        <a href="#" class="text-warning font-weight-bold font-size-lg">دقیقه وبینار آنلاین</a>
                    </div>
                </div>
                <!--end::Stat: Widget 28-->
            </div>
        </div>
        <!--begin::Row-->
        <div class="row customers mt-15">
            <div class="col-xl-12">
                <!--begin::Base Table Widget 3-->
                <div class="card card-custom gutter-b rounded-xl bg-primary">
                    <div class="card-header px-4">
                        <div class="card-title">
                            <div class="card-label text-white">
                                <div class="font-weight-boldest font-size-h3">مشتریان پازل</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row owl-carousel mx-0" id="brand-carousel">
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px d-flex justify-content-center">
                                <img src="{{ asset('media/miladtower-min.png')}}" alt="" class="w-auto mw-100 mh-100">
                            </div>
                            <div class="card-footer bg-light px-0 py-2 text-center rounded-xl">
                                مرکز نمایشگاه برج میلاد تهران
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px d-flex justify-content-center">
                                <img src="{{ asset('media/faniherefi-logo-index.jpg')}}" alt=""
                                    class="w-auto mw-100 mh-100">
                            </div>
                            <div class="card-footer bg-light px-0 py-2 text-center rounded-xl">
                                سازمان فنی و حرفه‌ای کشور
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px d-flex justify-content-center">
                                <img src="{{ asset('media/hejrat.png')}}" alt="" class="w-auto mw-100 mh-100">
                            </div>
                            <div class="card-footer bg-light px-0 py-2 text-center rounded-xl">
                                شرکت دارویی پخش هجرت
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px d-flex justify-content-center">
                                <img src="{{ asset('media/bim.png')}}" alt="" class="w-auto mw-100 mh-100">
                            </div>
                            <div class="card-footer bg-light px-0 py-2 text-center rounded-xl">
                                بانک صنعت و معدن
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px d-flex justify-content-center">
                                <img src="{{ asset('media/sibche.png')}}" alt="" class="w-auto mw-100 mh-100">
                            </div>
                            <div class="card-footer bg-light px-0 py-2 text-center rounded-xl">
                                سیبچه
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px d-flex justify-content-center">
                                <img src="{{ asset('media/alavi-logo-index.png')}}" alt="" class="w-auto mw-100 mh-100">
                            </div>
                            <div class="card-footer bg-light px-0 py-2 text-center rounded-xl">
                                موسسه علوی
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px d-flex justify-content-center">
                                <img src="{{ asset('media/farzanegan-logo-index.png')}}" alt=""
                                    class="w-auto mw-100 mh-100">
                            </div>
                            <div class="card-footer bg-light px-0 py-2 text-center rounded-xl">
                                مجموعه مدارس سمپاد
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px d-flex justify-content-center">
                                <img src="{{ asset('media/golvazheh-logo-index.png')}}" alt=""
                                    class="w-auto mw-100 mh-100">
                            </div>
                            <div class="card-footer bg-light px-0 py-2 text-center rounded-xl">
                                نشر گل واژه
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px d-flex justify-content-center">
                                <img src="{{ asset('media/caoiri.jpg')}}" alt="" class="w-auto mw-100 mh-100">
                            </div>
                            <div class="card-footer bg-light px-0 py-2 text-center rounded-xl">
                                سازمان هواپیمایی کشوری
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px justify-content-center">
                                <div class="display-1 font-weight-boldest w-100">+</div>
                                <p class="w-100">جای برند شما در اینجا خالیست...</p>
                            </div>
                            <div class="card-footer border-0 rounded-xl text-white bg-white px-0 py-2 text-center">
                                .
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px d-flex justify-content-center">
                                <img src="{{ asset('media/MatLogo-e1586990114400.png')}}" alt=""
                                    class="w-auto mw-100 mh-100">
                            </div>
                            <div class="card-footer bg-light px-0 py-2 text-center rounded-xl">
                                مجتمع علامه طباطبایی
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px d-flex justify-content-center">
                                <img src="{{ asset('media/tedxsut.png')}}" alt="تدکس شریف" class="w-100"
                                    style="height: 48px; margin-top: 24px;">
                            </div>
                            <div class="card-footer bg-light px-0 py-2 text-center rounded-xl">
                                رویداد تدکس دانشگاه صنعتی شریف
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-10">
                        <div class="card shadow-sm text-center rounded-xl card-custom">
                            <div class="card-body h-150px d-flex justify-content-center">
                                <img src="{{ asset('media/medu.png')}}" alt="تدکس شریف" class="w-auto mw-100 mh-100">
                            </div>
                            <div class="card-footer bg-light px-0 py-2 text-center rounded-xl">
                                وزارت آموزش و پرورش
                            </div>
                        </div>
                    </div>
                </div>

                <!--end::Base Table Widget 3-->
            </div>
        </div>
        <!--end::Row-->
        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection

@section('footer')
@include('partials.footer')
@endsection

@section('js')
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script>
    $(document).ready(function() {
            $(".product-carousel").owlCarousel({
                rtl: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            });
            var owl = $('#brand-carousel');
            $("#brand-carousel").owlCarousel({
                rtl: true,
                loop: true,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                onInitialize : function(element){
                    owl.children().sort(function(){
                        return Math.round(Math.random()) - 0.5;
                    }).each(function(){
                        $(this).appendTo(owl);
                    });
                },
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 5
                    }
                }
            });
        });

</script>
@endsection