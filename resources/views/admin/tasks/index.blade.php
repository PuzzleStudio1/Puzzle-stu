@extends('layouts.admin')

@section('title', 'پازل استودیو | لیست تسک‌ها')

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
    <form method="post" action="{{ route('tasks.store') }}" id="TaskStoreForm"
        class="card card-custom gutter-b rounded-xl shadow-sm">
        <!--begin::Header-->
        <div class="card-header">
            <h3 class="card-title">
                <span class="card-label font-weight-bolder text-dark">افزودن گزارش کار</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--Begin::Body-->
        <div class="card-body">
            @csrf
            <div class="form-group row">
                <div class="col-md-6 col-12">
                    <label class="font-size-h6 font-weight-bold text-dark">عنوان گزارش:</label>
                    <input type="text" name="title" class="form-control form-control-lg form-control-solid" value=""
                        placeholder="عنوان گزارش" required>
                </div>
                <div class="col-md-6 col-12">
                    <label class="font-size-h6 font-weight-bold text-dark">انجام دهنده:</label>
                    <select name="userdoing" class="form-control form-control-solid selectpicker font-weight-normal"
                        data-size="7" data-live-search="true" required>
                        <option value=null selected disabled>کارمند موردنظر را انتخاب کنید.
                        </option>
                        @forelse ($users as $user)
                        <option value="{{ $user->id }}" @if(old('user')==$user->id)selected
                            @endif>{{ $user->first_name }}
                            {{ $user->last_name }}</option>
                        @empty
                        هیچ کارمندی برای نمایش وجود ندارد.
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 col-12">
                    <label class="font-size-h6 font-weight-bold text-dark">تاریخ انجام کار:</label>
                    <input type="text" name="dotime"
                        class="initial-value-example form-control form-control-lg form-control-solid" required>
                </div>
                <div class="col-md-6 col-12">
                    <label class="font-size-h6 font-weight-bolder text-dark">توضیحات کار:</label>
                    <textarea class="form-control form-control-solid" name="description" rows="5"
                        placeholder="اختیاری"></textarea>
                </div>
            </div>
        </div>
        <!--end::Body-->
        <div class="card-footer">
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-10 mr-2">ثبت فرم</button>
                </div>
            </div>
        </div>
</div>
<div class="card card-custom gutter-b shadow-sm rounded-xl">
    <!--begin::Header-->
    <div class="card-header">
        <h3 class="card-title">
            <span class="card-label font-weight-bolder text-dark">لیست گزارش کارها</span>
        </h3>
    </div>

    <!--end::Header-->
    <div class="card-body">
        <!--begin: Datatable-->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-muted">
                        <th class="text-center">#</th>
                        <th class="text-center">عنوان</th>
                        <th class="text-center">توضیحات</th>
                        <th class="text-center">انجام دهنده</th>
                        <th class="text-center">مهلت انجام</th>
                        <th class="text-center">وضعیت انجام</th>
                        <th class="text-center">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td class="text-center">{{ $task->id}}</td>
                        <td class="text-center font-weight-bold">{{ $task->title}}</td>
                        <td class="text-center font-weight-bold">{{ $task->description}}</td>
                        <td class="text-center">{{ $task->user->first_name}} {{ $task->user->last_name}}</td>
                        <td class="text-center">{{ verta($task->dotime)->format('%d %B Y') }}</td>
                        <td class="text-center">
                            @if ($task->completed == true)
                            <span class="label label-success label-inline font-weight-bold mr-2">انجام شده</span>
                            @else
                            <span class="label label-danger label-inline font-weight-bold mr-2">انجام نشده</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a  data-toggle="modal" data-target="#deleteTask{{$task->id}}"
                                class="btn btn-sm btn-default btn-text-danger btn-hover-danger btn-icon mr-2"
                                title="View Account">
                                <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                            <path
                                                d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="deleteTask{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حذف گزارش کار</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    آیا از  حذف کار اطمینان دارید؟
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary font-weight-bold btn-sm" data-dismiss="modal">انصراف</button>
                                    <a href="{{ route('tasks.delete', $task->id) }}"
                                        class="btn btn-danger text-center">
                                        حذف کار
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
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