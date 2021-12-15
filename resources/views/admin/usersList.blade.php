@extends('layouts.admin')

@section('title', 'پازل استودیو | لیست کاربران')

@section('content')
<!--begin::Content-->
<div class="flex-row-fluid">
    @include('partials.alerts')
    @include('partials.validation-errors')
    <div class="card card-custom gutter-b shadow-none">
        <!--begin::Header-->
        <div class="card-header border-0 py-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">لیست کاربران</span>
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('admin.userExcel')}}" class="btn btn-light-primary font-weight-bold mr-2">
                    <i class="la la-file-excel"></i>خروجی اکسل
                </a>
                <a href={{ route('admin.create.user') }} class="btn btn-success font-weight-bolder font-size-sm">
                    <span class="svg-icon svg-icon-md svg-icon-white">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Files\Folder-plus.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
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
                    کاربر جدید
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <form class="form px-10" action="{{route('admin.search.user')}}" method="GET">
                    <div class="form-group row">
                        <div class="col-md-8 col-6">
                            <input type="text" class="form-control" name="search"
                                placeholder="نام ، نام خانوادگی ،شماره تلفن" />
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

            <!--begin: Datatable-->
            <div class="table-responsive">
                <table class="table dataTable table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">اطلاعات کاربری</th>
                            <th class="text-center">نقش</th>
                            <th class="text-center">عملیات</th>
                            <th class="text-center">مدرسه</th>
                            <th class="text-center">پایه</th>
                            <th class="text-center">رشته</th>
                            <th class="text-center">شهر</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center faNum">{{ $user->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @empty ($user->photo)
                                    <div class="symbol symbol-40 symbol-light-primary flex-shrink-0">
                                        <span
                                            class="symbol-label font-size-sm font-weight-bold">{{ ucfirst($user->first_name) }}</span>
                                    </div>
                                    @endempty
                                    @empty (!$user->photo)
                                    <div class="symbol symbol-40 flex-shrink-0">
                                        <img alt="Pic" src="{{ asset('storage/' . $user->photo->filePath()) }}" />
                                    </div>
                                    @endempty
                                    <div class="ml-4">
                                        <div class="text-dark-75 font-weight-bolder font-size-md mb-0">
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </div> <a href="#"
                                            class="text-muted font-weight-bold font-size-sm text-hover-primary faNum">{{ $user->phone }}</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                @foreach ($user->roles as $role)
                                <span
                                    class="label label-light-primary label-pill label-inline mr-2">{{ $role->persian_name }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="btn btn-success text-center btn-icon btn-circle mr-1">
                                    <span class="svg-icon svg-icon-md svg-icon-white" data-container="body"
                                        data-toggle="tooltip" data-placement="top" title="ویرایش کاربر">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/General/Settings-2.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                                <a href="{{ route('users.LoginAs', $user->id) }}"
                                    class="btn btn-info text-center btn-icon btn-circle mr-1">
                                    <span class="svg-icon svg-icon-md svg-icon-white" data-container="body"
                                        data-toggle="tooltip" data-placement="top" title="ویرایش کاربر">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-06-223557/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                                <button type="button" class="btn btn-danger btn-icon btn-circle mr-1"
                                    data-toggle="modal" data-target="#deleteModel{{$user->id}}">
                                    <span class="svg-icon svg-icon svg-icon-white" data-container="body"
                                        data-toggle="tooltip" data-placement="top" title="حذف کاربر">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-19-122603/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <path
                                                    d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </button>
                            </td>
                            <td class="text-center">{{ $user->school }}</td>
                            <td class="text-center">{{ $user->grade }}</td>
                            <td class="text-center">{{ $user->field_of_study }}</td>
                            <td class="text-center">{{ $user->city->name ?? '' }}</td>
                        </tr>
                        <div class="modal fade" id="deleteModel{{$user->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">حذف کابر</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        آیا از حذف کاربر اطمینان دارید؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold"
                                            data-dismiss="modal">انصراف</button>
                                        <a href="{{ route('users.destroy', [$user->id]) }}"
                                            class="btn btn-danger text-center btn-sm">
                                            حذف کاربر
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center align-items-center flex-wrap p-6">
                <div class="contaier">
                    <div class="d-flex flex-wrp py-2 mr-3 text-center">
                        @if ( isset($_GET['search']) && $_GET['search'] != 'معلم')
                        @isset($_GET['search'])
                        {{ $users->appends(['search' => $_GET['search']])->links() }}
                        @endisset
                        @else
                        {{ $users->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-custom gutter-b shadow-none">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <form action="{{ route('admin.importAdminUser') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label class="font-size-h6 font-weight-bolder text-dark">افزودن کاربر با اکسل</label>
                            <hr>
                        </div>
                        <div class="form-group">
                            @forelse ($roles as $role)
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name='roles[]' value="{{ $role->name }}"
                                    class="custom-control-input" id="{{ 'role' . $role->id }}">
                                <label class="custom-control-label"
                                    for="{{ 'role' . $role->id }}">{{ $role->persian_name }}</label>
                            </div>
                            @empty
                            <p>
                                هیچ نقشی تعریف نشده است.
                            </p>
                            @endforelse
                        </div>
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
            </div>
        </div>
    </div>
    <div class="card card-custom gutter-b shadow-none">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <form action="{{ route('admin.importOldUser') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label class="font-size-h6 font-weight-bolder text-dark">افزودن کاربرای قدیمی</label>
                            <hr>
                        </div>
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
            </div>
        </div>
    </div>
</div>
<!--end::Content-->

@endsection