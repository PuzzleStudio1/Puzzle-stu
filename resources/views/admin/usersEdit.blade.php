@extends('layouts.admin')

@section('title','پازل استودیو | ویرایش کاربر')

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        <div class="card card-custom gutter-b shadow-none">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">ویرایش کاربر</span>
                </h3>
                <div class="card-toolbar">
                    <a href={{route('users.index')}}
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
                        لیست کاربران
                    </a>
                </div>
            </div>
            <!--end::Header-->
            <div class="card-body">
                @include('partials.alerts')
                @include('partials.validation-errors')
                <form method="post" action=" {{ route('users.update',$user->id) }} "
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">نام</label>
                        <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}" placeholder="نام">
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">نام خانوادگی</label>
                            <input type="text" name="last_name" class="form-control "
                        placeholder="نام خانوادگی" value="{{$user->last_name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">تلفن همراه</label>
                        <input type="tel" value="{{$user->phone}}" class="form-control" name="phone" placeholder="09123456789" />
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">مدرسه</label>
                        <input type="text" value="{{$user->school}}" class="form-control" name="school" placeholder="" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">پایه تحصیلی</label>
                            <select name="grade" class="form-control selectpicker">
                                <option value=null selected disabled>پایه تحصیلی خود را انتخاب کنید</option>
                                <option value="10" @if ($user->grade == 10)selected @endif>دهم</option>
                                <option value="11" @if ($user->grade == 11)selected @endif>یازدهم</option>
                                <option value="12" @if ($user->grade == 12)selected @endif>دوازدهم</option>
                            </select>
                            
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">رشته</label>
                            <select name="field_of_study" class="form-control selectpicker">
                                <option value=null selected disabled>رشته تحصیلی خود را انتخاب کنید</option>
                                <option value="riazi" @if ($user->field_of_study == 'riazi')selected @endif>ریاضی</option>
                                <option value="tajrobi" @if ($user->field_of_study == 'tajrobi')selected @endif>تجربی</option>
                                <option value="ensani" @if ($user->field_of_study == 'ensani')selected @endif>انسانی</option>
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
                                    <option value="{{ $city->id }}" @if ($user->city_id == $city->id)selected @endif>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">آدرس</label>
                        <textarea name="address" rows="6" class="form-control">{{$user->address}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">اطلاعات</label>
                            <textarea name="info" rows="6" class="form-control">{{$user->info}}</textarea>
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
                                @empty(!$user->photo)
                                    <img src="{{ asset('storage/' . $user->photo->filePath()) }}" alt="" class="img-thumbnail">
                                @endempty
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
                                    class="custom-control-input" id="{{ 'role' . $role->id }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                    for="{{ 'role' . $role->id }}" >{{ $role->persian_name }}</label>
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
                                    class="custom-control-input" id="{{ 'permission' . $permission->id }}" {{ $user->hasPermission($permission) ? 'checked' : '' }}>
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
                        <input type="submit" class="btn btn-outline-success btn sm" value="ویرایش">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Content-->

@endsection