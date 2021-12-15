@extends('layouts.admin')

@section('title', 'پازل استودیو | فاکتور')

@section('content')
<!--begin::Content-->
<div class="flex-row-fluid">
    @include('partials.alerts')

    {{-- {{dd($request)}} --}}

    <div class="card card-custom border border-5 border-primary" id="invoice">
        <div class="card-body p-0">
            <!--begin::Invoice-->
            <div class="row justify-content-center pt-8 px-8 pt-md-27 px-md-0">
                <div class="col-md-11">
                    <!-- begin: Invoice header-->
                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                        <div class="col-md-auto">
                            <h1 class="display-4 font-weight-boldest mb-5">فاکتور پرداخت</h1>
                            <div class="h4 text-primary font-weight-boldest mb-10"><span
                                    class="text-muted font-weight-normal">شماره فاکتور:</span> {{$request->invoice_num}}
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <!--begin::Logo-->
                            <a href="#" class="mb-5 max-w-200px">
                                <img src="{{asset('media/Logo-New.svg')}}" class="w-100" alt="">
                            </a>
                            <!--end::Logo-->
                            <span
                                class="d-flex flex-column align-items-md-start font-size-h5 font-weight-bold text-muted text-right">
                                <span>تهران، ستارخان، خسرو جنوبی،</span>
                                <span>کوچه مصطفوی، پلاک ۳۲، واحد ۷</span>
                                <span class="mt-5">WWW.PUZZLE-STU.COM</span>
                                <span style="direction: ltr;">021 4420 1321</span>
                            </span>
                        </div>
                    </div>
                    <div class="rounded-xl overflow-hidden w-100 max-h-md-250px mb-30">
                        <img src="{{ asset('media/bg-9.jpg') }}" class="w-100" alt="">
                    </div>
                    <!--end: Invoice header-->
                    <!--begin: Invoice body-->
                    <div class="row border-bottom pb-10">
                        <div class="col-md-9 py-md-10 pr-md-10">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-1 pb-9 pl-0 font-weight-bolder text-muted font-size-lg">
                                                شرح</th>
                                            <th
                                                class="pt-1 pb-9 text-center font-weight-bolder text-muted font-size-lg">
                                                ساعت</th>
                                            <th
                                                class="pt-1 pb-9 text-center font-weight-bolder text-muted font-size-lg">
                                                قیمت هر ساعت</th>
                                            <th
                                                class="pt-1 pb-9 text-right pr-0 font-weight-bolder text-muted font-size-lg">
                                                مبلغ کل</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($request->invoice_item_1_desc != '')
                                        <tr class="font-weight-bolder border-bottom-0 font-size-lg">
                                            <td class="border-top-0 pl-0 py-4 d-flex align-items-center">
                                                <span class="navi-icon mr-2">
                                                    <i class="fa fa-genderless text-success font-size-h2"></i>
                                                </span>{{ $request->invoice_item_1_desc }}</td>
                                            <td class="border-top-0 text-center py-4">{{ $request->invoice_item_1_time }}</td>
                                            <td class="border-top-0 text-center py-4">{{ number_format($request->invoice_item_1_pertime) }}</td>
                                            <td
                                                class="border-top-0 pr-0 py-4 font-size-h6 font-weight-boldest text-right">
                                                {{ number_format($request->invoice_item_1_pertime * $request->invoice_item_1_time ) }} تومان</td>
                                        </tr>
                                        @endif
                                        @if ($request->invoice_item_2_desc != '')
                                        <tr class="font-weight-bolder border-bottom-0 font-size-lg">
                                            <td class="border-top-0 pl-0 py-4 d-flex align-items-center">
                                                <span class="navi-icon mr-2">
                                                    <i class="fa fa-genderless text-success font-size-h2"></i>
                                                </span>{{ $request->invoice_item_2_desc }}</td>
                                            <td class="border-top-0 text-center py-4">{{ $request->invoice_item_2_time }}</td>
                                            <td class="border-top-0 text-center py-4">{{ number_format($request->invoice_item_2_pertime) }}</td>
                                            <td
                                                class="border-top-0 pr-0 py-4 font-size-h6 font-weight-boldest text-right">
                                                {{ number_format($request->invoice_item_2_pertime * $request->invoice_item_2_time ) }} تومان</td>
                                        </tr>
                                        @endif
                                        @if ($request->invoice_item_3_desc != '')
                                        <tr class="font-weight-bolder border-bottom-0 font-size-lg">
                                            <td class="border-top-0 pl-0 py-4 d-flex align-items-center">
                                                <span class="navi-icon mr-2">
                                                    <i class="fa fa-genderless text-success font-size-h2"></i>
                                                </span>{{ $request->invoice_item_3_desc }}</td>
                                            <td class="border-top-0 text-center py-4">{{ $request->invoice_item_3_time }}</td>
                                            <td class="border-top-0 text-center py-4">{{ number_format($request->invoice_item_3_pertime) }}</td>
                                            <td
                                                class="border-top-0 pr-0 py-4 font-size-h6 font-weight-boldest text-right">
                                                {{ number_format($request->invoice_item_3_pertime * $request->invoice_item_3_time ) }} تومان</td>
                                        </tr>
                                        @endif
                                        @if ($request->invoice_item_4_desc != '')
                                        <tr class="font-weight-bolder border-bottom-0 font-size-lg">
                                            <td class="border-top-0 pl-0 py-4 d-flex align-items-center">
                                                <span class="navi-icon mr-2">
                                                    <i class="fa fa-genderless text-success font-size-h2"></i>
                                                </span>{{ $request->invoice_item_4_desc }}</td>
                                            <td class="border-top-0 text-center py-4">{{ $request->invoice_item_4_time }}</td>
                                            <td class="border-top-0 text-center py-4">{{ number_format($request->invoice_item_4_pertime) }}</td>
                                            <td
                                                class="border-top-0 pr-0 py-4 font-size-h6 font-weight-boldest text-right">
                                                {{ number_format($request->invoice_item_4_pertime * $request->invoice_item_4_time ) }} تومان</td>
                                        </tr>
                                        @endif
                                        @if ($request->invoice_item_5_desc != '')
                                        <tr class="font-weight-bolder border-bottom-0 font-size-lg">
                                            <td class="border-top-0 pl-0 py-4 d-flex align-items-center">
                                                <span class="navi-icon mr-2">
                                                    <i class="fa fa-genderless text-success font-size-h2"></i>
                                                </span>{{ $request->invoice_item_5_desc }}</td>
                                            <td class="border-top-0 text-center py-4">{{ $request->invoice_item_5_time }}</td>
                                            <td class="border-top-0 text-center py-4">{{ number_format($request->invoice_item_5_pertime) }}</td>
                                            <td
                                                class="border-top-0 pr-0 py-4 font-size-h6 font-weight-boldest text-right">
                                                {{ number_format($request->invoice_item_5_pertime * $request->invoice_item_5_time ) }} تومان</td>
                                        </tr>
                                        @endif
                                        <tr class="font-weight-bolder border-bottom-0 font-size-lg">
                                            <td class="border-top-0"></td>
                                            <td class="border-top-0"></td>
                                            <td class="border-top-0 text-muted text-center py-4">تخفیف:</td>
                                            <td
                                                class="border-top-0 pr-0 py-4 font-size-h6 font-weight-boldest text-right">
                                                {{ number_format($request->invoice_discount) }} تومان</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="border-bottom w-100 mt-7 mb-13"></div>
                            <div class="d-flex flex-column flex-md-row">
                                <div class="flex-column mb-10 mb-md-0 w-50 px-5">
                                    <div class="font-weight-bold font-size-h6 mb-3">اطلاعات پرداخت</div>
                                    <div class="d-flex justify-content-between font-size-lg mb-3">
                                        <span class="font-weight-bold mr-15">نام و نام خانوادگی:</span>
                                        <span class="text-right">امید نقوی علیائی</span>
                                    </div>
                                    <div class="d-flex justify-content-between font-size-lg mb-3">
                                        <span class="font-weight-bold mr-15">شماره کارت:</span>
                                        <span class="text-right">6274-1211-6795-3637</span>
                                    </div>
                                </div>
                                <div class="flex-column mb-10 mb-md-0 w-50 px-5 text-right">
                                    <img src="{{ asset('media/puzzle-emza.png') }}" width="128px">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 border-left-md pl-md-10 py-md-10 text-left">
                            <!--begin::Total Amount-->
                            <div class="font-size-h4 font-weight-boldest text-muted mb-3">مبلغ قابل پرداخت</div>
                            <div class="font-size-h1 font-weight-boldest">{{ number_format( ($request->invoice_item_1_pertime * $request->invoice_item_1_time) + ($request->invoice_item_2_pertime * $request->invoice_item_2_time) + ($request->invoice_item_3_pertime * $request->invoice_item_3_time) + ($request->invoice_item_4_pertime * $request->invoice_item_4_time) + ($request->invoice_item_5_pertime * $request->invoice_item_5_time) - $request->invoice_discount) }} تومان</div>
                            <div class="text-muted font-weight-bold mb-16">با احتساب تخفیف</div>
                            <!--end::Total Amount-->
                            <div class="border-bottom w-100 mb-16"></div>
                            <!--begin::Invoice To-->
                            <div class="text-dark-50 font-size-lg font-weight-boldest mb-1">اطلاعات مشتری</div>
                            <div class="font-size-lg font-weight-bold mb-10">{{$request->invoice_co}}
                                <br>{{$request->invoice_co_desc}}</div>
                            <!--end::Invoice To-->
                            <!--begin::Invoice Date-->
                            <div class="text-dark-50 font-size-lg font-weight-boldest mb-1 mt-16">تاریخ فاکتور</div>
                            <div class="font-size-lg font-weight-bold">{{$request->invoice_date1}}</div>
                            <!--end::Invoice Date-->
                            <!--begin::Deadline Date-->
                            <div class="text-dark-50 font-size-lg font-weight-boldest mb-1 mt-3">تاریخ سررسید</div>
                            <div class="font-size-lg font-weight-bold">{{$request->invoice_date2}}</div>
                            <!--end::Deadline Date-->
                        </div>
                    </div>
                    <!--end: Invoice body-->
                </div>
            </div>
            <!-- begin: Invoice action-->
            <div class="row justify-content-center py-8 px-8 py-md-28 px-md-0 d-print-none">
                <div class="col-md-9">
                    <div class="d-flex font-size-sm flex-wrap">
                        <button type="button" class="btn btn-primary font-weight-bolder py-4 mr-3 mr-sm-14 my-1"
                            onclick="window.print();">چاپ فاکتور</button>
                        <button type="button" class="btn btn-dark font-weight-bolder ml-sm-auto my-1">ساخت فاکتور
                            جدید</button>
                    </div>
                </div>
            </div>
            <!-- end: Invoice action-->
            <!--end::Invoice-->
        </div>
    </div>
</div>
<!--end::Content-->
@endsection

@section('css')
<style>
    #kt_profile_aside {
        display: none !important;
    }

    #kt_content .col-md-10 {
        width: 100% !important;
        max-width: 100% !important;
        flex: 0 0 100%;
    }

    #kt_content .col-md-2 {
        width: 0 !important;
        max-width: 0 !important;
    }
</style>
@endsection