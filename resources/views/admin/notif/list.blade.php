@extends('layouts.admin')

@section('title', 'پازل استودیو | لیست اطلاعیه‌ها')

@section('css')
<link rel="stylesheet" href="{{ asset('css/persian-datepicker.min.css')}}" />

<script src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{ asset('js/persian-date.min.js')}}" defer></script>
<script src="{{ asset('js/persian-datepicker.min.js')}}" defer></script>
@endsection

@section('content')
<!--begin::Content-->
<div class="flex-row-fluid">
    @include('partials.alerts')
    @include('partials.validation-errors')
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">افزودن اطلاعیه</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--Begin::Body-->
        <div class="card-body">
            <form method="post" action="{{ route('notif.store') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-12">
                        <label class="font-size-h6 font-weight-bolder text-dark">عنوان اطلاعیه</label>
                        <input type="text" name="title" class="form-control" placeholder="عنوان اطلاعیه" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 col-12">
                        <label class="font-size-h6 font-weight-bolder text-dark">تاریخ انتشار</label>
                        <input type="text" name="date" class="form-control initial-value-example"
                            placeholder="تاریخ انتشار" required>
                    </div>
                    <div class="col-md-6 col-12">
                        <label class="font-size-h6 font-weight-bolder text-dark">عنوان دوره</label>
                        <select name="course" class="form-control selectpicker" data-size="7" data-live-search="true" required>
                            <option value=null selected disabled>دوره مورد نظر را انتخاب کنید
                            </option>
                            @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <label class="font-size-h6 font-weight-bolder text-dark">متن اطلاعیه</label>
                        <textarea class="form-control" name="text" rows="5" placeholder="متن اطلاعیه"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <input type="submit" class="btn btn-outline-success btn sm w-100" value="افزودن">
                    </div>
                </div>
            </form>
        </div>
        <!--end::Body-->
    </div>
    <div class="card card-custom gutter-b shadow-none">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">لیست اطلاعیه‌ها</span>
            </h3>
        </div>

        <!--end::Header-->
        <div class="card-body">
            <!--begin: Datatable-->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">متن اطلاعیه</th>
                            <th class="text-center">تاریخ انتشار</th>
                            <th class="text-center">دوره</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifs as $notif)
                        <tr>
                            <td class="text-center">{{ $notif->id }}</td>
                            <td class="text-center">{{ $notif->title }}</td>
                            <td class="text-center">{{ $notif->text }}</td>
                            <td class="text-center">{{ verta($notif->notif_date) }}</td>
                            <td class="text-center"><a href="{{ route('webinar.frontend', $notif->course->id) }}">{{ $notif->course->name }}</a></td>
                            <td class="text-center">
                                <a href="{{ route('notif.delete', $notif->id) }}"
                                    class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--end::Content-->

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.initial-value-example').persianDatepicker({
            initialValueType: 'persian',
            altFormat: 'YYYY/MM/DD HH:mm:00',
            format: 'YYYY/MM/DD HH:mm:00',
            timePicker: {
                enabled: true,
                hour: {
                  enabled: true,
                  step: null
                },
                minute: {
                  enabled: true,
                  step: null
                },
                second: {
                  enabled: false,
                  step: null
                },
                meridian: {
                  enabled: false
                }
            }
        });
    });
</script>
@endsection