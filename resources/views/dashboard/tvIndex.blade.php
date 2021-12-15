@extends('layouts.index')

@section('title', 'پازل استودیو | لیست سوالات')

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
                            <div class="card card-custom gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bolder text-dark">لیست کلاس های در حال
                                            برگزاری</span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--Begin::Body-->
                                <div class="card-body">
                                    <form method="post" action=" {{ route('tvshow.classroomsQuestions') }} "
                                        enctype="multipart/form-data">
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
                                        <span class="card-label font-weight-bolder text-dark">لیست کلاس های در حال
                                            برگزاری</span>
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
                                                    <td> {{ $classroom->name }} </td>

                                                    <td>
                                                        <a
                                                            href="{{ route('webinar.frontend', $classroom->course->id) }}">
                                                            {{ $classroom->course->name }}
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('tvshow.questions', $classroom->id) }}"
                                                            class="btn btn-outline-warning btn-sm mr-2">
                                                            سوالات
                                                        </a>
                                                    </td>
                                                    <td>{{ $classroom->player->name }}</td>
                                                    <td>{{ $classroom->player->help }}</td>
                                                    <td>{{ $classroom->stu_num }}</td>
                                                </tr>
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
