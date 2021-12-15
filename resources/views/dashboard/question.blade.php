@extends('layouts.index')

@section('title', 'پازل استودیو | سوالات کلاس')

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
                                                <th scope="col">سوال</th>
                                                <th scope="col">تاريخ و زمان</th>
                                                <th scope="col">عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($questions as $question)
                                                <tr>
                                                    @if ($question->user_id != null)
                                                        <td> {{ $question->user->first_name . ' ' . $question->user->last_name }}
                                                        </td>
                                                    @else
                                                        <td> {{ $question->name }} </td>
                                                    @endif
                                                    <td> {{ $question->text }} </td>
                                                    <td> {{ $question->created_at }} </td>
                                                    <td>
                                                        @role('institute')
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#deleteModel{{ $question->id }}">
                                                            <i class="flaticon-delete-1"></i> حذف
                                                        </button>
                                                        @endrole
                                                    </td>
                                                </tr>
                                                @role('institute')
                                                <div class="modal fade" id="deleteModel{{ $question->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">حذف دوره</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                آیا از حذف سوال اطمینان دارید؟
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-light-primary font-weight-bold"
                                                                    data-dismiss="modal">انصراف</button>
                                                                <a href="{{ route('institute.question.destroy', $question->id) }}"
                                                                    class="btn btn-danger text-center btn-sm">
                                                                    حذف سوال
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endrole
                                            @empty
                                                <p>
                                                    هیچ سوالی برای نمایش وجود ندارد.
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