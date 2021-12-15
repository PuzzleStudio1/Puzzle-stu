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
                        <div class="col-12">
                            @foreach ($classrooms as $classroom)
                                <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h3 class="card-label">
                                                {{ $classroom->name }}
                                                <small>
                                                    @if ($classroom->player_id == null && $classroom->link == null && $classroom->finished == 0)
                                                        <span class="label label-inline label-primary mr-2">
                                                            کلاس هنوز برگزار نشده است.
                                                        </span>
                                                    @else
                                                        @if ($classroom->player_id == null && $classroom->finished == 1 && $classroom->link != null)
                                                            <span class="label label-inline label-success mr-2">
                                                                کلاس برگزار شده و از طریق آرشیو در دسترس است.
                                                            </span>
                                                        @endif
                                                        @if ($classroom->player_id == null && $classroom->finished == 1 && $classroom->link == null)
                                                            <span class="label label-inline label-success mr-2">
                                                                کلاس پایان یافته.
                                                            </span>
                                                        @endif
                                                        @if ($classroom->link == null && $classroom->finished == 0)
                                                            <span class="label label-inline label-warning  mr-2">
                                                                کلاس در حال برگزاری است.
                                                            </span>
                                                        @endif
                                                    @endif
                                                </small>
                                            </h3>
                                        </div>
                                        <div class="card-toolbar d-flex flex-row">
                                            <p class="mb-0 faNum">
                                                تاریخ و زمان برگزاری :
                                                {{ $classroom->classroom_date }}
                                                الی
                                                {{ $classroom->classroom_end_date }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if (!$classroom->player_id == null || $classroom->finished == 1)
                                            <a href="{{ route('teacher.institute.course.questions', $classroom->id) }}"
                                                class="btn btn-outline-warning btn-sm mr-2">
                                                سوالات
                                            </a>
                                            <a href="{{ route('teacher.institute.course.absence', $classroom->id) }}"
                                                class="btn btn-outline-primary btn-sm mr-2">
                                                حضور غیاب
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
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
