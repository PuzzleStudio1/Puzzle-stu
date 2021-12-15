@extends('layouts.index')

@section('title', 'پازل استودیو | جزوات دوره')

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
                            @include('partials.validation-errors')
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title align-items-start">
                                        <span class="card-label font-weight-bolder text-dark">افزودن جزوه</span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--Begin::Body-->
                                <div class="card-body">
                                    <form method="post" action="{{ route('teacher.institute.booklet.store',$course->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="font-size-h6 font-weight-bolder text-dark">نام</label>
                                                <input type="text" name="name" class="form-control  " placeholder="نام" value="{{old('name')}}">
                                            </div>
                                            <div class="col-6">
                                                <label class="font-size-h6 font-weight-bolder text-dark">نوع</label>
                                                <select name="type" class="form-control selectpicker">
                                                    <option value=null selected disabled>لطفا نوع را انتخاب کنید
                                                    </option>
                                                    <option value="Homework">تکلیف</option>
                                                    <option value="Answer">پاسخنامه</option>
                                                    <option value="Handout">جزوه</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="font-size-h6 font-weight-bolder text-dark">توضیحات جزوه</label>
                                                <textarea name="description" rows="5" class="form-control">{{old('description')}}</textarea>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="font-size-h6 font-weight-bolder text-dark">آپلود فایل</label>
                                                    <div class="custom-file mb-3">
                                                        <input type="file" name="file" class="custom-file-input" id="customFile">
                                                        <label class="custom-file-label" for="customFile">فایل خود را انتخاب کنید</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="is-private" name="is-private">
                                                        <label class="custom-control-label" for="is-private">به صورت خصوصی آپلود شود</label>
                                                    </div>
                                                </div>
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
                                        <span class="card-label font-weight-bolder text-dark">لیست جزوات</span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <div class="table-responsive">
                                        <table id="puzzleTable" class="table table-hover display nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">شناسه</th>
                                                    <th class="text-center">نام</th>
                                                    <th class="text-center">توضیحات</th>
                                                    <th class="text-center">دوره</th>
                                                    <th class="text-center">نوع</th>
                                                    <th class="text-center">نام</th>
                                                    <th class="text-center">عملیات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($booklets as $booklet)
                                                    <tr>
                                                        <td class="text-center">{{ $booklet->id }}</td>
                                                        <td class="text-center">{{ $booklet->name }}</td>
                                                        <td class="text-center">{{ $booklet->description }}</td>
                                                        <td class="text-center">{{ $booklet->course->name }}</td>
                                                        <td class="text-center">{{ $booklet->type }}</td>
                                                        <td class="text-center">{{ $booklet->file->name }}</td>
                                                        <td class="text-center d-flex">
                                                            <button type="button" class="btn btn-icon btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteModel{{$booklet->id}}">
                                                                <i class="flaticon-delete-1"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="deleteModel{{$booklet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">حذف جزوه</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    آیا از  حذف جزوه اطمینان دارید؟
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">انصراف</button>
                                                                    <a href="{{ route('teacher.institute.booklet.destroy', $booklet->id) }}"
                                                                        class="btn btn-danger text-center btn-sm">
                                                                        حذف جزوه
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-center">شناسه</th>
                                                    <th class="text-center">نام</th>
                                                    <th class="text-center">توضیحات</th>
                                                    <th class="text-center">دوره</th>
                                                    <th class="text-center">نوع</th>
                                                    <th class="text-center">نام</th>
                                                    <th class="text-center">عملیات</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
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
