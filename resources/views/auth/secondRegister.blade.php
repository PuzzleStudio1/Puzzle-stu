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
                    <img src="{{asset('media/Logo-New.svg')}}" class="max-h-70px" alt="" />
                </a>
                <!--end::Aside header-->

                <!--begin: Wizard Nav-->
                <div class="wizard-nav pt-5 pt-lg-30">
                    <!--begin::Wizard Steps-->
                    <div class="wizard-steps">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-step" data-wizard-state="done">
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
                        <div class="wizard-step" data-wizard-state="current">
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
                        <div class="wizard-step">
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
                style="background-position-y: calc(100% + 3rem); background-image: url({{asset('media/features.svg')}})">
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
                    <a href="{{ route('home') }}" class="font-weight-bolder text-primary font-size-h4 ml-2"
                        id="kt_login_signup">صفحه اصلی</a>

                </div>
            </div>
            <!--end::Top-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-row-fluid flex-center">
                <!--begin::Signin-->
                <div class="login-form login-form-signup">
                    <!--begin::Form-->
                    <form method="POST" action="{{route('auth.secondRegister')}}" class="form" novalidate="novalidate"
                    id="kt_login_signup_form">
                        @csrf
                        <div class="pb-5">
                            <!--begin::Title-->
                            <div class="pt-lg-0 pt-5 pb-15">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">تایید شماره تلفن
                                </h3>
                                <div class="text-muted font-weight-bold font-size-h4">
                                    پیامکی دریافت نکردید؟
                                    <a href="{{route('auth.two.factor.resent')}}" class="text-primary font-weight-bolder">ارسال دوباره پیامک</a>
                                </div>
                            </div>
                            <div class="pb-10">
                                @include('partials.alerts')

                                @include('partials.validation-errors')
                            </div>
                            <!--begin::Title-->

                            <div class="form-group row">

                                    <label class="font-size-h6 font-weight-bolder text-dark">کد تایید</label>
                                    <input type="text" class="form-control h-auto py-5 px-6 border-0 rounded-lg font-size-h6"
                                        name="code" placeholder="" value="" />
                            </div>
                        </div>
                        <div class="row">

                            <input type="submit" value="ارسال"
                                class="h-auto py-5 px-6 border-0 rounded-lg font-size-h6 w-25 bg-success text-light">
                        </div>

                    </form>
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