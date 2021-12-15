@extends('layouts.admin')

@section('title', 'پازل استودیو | افزودن کاربر')

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
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
                                    <span class="card-label font-weight-bolder text-dark">افزودن کاربر</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="{{ route('users.index') }}"
                                        class="btn btn-success font-weight-bolder font-size-sm">
                                        لیست کاربران
                                    </a>
                                </div>
                            </div>
                            <!--end::Header-->
                            <div class="card-body">
                                @include('partials.alerts')
                                @include('partials.validation-errors')
                                <form method="post" action=" {{ route('admin.store.user') }} "
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">نام</label>
                                            <input type="text" name="first_name" class="form-control  " placeholder="نام" value="{{old('first_name')}}">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">نام خانوادگی</label>
                                            <input type="text" name="last_name" class="form-control "
                                                placeholder="نام خانوادگی" value="{{old('last_name')}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">تلفن همراه</label>
                                            <input type="tel" class="form-control" name="phone" placeholder="09123456789" value="{{old('phone')}}"/>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">مدرسه</label>
                                            <input type="text" class="form-control" name="school" placeholder="" value="{{old('school')}}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">پایه تحصیلی</label>
                                            <select name="grade" class="form-control selectpicker">
                                                <option value=null selected disabled>پایه تحصیلی خود را انتخاب کنید</option>
                                                <option value="10">دهم</option>
                                                <option value="11">یازدهم</option>
                                                <option value="12">دوازدهم</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">رشته</label>
                                            <select name="field_of_study" class="form-control selectpicker">
                                                <option value=null selected disabled>رشته تحصیلی خود را انتخاب کنید</option>
                                                <option value="riazi">ریاضی</option>
                                                <option value="tajrobi">تجربی</option>
                                                <option value="ensani">انسانی</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">استان سکونت</label>
                                            <select name="city" class="form-control selectpicker" data-size="7"
                                                data-live-search="true">
                                                <option value=null selected disabled>استان محل سکونت خود را انتخاب کنید
                                                </option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">آدرس</label>
                                            <textarea name="address" rows="6" class="form-control">{{old('address')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">اطلاعات</label>
                                            <textarea name="info" rows="6" class="form-control">{{old('info')}}</textarea>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label class="font-size-h6 font-weight-bolder text-dark">آپلود تصویر
                                                    پروفایل</label>
                                                <div class="custom-file mb-3">
                                                    <input type="file" name="file" class="custom-file-input" id="customFile"
                                                    >
                                                    <label class="custom-file-label" for="customFile">فایل خود را انتخاب
                                                        کنید</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="font-size-h6 font-weight-bolder text-dark">افزودن نقش به کاربر</label>
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
                                    <div class="form-group mt-5">
                                        <label class="font-size-h6 font-weight-bolder text-dark">افزودن دسترسی به
                                            کاربر</label>
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        @forelse ($permissions as $permission)
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" name='permissions[]' value="{{ $permission->name }}"
                                                    class="custom-control-input" id="{{ 'permission' . $permission->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ 'permission' . $permission->id }}">{{ $permission->persian_name }}</label>
                                            </div>
                                        @empty
                                            <p>
                                                هیچ دسترسی تعریف نشده است .
                                            </p>
                                        @endforelse
                                    </div>
                                    <div class="form-group mt-5">
                                        <input type="submit" class="btn btn-outline-success btn sm" value="ایجاد کاربر">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end::Tab Content-->
                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Content-->

@endsection
