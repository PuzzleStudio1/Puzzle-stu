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
            <div class="col-md-9">
                @include('partials.alerts')
                @include('partials.validation-errors')
                @foreach ($classrooms as $classroom)
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                {{ $classroom->name }}
                                @if ($classroom->free == true)
                                <span class="label label-light-success label-pill label-inline mr-2">رایگان</span>
                                @endif
                                <small>
                                    @if ($classroom->player_id == null && $classroom->link == null &&
                                    $classroom->finished == 0)
                                    <span class="label label-inline label-primary mr-2">
                                        کلاس هنوز برگزار نشده است.
                                    </span>
                                    @else
                                    @if ($classroom->player_id == null && $classroom->link != null)
                                    <span class="label label-inline label-success mr-2">
                                        کلاس برگزار شده و از طریق آرشیو در دسترس است.
                                    </span>
                                    @endif
                                    @if ($classroom->player_id == null && $classroom->finished == 1 && $classroom->link
                                    == null)
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
                            <span class="label label-light-warning label-pill label-inline mr-2">شماره
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
                            <a href="{{ route('tvshow.questions', $classroom->id) }}"
                                class="btn btn-outline-warning btn-sm mr-2">
                                سوالات
                            </a>
                            @endif
                        </div>
                        <div class="card-toolbar d-flex flex-row align-items-center justify-content-around">
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
                                                    action=" {{ route('dashboard.classroom.LiveOrArchive', [$course, $classroom]) }} ">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <div class="col-md-6 col-12">
                                                            <label class="font-size-h6 font-weight-bolder text-dark">نوع
                                                                پخش
                                                                کننده</label>
                                                            <select name="player_id"
                                                                class="mb-4 form-control selectpicker" data-size="7"
                                                                data-live-search="true">
                                                                <option value="" selected>بدون پخش کننده</option>
                                                                @foreach ($players as $player)
                                                                <option value="{{ $player->id }}" @if ($classroom->
                                                                    player_id == $player->id)
                                                                    selected
                                                                    @endif>{{ $player->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <label
                                                                class="font-size-h6 font-weight-bolder text-dark">آرشیو
                                                                کردن کلاس</label>
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