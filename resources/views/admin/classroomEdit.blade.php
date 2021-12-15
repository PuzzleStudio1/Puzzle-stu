@extends('layouts.admin')

@section('title', 'پازل استودیو | لیست کلاس ها')

@section('css')

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />
    <link href="{{ asset('css/jquery.md.bootstrap.datetimepicker.style.css') }}" rel="stylesheet" />

@endsection

@section('content')
    <!--begin::Content-->
    <div class="card card-custom gutter-b shadow-none">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">ویرایش {{$classroom->name}}</span>
            </h3>
        </div>
        <hr>
        <!--end::Header-->
        <div class="card-body">
            @include('partials.alerts')
            @include('partials.validation-errors')
            <form method="post" action=" {{ route('classroom.update', $classroom->id) }} ">
                @csrf
                <div class="form-group row py-4">
                    <div class="col-md-12 col-12 mb-4">
                        <label class="font-size-h6 font-weight-bolder text-dark">نام</label>
                    <input type="text" name="name" class="form-control" placeholder="نام کلاس" value="{{$classroom->name}}">
                        <label class="font-size-h6 font-weight-bolder text-dark mt-4">شماره استودیو</label>
                        <input type="number" name="stu_num" class="form-control  "
                            placeholder="شماره استودیو را وارد نمایید" value="{{$classroom->stu_num}}">
                    </div>
                    <div class="col-md-6 col-12">
                        <label class="font-size-h6 font-weight-bolder text-dark">تاریخ و زمان شروع کلاس</label>
                        <div class="input-group">
                            <div id="date6"></div>
                            <div class="row">
                                <input type="text" id="inputDate6" class="form-control"
                                    placeholder="In Line Date" aria-label="In Line Date"
                                    aria-describedby="date6">
                                <input type="text" id="inputDate7" class="form-control"
                                    placeholder="In Line Date" aria-label="In Line Date"
                                    aria-describedby="date6" name="classroom_date" value="{{$classroom->classroom_date}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <label class="font-size-h6 font-weight-bolder text-dark">تاریخ و زمان پایان کلاس</label>
                        <div class="input-group">
                            <div id="date8"></div>
                            <div class="row">
                                <input type="text" id="inputDate8" class="form-control"
                                    placeholder="In Line Date" aria-label="In Line Date"
                                    aria-describedby="date6">
                                <input type="text" id="inputDate9" class="form-control"
                                    placeholder="In Line Date" aria-label="In Line Date"
                                    aria-describedby="date6" name="classroom_end_date" value="{{$classroom->classroom_end_date}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label">رایگان</label>
                    <div class="col-3">
                        <span class="switch">
                            <label>
                                <input type="checkbox" name="free" @if ($classroom->free == true)checked="checked" @endif/>
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
                <hr>
                <div class="form-group mt-5">
                    <input type="submit" class="btn btn-outline-success btn w-25" value="ویرایش کلاس">
                </div>
            </form>
        </div>
    </div>
    
    <!--end::Content-->
@endsection

@section('script')
    <script src="{{ asset('js/jquery.md.bootstrap.datetimepicker.js') }}"></script>

    <script>
        $('#date6').MdPersianDateTimePicker({
            targetTextSelector: '#inputDate6',
            targetDateSelector: '#inputDate7',
            inLine: true,
            enableTimePicker: true,
            fromDate: true,
            groupId: 'date6-7-range'
        });
        $('#date8').MdPersianDateTimePicker({
            targetTextSelector: '#inputDate8',
            targetDateSelector: '#inputDate9',
            inLine: true,
            enableTimePicker: true,
            fromDate: true,
            groupId: 'date8-9-range'
        });

    </script>
@endsection
