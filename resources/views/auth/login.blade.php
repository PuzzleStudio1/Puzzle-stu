@extends('layouts.login')

@section('title','پازل استودیو | ورود')

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
                    یا ثبت نام کن تا بتونی به وبینار‌ها دسترسی پیدا کنی.
                </h3>
                <!--end::Aside Title-->
            </div>
            <!--end::Aside Top-->

            <!--begin::Aside Bottom-->
            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center"
                style="background-position-y: calc(100% + 5rem); background-image: url({{ asset('media/login-visual-5.svg') }})">
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
                    <form action="{{ route('auth.login') }}" class="form" id="kt_login_singin_form" method="POST">
                        @csrf
                        <!--begin::Title-->
                        <div class="pb-5 pb-lg-05">
                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">ورود</h3>
                            <div class="text-muted font-weight-bold font-size-h4">
                                ثبت نام نکرده اید؟
                                <a href="{{ route('auth.firstRegister.form') }}" class="text-primary font-weight-bolder">ثبت
                                    نام</a>
                            </div>
                            <div class="text-muted font-weight-bold font-size-h4">
                                عضو سایت قبلی بودید؟
                                <a href="{{route('auth.firstRegisterOldUser.form')}}"
                                    class="text-primary font-weight-bolder">ثبت نام با نام کاربری</a>
                            </div>
                        </div>
                        <!--begin::Title-->

                        <div class="pb-10">
                            @include('partials.alerts')

                            @include('partials.validation-errors')
                        </div>

                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">شماره موبایل</label>
                            <input class="form-control h-auto py-7 px-6 rounded-lg border-0" placeholder="09123456789" type="text" name="phone"
                                autocomplete="off" />
                        </div>
                        <!--end::Form group-->

                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_singin_form_submit_button"
                                class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">ورود</button>
                        </div>
                        <!--end::Action-->
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
