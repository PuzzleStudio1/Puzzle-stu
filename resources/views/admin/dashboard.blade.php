@extends('layouts.admin')

@section('title', 'پازل استودیو | داشبورد ادمین')

@section('css')

@endsection

@section('content')
<!--begin::Content-->
<div class="flex-row-fluid">
    <div class="card card-custom gutter-b shadow-sm rounded-xl">
        <!--begin::Header-->
        <div class="card-header py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">داشبورد مدیریت</span>
            </h3>
        </div>
        <!--end::Header-->
        <div class="card-body">
            @include('partials.alerts')
            <div class="row">
                <div class="col-lg-3">
                    <!--begin::Stats Widget 30-->
                    <div class="card card-custom bg-info card-stretch rounded-xl gutter-b">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block faNum">{{number_format($users)}}</span>
                            <span class="font-weight-bold text-white font-size-sm">تعداد کاربران سایت</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 30-->
                </div>
                <div class="col-lg-3">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-danger card-stretch gutter-b rounded-xl">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block faNum">{{$courses}}</span>
                            <span class="font-weight-bold text-white font-size-sm">تعداد دوره‌های سایت</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>
                <div class="col-lg-3">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-dark card-stretch gutter-b rounded-xl">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Communication/Group.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block faNum">{{number_format($absences)}}</span>
                            <span class="font-weight-bold text-white font-size-sm">تعداد رکورد حضورغیاب‌ها</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>
                <div class="col-lg-3">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-primary card-stretch gutter-b rounded-xl">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-10-081610/theme/html/demo7/dist/../src/media/svg/icons/Devices/iPhone-X.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z" fill="#000000" opacity="0.3" />
                                        <path d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z M8,1 L16,1 C17.5187831,1 18.75,2.23121694 18.75,3.75 L18.75,20.25 C18.75,21.7687831 17.5187831,23 16,23 L8,23 C6.48121694,23 5.25,21.7687831 5.25,20.25 L5.25,3.75 C5.25,2.23121694 6.48121694,1 8,1 Z M9.5,1.75 L14.5,1.75 C14.7761424,1.75 15,1.97385763 15,2.25 L15,3.25 C15,3.52614237 14.7761424,3.75 14.5,3.75 L9.5,3.75 C9.22385763,3.75 9,3.52614237 9,3.25 L9,2.25 C9,1.97385763 9.22385763,1.75 9.5,1.75 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block faNum">{{number_format($twofactor)}}</span>
                            <span class="font-weight-bold text-white font-size-sm">تعداد درخواست‌های ورود</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>
                <div class="col-md-4">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-primary card-stretch gutter-b rounded-xl">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-10-081610/theme/html/demo7/dist/../src/media/svg/icons/Devices/CPU2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="3" y="3" width="18" height="18" rx="1" />
                                        <path d="M11,11 L11,13 L13,13 L13,11 L11,11 Z M10,9 L14,9 C14.5522847,9 15,9.44771525 15,10 L15,14 C15,14.5522847 14.5522847,15 14,15 L10,15 C9.44771525,15 9,14.5522847 9,14 L9,10 C9,9.44771525 9.44771525,9 10,9 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <rect fill="#000000" opacity="0.3" x="5" y="5" width="2" height="2" rx="0.5" />
                                        <rect fill="#000000" opacity="0.3" x="5" y="9" width="2" height="2" rx="0.5" />
                                        <rect fill="#000000" opacity="0.3" x="5" y="13" width="2" height="2" rx="0.5" />
                                        <rect fill="#000000" opacity="0.3" x="9" y="5" width="2" height="2" rx="0.5" />
                                        <rect fill="#000000" opacity="0.3" x="13" y="5" width="2" height="2" rx="0.5" />
                                        <rect fill="#000000" opacity="0.3" x="17" y="5" width="2" height="2" rx="0.5" />
                                        <rect fill="#000000" opacity="0.3" x="17" y="9" width="2" height="2" rx="0.5" />
                                        <rect fill="#000000" opacity="0.3" x="17" y="13" width="2" height="2" rx="0.5" />
                                        <rect fill="#000000" opacity="0.3" x="5" y="17" width="2" height="2" rx="0.5" />
                                        <rect fill="#000000" opacity="0.3" x="9" y="17" width="2" height="2" rx="0.5" />
                                        <rect fill="#000000" opacity="0.3" x="13" y="17" width="2" height="2" rx="0.5" />
                                        <rect fill="#000000" opacity="0.3" x="17" y="17" width="2" height="2" rx="0.5" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block faNum">{{$memory}}%</span>
                            <span class="font-weight-bold text-white font-size-sm">Memory USAGE</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>
                <div class="col-md-4">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-warning card-stretch gutter-b rounded-xl">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-10-081610/theme/html/demo7/dist/../src/media/svg/icons/Devices/CPU1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="4" y="4" width="16" height="16" rx="2" />
                                        <rect fill="#000000" opacity="0.3" x="9" y="9" width="6" height="6" />
                                        <path d="M20,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,8 C22,8.55228475 21.5522847,9 21,9 L20,9 L20,7 Z" fill="#000000" />
                                        <path d="M20,11 L21,11 C21.5522847,11 22,11.4477153 22,12 L22,12 C22,12.5522847 21.5522847,13 21,13 L20,13 L20,11 Z" fill="#000000" />
                                        <path d="M20,15 L21,15 C21.5522847,15 22,15.4477153 22,16 L22,16 C22,16.5522847 21.5522847,17 21,17 L20,17 L20,15 Z" fill="#000000" />
                                        <path d="M3,7 L4,7 L4,9 L3,9 C2.44771525,9 2,8.55228475 2,8 L2,8 C2,7.44771525 2.44771525,7 3,7 Z" fill="#000000" />
                                        <path d="M3,11 L4,11 L4,13 L3,13 C2.44771525,13 2,12.5522847 2,12 L2,12 C2,11.4477153 2.44771525,11 3,11 Z" fill="#000000" />
                                        <path d="M3,15 L4,15 L4,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,16 C2,15.4477153 2.44771525,15 3,15 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block faNum">{{$load}}%</span>
                            <span class="font-weight-bold text-white font-size-sm">CPU USAGE</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>
                <div class="col-md-4">
                    <!--begin::Stats Widget 31-->
                    <div class="card card-custom bg-success card-stretch gutter-b rounded-xl">
                        <!--begin::Body-->
                        <div class="card-body">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-12-10-081610/theme/html/demo7/dist/../src/media/svg/icons/Devices/CPU1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="10" height="12" rx="2" />
                                        <path d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block faNum">{{number_format($sms_money)}} ریال</span>
                            <span class="font-weight-bold text-white font-size-sm">اعتبار پنل پیامک</span>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 31-->
                </div>
            </div>
        </div>
    </div>
    <div class="card card-custom gutter-b rounded-xl shadow-sm">
        <!--begin::Header-->
        <div class="card-header py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">لیست کلاس های در حال برگزاری</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--Begin::Body-->
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="text-muted">
                        <th scope="col">شناسه کلاس</th>
                        <th scope="col">نام کلاس</th>
                        <th scope="col">نام دوره</th>
                        <th scope="col">سوالات</th>
                        <th scope="col">پخش کننده</th>
                        <th scope="col">راهنمای پخش کننده</th>
                        <th scope="col">شماره استودیو</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classrooms as $classroom)
                    <tr>
                        <td class="faNum">{{ $classroom->id }}</td>
                        <td>
                            <a href="{{ route('webinar.frontend', $classroom->course->id) }}">
                                {{ $classroom->name }}
                            </a>
                        <td>
                            <a href="{{ route('webinar.frontend', $classroom->course->id) }}">
                                {{ $classroom->course->name }}
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('tvshow.questions', $classroom->id) }}" class="btn btn-outline-warning btn-pill btn-sm mr-2">
                                سوالات
                            </a>
                        </td>
                        <td>{{ $classroom->player->name }}</td>
                        <td>{{ $classroom->player->help }}</td>
                        <td class="faNum">{{ $classroom->stu_num }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td class="bg-white text-center py-10" colspan="7">
                            هیچ کلاسی در حال برگزاری نمیباشد.
                        </td>
                    </tr>
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

@endsection