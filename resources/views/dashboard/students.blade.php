@extends('layouts.index')

@section('title', 'پازل استودیو | دانش آموزان دوره')

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
                            @if ($course->institute_id == auth()->user()->id)
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title align-items-start">
                                        <span class="card-label font-weight-bolder text-dark">اضافه کردن دانش آموز به کلاس از طریق فایل اکسل</span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--Begin::Body-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <form action="{{ route('teacher.institute.course.importUser',$course->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="custom-file mb-3">
                                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">فایل خود را انتخاب
                                                        کنید</label>
                                                </div>
                                                <div class="form-group mt-5">
                                                    <input type="submit" class="btn btn-outline-success btn w-25" value="آپلود فایل">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="alert  alert-custom alert-light-warning" role="alert">
                                                <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
                                                <div class="alert-text">
                                                    <a href="{{ route('file.show', 2) }}" class="text-warning">دریافت نمونه فایل اکسل</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title align-items-start">
                                        <span class="card-label font-weight-bolder text-dark">ثبت نام دانش آموز در
                                            کلاس</span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--Begin::Body-->
                                <div class="card-body">
                                    <form method="post" action="{{ route('institute.courseStudentCreate', [$course->id]) }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="font-size-h6 font-weight-bolder text-dark">اطلاعات دانش
                                                    آموز</label>
                                                <textarea name="newUsers" rows="10" class="form-control" required></textarea>
                                            </div>
                                            <div class="col-6">
                                                <div class="alert  alert-custom alert-secondary" role="alert">
                                                    <div class="alert-icon"><i
                                                            class="flaticon-questions-circular-button"></i></div>
                                                    <div class="alert-text">
                                                        برای وارد کردن دانش آموز لازم است که از الگوی زیر پیروی کنید
                                                        <br><br>
                                                        <b>نام|نام خانوادگی|شماره تلفن</b><br><br>
                                                        برای مثال:<br>
                                                        <b>علی|امیری|09123456789</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-3">
                                                <input type="submit" class="btn btn-outline-success btn sm w-100"
                                                    value="افزودن">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--end::Body-->
                            </div>
                            @endif
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
                                                        <span class="card-label font-weight-bolder text-dark">لیست دانش آموز
                                                            های
                                                            {{ $course->name }}</span>
                                                    </h3>
                                                    <div class="card-toolbar">
                                                        {{-- <a href="{{ route('course.courseStudent',$course->id) }}" class="btn btn-light-primary font-weight-bold mr-2">
                                                            <i class="la la-file-excel"></i>خروجی اکسل
                                                        </a> --}}
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAll">
                                                            <i class="far fa-trash-alt"></i>حذف دانش آموزان
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--end::Header-->
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="puzzleTable" class="table table-hover display nowrap"
                                                            style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">نام</th>
                                                                    <th class="text-center">نام خانوادگی</th>
                                                                    <th class="text-center">شماره تلفن</th>
                                                                    @can('import user to course')
                                                                        <th class="text-center">عملیات</th>
                                                                    @endcan
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($course->users as $user)
                                                                    <tr>
                                                                        <td class="text-center">{{ $user->first_name }}</td>
                                                                        <td class="text-center">{{ $user->last_name }}</td>
                                                                        <td class="text-center">{{ $user->phone }}</td>
                                                                        @can('import user to course')
                                                                            <td class="text-center d-flex">
                                                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModel{{$user->id}}">
                                                                                    <i class="far fa-trash-alt"></i>
                                                                                </button>
                                                                            </td>
                                                                        @endcan
                                                                    </tr>
                                                                    <div class="modal fade" id="deleteModel{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">حذف دوره</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    آیا از  حذف دانش آموز اطمینان دارید؟
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">انصراف</button>
                                                                                    <a href="{{ route('institute.courseStudentDelete', [$course->id, $user->id]) }}"
                                                                                        class="btn btn-outline-danger">
                                                                                        <i class="flaticon-delete-1"></i> حذف
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th class="text-center">نام</th>
                                                                    <th class="text-center">نام خانوادگی</th>
                                                                    <th class="text-center">شماره تلفن</th>
                                                                    @can('import user to course')
                                                                        <th class="text-center">عملیات</th>
                                                                    @endcan
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                        <div class="modal fade" id="deleteAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">حذف همه دانش آموزان دوره</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        آیا از  حذف همه دانش آموزان دوره اطمینان دارید؟
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">انصراف</button>
                                                                        {{-- <a href="{{ route('course.courseStudentDeleteAdmin', [$course->id, $user->id]) }}"
                                                                            class="btn btn-outline-danger">
                                                                            <i class="flaticon-delete-1"></i> حذف
                                                                        </a> --}}
                                                                        <a href="{{ route('course.deleteStudent',$course->id) }}" class="btn btn-light-danger font-weight-bold mr-2">
                                                                            حذف دانش آموزان
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
