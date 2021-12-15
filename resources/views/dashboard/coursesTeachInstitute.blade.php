@extends('layouts.index')

@section('title', 'پازل استودیو | دوره های من')

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
                    <div class="row">
                        <div class="col-xxl-6">
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bolder text-dark">دوره هایی که شما مدرس هستید</span>
                                        <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ $coursesTeach->count() }}
                                            دوره</span>
                                    </h3>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-8">
                                    @forelse ($coursesTeach as $course)
                                        
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
                                            <div class="d-flex flex-md-row flex-column justify-content-end flex-grow-1">
                                                <a href="{{ route('teacher.institute.course.classrooms', $course->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    کلاس ها
                                                </a>
                                                <a href="{{route('teacher.institute.course.booklets',$course->id)}}"
                                                    class="btn btn-warning btn-sm">
                                                    جزوات
                                                </a>
                                                <a href="{{route('teacher.institute.course.students',$course->id)}}"
                                                    class="btn btn-primary btn-sm">
                                                    دانش آموزان
                                                </a>
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    @empty
                                        <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                            <div class="alert-text">شما مدرس هیچ دوره ای نیستید !!</div>
                                            <div class="alert-close">
                                            </div>
                                        </div>
                                    @endforelse
                                    {{-- {{ $courses->links() }} --}}
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bolder text-dark">دوره هایی که شما برگزار کننده هستید</span>
                                        <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ $coursesInstitute->count() }}
                                            دوره</span>
                                    </h3>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-8">
                                    @forelse ($coursesInstitute as $course)
                                        
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
                                            <div class="d-flex flex-md-row flex-column justify-content-end flex-grow-1">
                                                <a href="{{ route('teacher.institute.course.classrooms', $course->id) }}"
                                                    class="btn btn-success btn-sm">
                                                    کلاس ها
                                                </a>
                                                <a href="{{route('teacher.institute.course.booklets',$course->id)}}"
                                                    class="btn btn-warning btn-sm">
                                                    جزوات
                                                </a>
                                                <a href="{{route('teacher.institute.course.students',$course->id)}}"
                                                    class="btn btn-primary btn-sm">
                                                    دانش آموزان
                                                </a>
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    @empty
                                        <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                            <div class="alert-text">شما برگزار کننده هیچ دوره ای نیستید!!!</div>
                                            <div class="alert-close">
                                            </div>
                                        </div>
                                    @endforelse
                                    {{-- {{ $courses->links() }} --}}
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
