@extends('layouts.index')

@section('title', 'پازل استودیو | داشبورد')

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
                    @include('partials.alerts')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-custom gutter-b shadow-none">
                                <!--begin::Header-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bolder text-dark">ویرایش کاربری</span>
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <div class="card-body">
                                    <form method="post" action=" {{ route('user.dashboard.update',auth()->user()) }} "
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12">
                                                <label class="font-size-h6 font-weight-bolder text-dark">نام</label>
                                            <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}" disabled>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label class="font-size-h6 font-weight-bolder text-dark">نام خانوادگی</label>
                                                <input type="text" name="last_name" class="form-control " value="{{$user->last_name}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12">
                                                <label class="font-size-h6 font-weight-bolder text-dark">تلفن همراه</label>
                                            <input type="tel" value="{{$user->phone}}" class="form-control" name="phone" disabled>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label class="font-size-h6 font-weight-bolder text-dark">مدرسه</label>
                                            <input type="text" value="{{$user->school}}" class="form-control" name="school" placeholder=""/>
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
                                        <div class="form-group mt-5">
                                            <input type="submit" class="btn btn-outline-success btn sm w-100" value="ویرایش">
                                        </div>
                                    </form>
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

@section('footer')
    @include('partials.footer')
@endsection
