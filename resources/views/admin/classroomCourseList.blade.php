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
<div class="flex-row-fluid">
    @include('partials.alerts')
    @include('partials.validation-errors')
    <div class="card card-custom gutter-b">
        <div class="accordion accordion-solid accordion-panel accordion-svg-toggle" id="accordionExample8">
            <div class="card">
                <div class="card-header" id="headingTwo8">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo8">
                        <div class="card-label">اضافه کردن کلاس به {{$course->name}}</div>
                        <span class="svg-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                    </div>
                </div>
                <div id="collapseTwo8" class="collapse" data-parent="#accordionExample8">
                    <div class="card-body">
                        <form method="post" action=" {{ route('classroom.storeForCourse', $course->id) }} ">
                            @csrf
                            <div class="form-group row py-4">
                                <div class="col-md-12 col-12 mb-4">
                                    <label class="font-size-h6 font-weight-bolder text-dark">نام</label>
                                    <input type="text" name="name" class="form-control  " placeholder="نام کلاس">
                                    <label class="font-size-h6 font-weight-bolder text-dark mt-4">شماره استودیو</label>
                                    <input type="number" name="stu_num" class="form-control  "
                                        placeholder="شماره استودیو را وارد نمایید">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">تاریخ و زمان شروع
                                        کلاس</label>
                                    <div class="input-group">
                                        <div id="date6"></div>
                                        <div class="row">
                                            <input type="text" id="inputDate6" class="form-control"
                                                placeholder="In Line Date" aria-label="In Line Date"
                                                aria-describedby="date6">
                                            <input type="text" id="inputDate7" class="form-control"
                                                placeholder="In Line Date" aria-label="In Line Date"
                                                aria-describedby="date6" name="classroom_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">تاریخ و زمان پایان
                                        کلاس</label>
                                    <div class="input-group">
                                        <div id="date8"></div>
                                        <div class="row">
                                            <input type="text" id="inputDate8" class="form-control"
                                                placeholder="In Line Date" aria-label="In Line Date"
                                                aria-describedby="date6">
                                            <input type="text" id="inputDate9" class="form-control"
                                                placeholder="In Line Date" aria-label="In Line Date"
                                                aria-describedby="date6" name="classroom_end_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">رایگان</label>
                                <div class="col-3">
                                    <span class="switch">
                                        <label>
                                            <input type="checkbox" name="free" />
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group mt-5">
                                <input type="submit" class="btn btn-outline-success btn w-25" value="ایجاد کلاس">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($classrooms as $classroom)
    <div class="card card-custom gutter-b rounded-xl">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    {{ $classroom->name }}
                    @if ($classroom->free == true)
                    <span class="label label-light-success label-pill label-inline mr-2">رایگان</span>
                    @endif
                    <small>
                        @if ($classroom->player_id == null && $classroom->link == null && $classroom->finished == 0)
                        <span class="label label-inline label-primary mr-2">
                            کلاس هنوز برگزار نشده است.
                        </span>
                        @else
                        @if ($classroom->player_id == null && $classroom->link != null)
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
            <div class="card-toolbar">
                <p class="mb-0 faNum">
                    تاریخ و زمان برگزاری :
                    {{ $classroom->classroom_date }}
                    الی
                    {{$classroom->classroom_end_date}}
                </p>
                <span class="label label-light-warning label-pill label-inline mr-2 faNum">شماره
                    استودیو:{{ $classroom->stu_num }}</span>
            </div>
        </div>
        <div class="card-body">

            <div class="card-toolbar d-flex flex-row align-items-center justify-content-around mb-4">
                @if ($classroom->player_id != null)
                <button type="button" class="btn btn-outline-success btn-sm mr-2" data-toggle="modal"
                    data-target="#finishmodel{{$classroom->id}}">
                    اتمام جلسه
                </button>

                @endif
                @if (!$classroom->player_id == null || $classroom->finished == 1)
                <a href="{{ route('question.indexClassroom', $classroom->id) }}"
                    class="btn btn-outline-warning btn-sm mr-2">
                    سوالات
                </a>
                <a href="{{ route('classroom.absence', $classroom->id) }}" class="btn btn-outline-primary btn-sm mr-2">
                    حضور غیاب
                </a>
                @endif
                <button type="button" class="btn btn-icon btn-outline-danger btn-sm mr-2" data-toggle="modal"
                    data-target="#deleteModel{{$classroom->id}}">
                    <i class="flaticon-delete-1"></i>
                </button>
                <a href="{{ route('classroom.edit', $classroom->id) }}" class="btn btn-outline-success btn-sm mr-2">
                    <i class="flaticon-edit"></i>
                </a>
            </div>
            <div class="card-toolbar d-flex flex-row align-items-center justify-content-around">
                @if ($classroom->player_id == 1)
                {{ $classroom->id }}
                @endif
                @if ($classroom->player_id != null)
                <p>{{ $classroom->player->help }}</p>
                @endif
            </div>
            <div class="accordion accordion-light  accordion-toggle-arrow" id="accordionExample5">
                <div class="card">
                    <div class="card-header" id="headingTwo5">
                        <div class="card-title collapsed" data-toggle="collapse"
                            data-target="#class{{ $classroom->id }}">
                            <i class="flaticon-interface-6"></i> لایو و آرشیو
                        </div>
                    </div>
                    <div id="class{{ $classroom->id }}" class="collapse" data-parent="#accordionExample5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form method="post"
                                        action=" {{ route('classroom.LiveOrArchive', [$course, $classroom]) }} ">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12">
                                                <label class="font-size-h6 font-weight-bolder text-dark">نوع پخش
                                                    کننده</label>
                                                <select name="player_id" class="mb-4 form-control selectpicker"
                                                    data-size="7" data-live-search="true">
                                                    <option value="" selected>بدون پخش کننده</option>
                                                    @foreach ($players as $player)
                                                    <option value="{{ $player->id }}" @if ($classroom->player_id ==
                                                        $player->id)
                                                        selected
                                                        @endif>{{ $player->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label class="font-size-h6 font-weight-bolder text-dark">آرشیو کردن
                                                    کلاس</label>
                                                <textarea name="link" rows="5"
                                                    class="form-control">{{ $classroom->link }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-outline-success btn"
                                                value="لایو یا آرشیو">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModel{{$classroom->id}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف کلاس</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    آیا از حذف کلاس اطمینان دارید؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">انصراف</button>
                    <a href="{{ route('classroom.destroy', $classroom->id) }}"
                        class="btn btn-danger text-center btn-sm">
                        حذف کلاس
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="finishmodel{{$classroom->id}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">حذف کلاس</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    آیا از اتمام جلسه اطمینان دارید؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">انصراف</button>
                    <a href="{{ route('classroom.finish', $classroom->id) }}"
                        class="btn btn-outline-success btn-sm mr-2">
                        اتمام جلسه
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
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