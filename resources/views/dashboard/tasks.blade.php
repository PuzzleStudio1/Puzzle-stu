@extends('layouts.index')

@section('title', 'پازل استودیو | لیست کار های محوله')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
@endsection

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
                        @include('partials.alerts')
                        <div class="card card-custom gutter-b rounded-xl">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">لیست کار های محوله به
                                        شما</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    @foreach ($task_todo as $task)
                    <div class="col-md-6">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b card-stretch rounded-xl">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <span class="card-label font-weight-bolder text-dark">{{ $task->title }}</span>
                                </h4>
                                <div class="card-toolbar">
                                    <span
                                        class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{ verta($task->dotime)->format('%d %B') }}</span>
                                </div>
                            </div>
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Description-->
                                <div class="font-weight-bold">{!! $task->description !!}</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-8 d-flex">
                                        <div class="d-flex align-self-center">
                                            <span class="svg-icon svg-icon-gray-50">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
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
                                            <div class="text-dark">محول شده توسط <span
                                                    class="text-primary">{{ $task->maker->first_name}}
                                                    {{ $task->maker->last_name}}</span></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <button type="submit" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#completeTask{{$task->id}}">
                                            <span class="svg-icon svg-icon-white"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            پایان انجام کار
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Footer-->
                        </div>
                        <!--end:: Card-->
                    </div>
                    <div class="modal fade" id="completeTask{{$task->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog rounded-xl" role="document">
                            <div class="modal-content rounded-xl">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">اتمام کار</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    آیا مطمئنید که کار تمام شده است؟ 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-danger btn-sm font-weight-bold"
                                        data-dismiss="modal">انصراف</button>
                                    <a href="{{ route('dashboard.tasks.check', $task->id) }}"
                                        class="btn btn-primary text-center">
                                        تایید پایان
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-12 mt-10">
                        <div class="card card-custom gutter-b rounded-xl">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">لیست کار های به
                                        اتمام رسیده</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    @foreach ($task_done as $task)
                    <div class="col-md-6">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b card-stretch rounded-xl">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <span class="card-label font-weight-bolder text-dark">{{ $task->title }}</span>
                                </h4>
                                <div class="card-toolbar">
                                    <span
                                        class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{ verta($task->dotime)->format('%d %B') }}</span>
                                </div>
                            </div>
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Description-->
                                <div class="font-weight-bold">{!! $task->description !!}</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12 d-flex">
                                        <div class="d-flex align-self-center">
                                            <span class="svg-icon svg-icon-gray-50">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
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
                                            <div class="text-dark">محول شده توسط <span
                                                    class="text-primary">{{ $task->maker->first_name}}
                                                    {{ $task->maker->last_name}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Footer-->
                        </div>
                        <!--end:: Card-->
                    </div>
                    @endforeach
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