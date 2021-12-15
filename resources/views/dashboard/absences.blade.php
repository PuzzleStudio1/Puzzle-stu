@extends('layouts.index')

@section('title', 'پازل استودیو | حضور غیاب')

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
                                <div class="card-body table-responsive">
                                    <table class="table table-striped" id="puzzleTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">نام کاربر</th>
                                                <th scope="col">شماره موبایل</th>
                                                <th scope="col">مدت زمان حضور(دقیقه)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($students as $student)
                                                <tr>
                                                    <td> {{ $student->first_name.' '.$student->last_name }} </td>
                                                    <td> {{ $student->phone }} </td>
                                                    <td> {{ $student->absenceDuration}} </td>
                                                </tr>
                                            @empty
                                                <p>
                                                    هیچ داده ای برای نمایش وجود ندارد.
                                                </p>
                                            @endforelse
                                        </tbody>
                                    </table>
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

@section('js')
<script type=" text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/datatables.min.js"></script>
<script type=" text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type=" text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script type=" text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type=" text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type=" text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type=" text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type=" text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#puzzleTable').DataTable({
            "scrollX": true,
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });
    });

</script>
@endsection

@section('footer')
    @include('partials.footer')
@endsection