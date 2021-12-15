@extends('layouts.login')

@section('title')
    پازل استودیو | ورود
@endsection

@section('content')

    <!--begin::Login-->
    <div class="login login-3 wizard d-flex flex-column flex-lg-row flex-column-fluid d-flex flex-md-row flex-column-reverse">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-column flex-row-auto">
            <!--begin::Aside Top-->
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <!--begin::Aside header-->
                <a href="{{ route('home') }}" class="login-logo text-center pt-lg-25 pb-10">
                    <img src="{{asset('media/Logo-New.svg')}}" class="max-h-70px" alt="" />
                </a>
                <!--end::Aside header-->

                <!--begin::Aside Title-->
                <h3 class="font-weight-bolder text-center font-size-h4 text-dark-50 line-height-xl">
                    به پازل خوش‌آمدی. اطلاعات کاربریت رو وارد کن<br>
                    یا ثبت نام کن تا بتونی به وبینار‌ها دسترسی پیدا کنی.‌
                </h3>
                <!--end::Aside Title-->
            </div>
            <!--end::Aside Top-->

            <!--begin::Aside Bottom-->
            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center"
        style="background-position-y: calc(100% + 5rem); background-image: url({{ asset('media/login-visual-5.svg') }})"}})">
            </div>
            <!--end::Aside Bottom-->
        </div>
        <!--begin::Aside-->

        <!--begin::Content-->
        <div class="login-content flex-row-fluid d-flex flex-column p-10">
            <!--begin::Top-->
            <div class="text-right d-flex justify-content-center">
                <div class="top-signin text-right d-flex justify-content-end pt-5 pb-lg-0 pb-10">
                    <span class="font-weight-bold text-muted font-size-h4">بازگشت به </span>
                    <a href="{{ route('home') }}" class="font-weight-bold text-primary font-size-h4 ml-2"
                        id="kt_login_signup">صفحه اصلی</a>
                </div>
            </div>
            <!--end::Top-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-row-fluid flex-center">
                <!--begin::Signin-->
                <div class="login-form">
                    <!--begin::Form-->
                    <form method="POST" action="{{route('auth.login.code')}}" class="form" novalidate="novalidate"
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

                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">کد تایید</label>
                                <input type="text" class="form-control h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                    name="code" placeholder="" value="" />
                            </div>
                        </div>
                        <input type="submit" value="ورود"
                            class="h-auto py-5 px-6 border-0 rounded-lg font-size-h6 w-25 bg-success text-light">

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
