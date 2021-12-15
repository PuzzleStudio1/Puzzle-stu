@extends('layouts.index')

@section('title', 'پازل استودیو | دوره های من')

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
                <div class="col-md-9">

                    <!--begin::Content-->
                    <div class="card card-custom gutter-b shadow-none">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">لیست دوره ها</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <div class="card-body">
                            @include('partials.alerts')
                            <div class="table-responsive">
                                <table class="table table-striped" id="puzzleTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">نام دوره</th>
                                            <th class="text-center">ویژگی</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td class="text-center">
                                                    <a href="{{ route('webinar.frontend', $course->id) }}">
                                                        {{ $course->name }}
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('dashboard.classroom.courseClassroom', $course->id) }}"
                                                        class="btn btn-outline-success btn-sm">
                                                        <i class="fas fa-chalkboard"></i>
                                                        لیست کلاس ها
                                                    </a>
                                                </td>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">نام دوره</th>
                                            <th class="text-center">ویژگی</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
            </div>
            <!--end::Education-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection

@section('js')
<script type=" text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js">
</script>
<script>
    $(document).ready(function() {
        $('#puzzleTable').DataTable({
            "scrollX": true,
            paging: false
        });
    });

</script>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
