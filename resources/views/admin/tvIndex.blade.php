@extends('layouts.admin')

@section('title', 'پازل استودیو | لیست سوالات')

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        @include('partials.alerts')
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">لیست کلاس های در حال برگزاری</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <form method="post" action=" {{ route('tvshow.classroomsQuestions') }} " enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6 col-12">
                        <label class="font-size-h6 font-weight-bolder text-dark">کلاس</label>
                        <select name="classrooms[]" class="form-control selectpicker" multiple>
                            <option value=null selected disabled>کلاس را انتخاب کنید.</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-5">
                        <input type="submit" class="btn btn-outline-success btn w-25" value="سوالات">
                    </div>
                </form>
            </div>
            <!--end::Body-->
        </div>
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">لیست کلاس های در حال برگزاری</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">شناسه کلاس</th>
                            <th scope="col">نام کلاس</th>
                            <th scope="col">نام دوره</th>
                            <th scope="col">سوالات</th>
                            <th scope="col">پخش کننده</th>
                            <th scope="col">راهنمای پخش کننده</th>
                            <th scope="col">شماره استودیو</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($classrooms as $classroom)
                            <tr>
                                <td>{{ $classroom->id }}</td>
                                <td>
                                    <a href="{{ route('classroom.courseClassroom', $classroom->course->id) }}">
                                        {{ $classroom->name }}
                                    </a>
                                <td>
                                    <a href="{{ route('webinar.frontend', $classroom->course->id) }}">
                                        {{ $classroom->course->name }}
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('tvshow.questions', $classroom->id) }}"
                                        class="btn btn-outline-warning btn-sm mr-2">
                                        سوالات
                                    </a>
                                    <button type="button" class="btn btn-outline-success btn-sm mr-2" data-toggle="modal"
                                        data-target="#finishmodel{{ $classroom->id }}">
                                        اتمام جلسه
                                    </button>
                                </td>
                                <td>{{ $classroom->player->name }}</td>
                                <td>{{ $classroom->player->help }}</td>
                                <td>{{ $classroom->stu_num }}</td>
                            </tr>
                            <div class="modal fade" id="finishmodel{{ $classroom->id }}" tabindex="-1" role="dialog"
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
                        @empty
                            <p>
                                هیچ کلاسی در حال برگزاری نمیباشد.
                            </p>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Content-->
@endsection
