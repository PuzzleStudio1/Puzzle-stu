@extends('layouts.index')

@section('title', 'پازل استودیو | داشبورد')

@section('content')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid pt-8">
    <!--begin::Container-->
    <div class=" container ">
        <!--begin::Education-->
        <div class="d-flex flex-row row">
            <!--begin::Aside-->
            <div class="col-md-3 col-12 mt-15 mt-lg-0">
                @include('dashboard.dashboardSidebar')
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="col-md-9 col-12 mt-md-15 mt-lg-0">
                @include('partials.alerts')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-custom gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0">
                                <h3 class="card-title font-weight-bolder text-dark">اطلاعیه‌ها</h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-2">
                                @forelse ($courses as $course)
                                @foreach ($course->notifs()->get() as $notif)
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="alert alert-custom alert-notice alert-light-danger fade show w-100 mb-0"
                                        role="alert">
                                        <div class="alert-icon"><i class="flaticon2-bell"></i></div>
                                        <div class="alert-text">
                                            <h5 class="">{{$notif->title}}
                                                ({{verta($notif->notif_date)->format('j M')}})</h5>
                                            <p>{!! nl2br(e($notif->text)) !!}</p>
                                        </div>
                                        <div class="alert-close">
                                        </div>
                                    </div>
                                </div>
                                <!--end:Item-->
                                @endforeach
                                @empty
                                <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">هیچ اطلاعیه‌ای برای نمایش وجود ندارد !!!</div>
                                    <div class="alert-close">
                                    </div>
                                </div>
                                @endforelse
                            </div>
                            <!--end::Body-->
                        </div>

                        <div class="card card-custom gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">کلاس های آینده شما</span>
                                </h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-2 pb-0 mt-n3">
                                <div class="tab-content mt-5" id="myTabContent">


                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="kt_tab_pane_2" role="tabpanel"
                                        aria-labelledby="kt_tab_pane_2">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vertical-center">
                                                <!--begin::Thead-->
                                                <thead>
                                                    <tr>
                                                        {{-- <th class="p-0 w-50px"></th>
                                                            --}}
                                                        <th class="p-0 min-w-130px min-w-lg-100px w-100">
                                                        </th>
                                                        <th class="p-0 min-w-105px"></th>
                                                    </tr>
                                                </thead>
                                                <!--end::Thead-->

                                                <!--begin::Tbody-->
                                                <tbody>
                                                    @foreach ($upcomingClasses as $classroom)
                                                    <tr>
                                                        <td class="pl-0">
                                                            <a href="#"
                                                                class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $classroom->name }}</a>
                                                            <span
                                                                class="text-dark-25 font-weight-bold d-block">{{ $classroom->course->name }}</span>
                                                        </td>
                                                        <td class="text-left">
                                                            <span
                                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                                {{ $classroom->classroom_date }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <!--end::Tbody-->
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body pt-8">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">شماره سفارش</th>
                                                <th class="text-center">قیمت</th>
                                                <th class="text-center">کد پیگیری</th>
                                                <th class="text-center">وضعیت</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user->payments as $payment)
                                            <tr>
                                                <td class="text-center">{{ $payment->order_id }}</td>
                                                <td class="text-center">{{ $payment->price }}</td>
                                                <td class="text-center">{{ $payment->ref_num}}</td>
                                                <td class="text-center">
                                                    @if ($payment->status == 1)
                                                    <span
                                                        class="label label-success label-pill label-inline mr-2">پرداخت
                                                        شده</span>
                                                    @else
                                                    <span class="label label-danger label-pill label-inline mr-2">پرداخت
                                                        نشده</span>
                                                    @endif</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-custom gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">کلاس های در حال برگزاری</span>
                                </h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-2 pb-0 mt-n3">
                                <div class="tab-content mt-5" id="myTabContent">


                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="kt_tab_pane_2" role="tabpanel"
                                        aria-labelledby="kt_tab_pane_2">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vertical-center">
                                                <!--begin::Thead-->
                                                <thead>
                                                    <tr>
                                                        <th class="p-0 min-w-130px min-w-lg-100px w-100">
                                                        </th>
                                                        <th class="p-0 min-w-105px"></th>
                                                        <th class="p-0 min-w-50px"></th>
                                                    </tr>
                                                </thead>
                                                <!--end::Thead-->

                                                <!--begin::Tbody-->
                                                <tbody>
                                                    @foreach ($liveClasses as $classroom)
                                                    <tr>
                                                        <td class="pl-0">
                                                            <a href="{{ route('webinar.frontend', $classroom->course) }}"
                                                                class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $classroom->name }}</a>
                                                            <span
                                                                class="text-muted font-weight-bold d-block">{{ $classroom->course->name }}</span>
                                                        </td>
                                                        <td class="text-left">
                                                            <span
                                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                                {{ $classroom->classroom_date }}
                                                            </span>
                                                        </td>
                                                        <td class="text-right pr-0">
                                                            <a href="{{ route('webinar.frontend', $classroom->course) }}"
                                                                class="btn btn-icon btn-light btn-sm">
                                                                <span class="svg-icon svg-icon-md svg-icon-success">
                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        width="24px" height="24px" viewBox="0 0 24 24"
                                                                        version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                                            <rect fill="#000000" opacity="0.3"
                                                                                transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) "
                                                                                x="11" y="5" width="2" height="14"
                                                                                rx="1" />
                                                                            <path
                                                                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) " />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon--></span> </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <!--end::Tbody-->
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <div class="card card-custom gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">دوره های
                                        من</span>
                                    {{-- <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ $courses->count() }}
                                    دوره</span> --}}
                                </h3>
                                <div class="card-toolbar">
                                    <a href="{{route('user.dashboardCourses',auth()->user())}}"
                                        class="btn btn-sm btn-outline-warning font-weight-bold">
                                        نمایش همه
                                    </a>
                                </div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-8">
                                @forelse ($courses as $course)

                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-10">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40 symbol-light-primary mr-5">

                                        <span class="symbol-label">
                                            <img src="{{ asset('storage/' . $course->photo->filePath()) }}" alt=""
                                                width="60px" height="60px">
                                        </span>
                                    </div>
                                    <!--end::Symbol-->

                                    <!--begin::Text-->
                                    <div class="d-flex flex-column font-weight-bold">
                                        <a href="{{ route('webinar.frontend', $course->id) }}"
                                            class="text-dark text-hover-primary mb-1 font-size-lg">{{ $course->name }}</a>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Item-->
                                @empty
                                <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">شما دانش آموز هیچ دوره ای نیستید !!!</div>
                                    <div class="alert-close">
                                    </div>
                                </div>
                                @endforelse
                                {{-- {{ $courses->links() }} --}}
                            </div>
                            <!--end::Body-->
                        </div>
                        <div class="card card-custom gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0">
                                <h3 class="card-title font-weight-bolder text-dark">فایل های من</h3>
                                <div class="card-toolbar">
                                    <a href="{{route('user.dashboardCourses',auth()->user())}}"
                                        class="btn btn-sm btn-outline-warning font-weight-bold">
                                        نمایش همه
                                    </a>
                                </div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-2">
                                @forelse ($courses as $course)
                                @foreach ($course->booklets()->get() as $booklet)
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-10">
                                    <!--begin::Bullet-->
                                    <!--end::Bullet-->
                                    @switch($booklet->type)
                                    @case('Homework')
                                    <span class="bullet bullet-bar bg-success align-self-stretch"></span>
                                    <label
                                        class="checkbox checkbox-lg checkbox-light-success checkbox-inline flex-shrink-0 m-0 mx-4">
                                        <input type="checkbox" name="select" value="1">
                                        <i class="flaticon2-writing text-success"></i>
                                    </label>
                                    @break
                                    @case('Answer')
                                    <span class="bullet bullet-bar bg-primary align-self-stretch"></span>
                                    <label
                                        class="checkbox checkbox-lg checkbox-light-primary checkbox-inline flex-shrink-0 m-0 mx-4">
                                        <input type="checkbox" name="select" value="1">
                                        <i class="flaticon2-protected text-primary"></i>
                                    </label>
                                    @break
                                    @case('Handout')
                                    <span class="bullet bullet-bar bg-warning align-self-stretch"></span>
                                    <label
                                        class="checkbox checkbox-lg checkbox-light-warning checkbox-inline flex-shrink-0 m-0 mx-4">
                                        <input type="checkbox" name="select" value="1">
                                        <i class="flaticon2-layers-1 text-warning"></i>
                                    </label>
                                    @break

                                    @endswitch
                                    <!--begin::Checkbox-->

                                    <!--end::Checkbox-->

                                    <!--begin::Text-->
                                    <div class="d-flex flex-row justify-content-between flex-grow-1">
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('file.show', $booklet->file->id) }}"
                                                class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">
                                                {{ $booklet->name }}
                                            </a>
                                            <span class="text-muted font-weight-bold">
                                                {{ $course->name }}
                                            </span>
                                        </div>
                                        <a href="{{ route('file.show', $booklet->file->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class="flaticon-download"></i> دانلود
                                        </a>
                                    </div>
                                    <!--end::Text-->

                                </div>
                                <!--end:Item-->
                                @endforeach
                                @empty
                                <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">هیچ فایلی برای نمایش وجود ندارد !!!</div>
                                    <div class="alert-close">
                                    </div>
                                </div>
                                @endforelse
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Education-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection

@section('footer')
@include('partials.footer')
@endsection