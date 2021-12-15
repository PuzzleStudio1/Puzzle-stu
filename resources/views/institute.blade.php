@extends('layouts.index')

@section('title', 'پازل استودیو | موسسه')

@section('content')
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
                            @isset($institute->photo)
                            <!--begin::Image-->
                            <div class="overlay">
                                <div class="overlay-wrapper rounded text-center">
                                    <img src="{{ asset('storage/' . $institute->photo->filePath()) }}" alt=""
                                        class="w-50 rounded-circle symbol lazyload" />
                                </div>
                            </div>
                            <!--end::Image-->
                            @endisset

                            <!--begin::Details-->
                            <div class="text-center mt-2 mb-0 d-flex flex-column">
                                <a href="#"
                                    class="font-size-h3 mx-4 my-2 font-weight-bolder text-dark-75 text-hover-primary mb-1 add-loader">{{ $institute->first_name . ' ' . $institute->last_name }}</a>
                                <div class="font-size-h6 font-weight-normal mx-4 my-2">
                                    <p class="text-dark-75 font-size-h6 mt-2">
                                        {{ $institute->info }}
                                    </p>
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
                <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title m-0 font-weight-bolder font-size-h4 text-dark">
                            دوره هاي {{ $institute->first_name . ' ' . $institute->last_name }}
                        </h3>
                    </div>
                    <hr>
                    <!--end::Header-->
                    <div class="card-body pt-2">
                        <div class="row">
                            @forelse ($courses as $course)
                            <div class="col-12 col-md-4">
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
                                                class="btn btn-outline-primary font-weight-bold btn-sm my-2 my-md-4 rounded-pill">
                                                ورود به وبینار
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>

                            @empty
                            <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                <div class="alert-text">هیچ دوره ای برای این موسسه ثبت نشده است !!!!</div>
                                <div class="alert-close">
                                </div>
                            </div>
                            @endforelse
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