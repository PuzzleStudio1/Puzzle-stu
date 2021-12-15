@extends('layouts.index')

@section('title','پازل استودیو | سینوهه')

@section('content')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid mt-6 mb-2">
    <!--begin::Container-->
    <div class=" container ">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom bgi-no-repeat gutter-b card-stretch p-5">
                    <!--begin::Heading-->
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">دوره های {{$tag_name}}</h2>
                    </div>
                    <hr>
                    <!--end::Heading-->

                    <!--begin::Products-->
                    @if ($courses->isEmpty())
                    <div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                        <div class="alert-text">این برچسب هیچ دوره ای ندارد !!!</div>
                        <div class="alert-close">
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <!--begin::Product-->
                        @foreach ($courses as $course)
                        <div class="col-12 col-md-3">
                            <!--begin::Card-->
                            <div class="card card-custom border-lg my-2">
                                <div class="card-body p-0">
                                    <a href="{{ route('webinar.frontend', $course->id) }}" class="add-loader">
                                        @isset($course->photo)
                                        <!--begin::Image-->
                                        <div class="overlay">
                                            <div class="overlay-wrapper text-center bg-light">
                                                <img src="{{ asset('storage/' . $course->photo->filePath()) }}" alt=""
                                                    class="w-100 lazyload rounded-top" />
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
                                        <span class="align-self-center text-primary font-weight-normal">رايگان</span>
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
                        @endforeach

                        <!--end::Product-->
                    </div>
                    <!--end::Products-->
                    <div class="d-flex justify-content-center align-items-center flex-wrap p-6">
                        <div class="contaier">
                            <div class="d-flex flex-wrp py-2 mr-3 text-center">
                                {{ $courses->links() }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <!--end::Products-->
                </div>
            </div>
        </div>

    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection

@section('footer')
@include('partials.footer')
@endsection