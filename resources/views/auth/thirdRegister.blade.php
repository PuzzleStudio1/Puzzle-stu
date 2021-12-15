@extends('layouts.login')

@section('title', 'پازل استودیو | ثبت نام')

@section('content')
    <!--begin::Login-->
    <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid wizard d-flex flex-md-row flex-column-reverse" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-column flex-row-auto">
            <!--begin::Aside Top-->
            <div class="d-flex flex-column-auto flex-column pt-15 px-30">
                <!--begin::Aside header-->
                <a href="{{ route('home') }}" class="login-logo py-6">
                    <img src="{{ asset('media/Logo-New.svg') }}" class="max-h-70px" alt="" />
                </a>
                <!--end::Aside header-->

                <!--begin: Wizard Nav-->
                <div class="wizard-nav pt-5 pt-lg-30">
                    <!--begin::Wizard Steps-->
                    <div class="wizard-steps">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="done">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <i class="wizard-check ki ki-check"></i>
                                    <span class="wizard-number">1</span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        حساب کاربری
                                    </h3>
                                    <div class="wizard-desc">
                                        نام ،نام خانوادگی و شماره تلفن همراه خود را وارد نمایید.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->

                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="done">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <i class="wizard-check ki ki-check"></i>
                                    <span class="wizard-number">2</span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        احراز هویت
                                    </h3>
                                    <div class="wizard-desc">
                                        کد ارسال شده از طریق پیامک را وارد نمایید.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 2 Nav-->

                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <i class="wizard-check ki ki-check"></i>
                                    <span class="wizard-number">3</span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        تکمیل اطلاعات
                                    </h3>
                                    <div class="wizard-desc">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 3 Nav-->

                    </div>
                    <!--end::Wizard Steps-->
                </div>
                <!--end: Wizard Nav-->
            </div>
            <!--end::Aside Top-->

            <!--begin::Aside Bottom-->
            <div class="aside-img-wizard d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center pt-2 pt-lg-5"
                style="background-position-y: calc(100% + 3rem); background-image: url({{ asset('media/features.svg') }})">
            </div>
            <!--end::Aside Bottom-->
        </div>
        <!--begin::Aside-->

        <!--begin::Content-->
        <div class="login-content flex-column-fluid d-flex flex-column p-10">
            <!--begin::Top-->
            <div class="text-right d-flex justify-content-center">
                <div class="top-signup text-right d-flex justify-content-end pt-5 pb-lg-0 pb-10">
                    <span class="font-weight-bold text-muted font-size-h4">مشکلی دارید؟</span>
                    <a href="javascript:;" class="font-weight-bolder text-primary font-size-h4 ml-2"
                        id="kt_login_signup">راهنما</a>

                </div>
            </div>
            <!--end::Top-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-row-fluid flex-center">
                <!--begin::Signin-->
                <div class="login-form login-form-signup">
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('auth.thirdRegister') }}" class="form"
                        enctype="multipart/form-data">
                        @csrf
                        <!--begin: Wizard Step 3-->
                        <div class="pb-5">
                            <!--begin::Title-->
                            <div class="pt-lg-0 pt-5 pb-15">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">تکمیل اطلاعات</h3>
                                <div class="text-muted font-weight-bold font-size-h4">
                                    پر کردن این بخش اختیاری میباشد
                                </div>
                            </div>
                            <!--end::Title-->
                            <div class="form-group row">
                                <div class="col-md-6 col-12" id="app">
                                    <label class="font-size-h6 font-weight-bolder text-dark">تاریخ  تولد :</label>
                                    <puzzle-date-picker v-model="date" name="datepick" required autofocus></puzzle-date-picker>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">آپلود تصویر
                                            پروفایل :</label>
                                        <div class="custom-file mb-3">
                                            <input type="file" name="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">فایل خود را انتخاب
                                                کنید</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">استان سکونت :</label>
                                    <select name="city" class="form-control " id="kt_select2_1" name="param">
                                        <option value=null selected disabled>استان محل سکونت خود را انتخاب کنید
                                        </option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">درباره من :</label>
                                    <textarea name="info" rows="6" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="font-size-h6 font-weight-bolder text-dark">آدرس :</label>
                                    <textarea name="address" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row d-flex flex-row justify-content-between">
                                    <input type="submit" value="ثبت نام"
                                        class="h-auto py-5 px-6 border-0 rounded-lg font-size-h6 bg-success text-light">
                                    <input type="submit" value="رد کردن این مرحله"
                                        class="h-auto py-5 px-6 border-0 rounded-lg font-size-h6 bg-secondary">
                            </div>
                    </form>
                </div>
                <!--end: Wizard Step 3-->
                <!--end::Form-->
            </div>
            <!--end::Signin-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
    </div>
    <!--end::Login-->
@endsection

@section('script')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
@endsection