@extends('layouts.admin')

@section('title', 'پازل استودیو | لیست دانش آموز ها')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
@endsection

@section('content')
<!--begin::Content-->
<div class="flex-row-fluid">
    @include('partials.alerts')
    @include('partials.validation-errors')

    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start">
                <span class="card-label font-weight-bolder text-dark">ثبت نام کد در کلاس</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--Begin::Body-->
        <div class="card-body">
            <form method="post" action="{{ route('course.courseCodeCreateAdmin', $course->id) }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6 col-12">
                        <label class="font-size-h6 font-weight-bolder text-dark">اطلاعات کد ها</label>
                        <textarea name="newCodes" rows="10" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="alert  alert-custom alert-secondary" role="alert">
                            <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
                            <div class="alert-text">
                                برای وارد کردن کد لازم است در هر خط تنها یک کد ۱۶ رقمی مانند شماره کارت همراه با خط
                                فاصله وارد کنید <br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 col-12">
                        <input type="submit" class="btn btn-outline-success btn sm w-100" value="افزودن">
                    </div>
                </div>
            </form>
        </div>
        <!--end::Body-->
    </div>
    <div class="card card-custom gutter-b">
        <!--Begin::Body-->
        <div class="card-body p-2">
            <div class="tab-content pt-5">
                <!--begin::Tab Content-->
                <div class="tab-pane active">

                    <div class="card card-custom gutter-b shadow-none">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label text-dark">لیست کد های دوره
                                    <span class="font-weight-bolder">{{ $course->name }}</span></span>
                            </h3>
                            <div class="card-toolbar">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAll">
                                    <i class="far fa-trash-alt"></i>حذف کد ها
                                </button>
                            </div>
                        </div>
                        <!--end::Header-->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="puzzleTable" class="table table-hover display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">کد دسترسی</th>
                                            <th class="text-center">وضعیت</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($codes as $code)
                                        <tr>
                                            <td class="text-center">{{ $code->code }}</td>
                                            <td class="text-center">@if(isset($code->user_id))
                                                {{$code->user->first_name . ' ' . $code->user->last_name}} @else ندارد
                                                @endif</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">کد دسترسی</th>
                                            <th class="text-center">وضعیت</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="modal fade" id="deleteAll" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">حذف همه کد های دوره
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                آیا از حذف همه کد های دوره اطمینان دارید؟
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                                    data-dismiss="modal">انصراف</button>
                                                <a href="{{ route('course.deleteCode',$course->id) }}"
                                                    class="btn btn-light-danger font-weight-bold mr-2">
                                                    حذف کد ها
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Tab Content-->
            </div>
        </div>
        <!--end::Body-->
    </div>
</div>
<!--end::Content-->

@endsection

@section('js')
<script type=" text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js">
</script>
<script>
    $(document).ready(function() {
            $('#puzzleTable').DataTable({
                "scrollX": true
            });
        });

</script>
@endsection