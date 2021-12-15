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
                    <span class="card-label font-weight-bolder text-dark">لیست سوالات</span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{ route('course.index') }}" class="btn btn-success font-weight-bolder font-size-sm">
                        لیست دوره ها
                    </a>
                </div>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
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
                                    <td> {{ $question->user->first_name . ' ' . $question->user->last_name }} </td>
                                @else
                                    <td> {{ $question->name }} </td>
                                @endif
                                <td> {{ $question->text }} </td>
                                <td> {{ $question->created_at }} </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModel{{ $question->id }}">
                                        <i class="flaticon-delete-1"></i> حذف
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModel{{ $question->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">حذف دوره</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            آیا از حذف سوال اطمینان دارید؟
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-primary font-weight-bold"
                                                data-dismiss="modal">انصراف</button>
                                            <a href="{{ route('question.destroy', $question->id) }}"
                                                class="btn btn-danger text-center btn-sm">
                                                حذف سوال
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>
                                هیچ سوالی برای نمایش وجود ندارد.
                            </p>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center align-items-center flex-wrap p-6">
                <div class="contaier">
                    <div class="d-flex flex-wrp py-2 mr-3 text-center">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Content-->
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
            paging: false
        });
    });

</script>
@endsection
