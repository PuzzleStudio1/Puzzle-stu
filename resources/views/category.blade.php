@extends('layouts.index')

@section('title', 'پازل استودیو | دسته بندی')

@section('content')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid mt-6 mb-2">
    <!--begin::Container-->
    <div class=" container ">
        <div class="row">
            <div class="col-md-3 col-12">
                <div class="card card-custom bgi-no-repeat gutter-b px-6">
                    <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                        id="accordionExample7">
                        <div class="card">
                            <div class="card-header" id="headingTwo7">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo7">
                                    <span class="svg-icon svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path
                                                    d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                                    fill="#000000" fill-rule="nonzero"></path>
                                                <path
                                                    d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                    transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) ">
                                                </path>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="card-header border-0 py-5">
                                        <h3 class="card-title py-0 align-items-start flex-column">
                                            <span class="card-label font-weight-bolder text-dark">دسته بندی ها</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseTwo7" class="collapse" data-parent="#accordionExample7">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item font-size-h6 font-weight-bold"><a
                                                class="text-dark text-hover-warning"
                                                href="{{ route('category.frontend', 1) }}">رشته ریاضی - فیزیک</a>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 4) }}">حسابان و ریاضیات</a>
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 5) }}">هندسه</a>
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 6) }}">گسسته</a>
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 7) }}">فیزیک</a>
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 8) }}">شیمی</a>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item font-size-h6 font-weight-bold"><a
                                                class="text-dark text-hover-warning"
                                                href="{{ route('category.frontend', 2) }}">رشته علوم تجربی</a>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 9) }}">زیست نشاسی</a>
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 10) }}">ریاضیات</a>
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 11) }}">فیزیک</a>
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 12) }}">شیمی</a>
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 13) }}">زمین شناسی</a>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item font-size-h6 font-weight-bold"><a
                                                class="text-dark text-hover-warning"
                                                href="{{ route('category.frontend', 3) }}">دروس عمومی</a>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 14) }}">ادبیات فارسی</a>
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 15) }}">عربی</a>
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 16) }}">دینی</a>
                                                <li class="list-group-item font-size-h6 font-weight-light"><a
                                                        class="text-dark text-hover-warning"
                                                        href="{{ route('category.frontend', 17) }}">زبان</a>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-12">
                <div class="card card-custom bgi-no-repeat gutter-b card-stretch p-5">
                    <!--begin::Heading-->
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">دوره های {{ $category_name }}</h2>
                    </div>
                    <hr>
                    <!--end::Heading-->

                    <!--begin::Products-->
                    @if ($courses->isEmpty())
                    <div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                        <div class="alert-text">این دسته بندی هیچ دوره ای ندارد !!!</div>
                        <div class="alert-close">
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <!--begin::Product-->
                        @foreach ($courses as $course)
                        <div class="col-12 col-md-4">
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