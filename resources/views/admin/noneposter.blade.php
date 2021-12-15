@extends('layouts.admin')

@section('title', 'پازل استودیو | لیست دوره ها')

@section('css')

@endsection

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        <div class="card card-custom gutter-b shadow-none">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">لیست دوره ها</span>
                </h3>
                <div class="card-toolbar">
                    <a href={{ route('course.create') }}
                        class="btn btn-success font-weight-bolder font-size-sm">
                        <span class="svg-icon svg-icon-md svg-icon-white">
                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Files\Folder-plus.svg--><svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M11,13 L11,11 C11,10.4477153 11.4477153,10 12,10 C12.5522847,10 13,10.4477153 13,11 L13,13 L15,13 C15.5522847,13 16,13.4477153 16,14 C16,14.5522847 15.5522847,15 15,15 L13,15 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,15 L9,15 C8.44771525,15 8,14.5522847 8,14 C8,13.4477153 8.44771525,13 9,13 L11,13 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon--></span>
                        دوره جدید
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <form class="form px-10" action="{{route('admin.search.course')}}" method="GET">
                        <div class="form-group row">
                            <div class="col-md-8 col-6">
                                <input type="text" class="form-control" name="search"
                                    placeholder="نام دوره" />
                            </div>
                            <div class="col-md-4 col-6">
                                <input type="submit" class="btn btn-outline-success btn sm" value="جستجو" />
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            <!--end::Header-->
            <div class="card-body">
                @include('partials.alerts')
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">شناسه</th>
                                <th class="text-center">نام</th>
                                <th class="text-center">معلم</th>
                                <th class="text-center">برگزار کننده</th>
                                <th class="text-center">دسته بندی</th>
                                <th class="text-center">نوع</th>
                                <th class="text-center">وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="text-center">{{ $course->id }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('webinar.frontend', $course->id) }}">
                                            {{ $course->name }}
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $course->teacher->first_name }}
                                        {{ $course->teacher->last_name }}
                                    </td>
                                    <td class="text-center">{{ $course->institute->first_name.' '.$course->institute->last_name }}
                                    </td>
                                    <td class="text-center">
                                        @foreach ($course->categories as $category)
                                            {{ $category->name }}--
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ $course->type }}</td>
                                    <td class="text-center">{{ $course->status }}</td>
                                </tr>
                                <div class="modal fade" id="completeModel{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">اتمام دوره</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                آیا از اتمام دوره اطمینان دارید؟
                                                با تایید کردن این مرحله دانش آموزان و جزوات و کلاس های دوره حذف میشود.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">انصراف</button>
                                                <a href="{{ route('course.complete', $course->id) }}"
                                                            class="btn btn-secondary text-center">
                                                            اتمام دوره
                                                        </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="deleteModel{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">حذف دوره</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                آیا از  حذف دوره اطمینان دارید؟
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">انصراف</button>
                                                <a href="{{ route('destroy.course', $course->id) }}"
                                                    class="btn btn-danger text-center btn-sm">
                                                    حذف دوره
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
                                <th class="text-center">معلم</th>
                                <th class="text-center">برگزار کننده</th>
                                <th class="text-center">دسته بندی</th>
                                <th class="text-center">نوع</th>
                                <th class="text-center">وضعیت</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="d-flex justify-content-center align-items-center flex-wrap p-6">
                    <div class="contaier">
                        <div class="d-flex flex-wrp py-2 mr-3 text-center">
                            {{ $courses->links() }}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!--end::Content-->

@endsection

@section('js')

@endsection
