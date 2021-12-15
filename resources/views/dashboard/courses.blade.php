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
                                        <span class="card-label font-weight-bolder text-dark">دوره های
                                            من</span>
                                        <span class="text-muted mt-3 font-weight-bold font-size-sm">{{ $courses->count() }}
                                            دوره</span>
                                    </h3>
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
                        </div>
                        <div class="col-xxl-6">
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0">
                                    <h3 class="card-title font-weight-bolder text-dark">فایل های من</h3>
                                </div>
                                <!--end::Header-->

                                <!--begin::Body-->
                                <div class="card-body pt-2">
                                    @forelse ($courses as $course)
                                        @forelse ($course->booklets()->get() as $booklet)
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
                                        @empty
                                            <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                <div class="alert-text">برای دوره های شما هنوز هیچ فایلی قرار نگرفته است !!!</div>
                                                <div class="alert-close">
                                                </div>
                                            </div>
                                        @endforelse
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
