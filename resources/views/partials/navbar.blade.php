@inject('basket', 'App\Support\Basket\Basket')

<!--begin::Header-->
<div id="kt_header" class="header flex-column  header-fixed d-print-none">
    <!--begin::Top-->
    <div class="header-top bg-white">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Left-->
            <div class="d-none d-lg-flex align-items-center mr-3">
                <!--begin::Logo-->
                <a href="{{ route('home') }}" class="mr-20">
                    <img alt="Logo" src="{{asset('media/Logo-New.svg')}}" class="h-40px" />
                </a>
                <!--end::Logo-->

                <!--begin::Tab Navs(for desktop mode)-->
                <ul class="header-tabs nav align-self-end font-size-lg" role="tablist">
                    <!--begin::Item-->
                    <ul class="header-tabs nav align-self-end font-size-lg" role="tablist">
                        <!--begin::Item-->
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link py-4 px-6">
                                صفحه اصلی
                            </a>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a href="#" class="nav-link py-4 px-6 active" data-toggle="tab" data-target="#courses"
                                role="tab">
                                کلاس های درسی
                            </a>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <a href="https://exam.puzzle-stu.com/" class="nav-link py-4 px-6">
                                سامانه آزمون
                            </a>
                        </li>
                        <!--end::Item-->

                        <li class="nav-item">
                            <a href="#" class="nav-link py-4 px-6">
                                خدمات پازل
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Item-->

                </ul>
                <!--begin::Tab Navs-->
            </div>
            <!--end::Left-->

            <!--begin::Topbar-->
            <div class="topbar bg-white">

                <!--begin::Search-->
                <div class="dropdown" id="kt_quick_search_toggle">
                    <!--begin::Toggle-->
                    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                        <div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1">
                            <span class="svg-icon svg-icon-xl svg-icon-primary">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                    </div>
                    <!--end::Toggle-->
                    <!--begin::Dropdown-->
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                        <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                            <!--begin:Form-->
                            <form method="get" class="quick-search-form" action="{{ route('front.search') }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path
                                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                    </div>
                                    <input type="text" name="text" class="form-control" placeholder="جستجو..." />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                            <!--begin::Scroll-->
                            <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325"
                                data-mobile-height="200"></div>
                            <!--end::Scroll-->
                        </div>
                    </div>
                    <!--end::Dropdown-->
                </div>
                <!--end::Search-->
                @role('admin')
                <div class="dropdown">
                    <div class="topbar-item" data-offset="10px,0px">
                        <a href="{{ route('admin.dashboard') }}"
                            class="btn btn-light-skype btn-pill font-weight-bold mr-3 my-2 my-lg-0">
                            داشبورد ادمین
                        </a>
                    </div>
                </div>
                @endrole
                @guest
                <!--begin::login and signup-->
                <div class="dropdown">
                    <div class="topbar-item" data-offset="10px,0px">
                        <a href="{{ route('login') }}" class="btn btn-light-success font-weight-bold mr-3 my-2 my-lg-0">
                            ورود
                        </a>

                        <a href="{{ route('auth.firstRegister.form') }}"
                            class="btn btn-light-danger font-weight-bold mr-3 my-2 my-lg-0">
                            ثبت‌نام
                        </a>
                    </div>
                </div>
                <!--end::login and signup-->
                @endguest
                @auth
                <div class="dropdown">
                    <!--begin::Toggle-->
                    <div class="topbar-item" data-offset="10px,0px">
                        <div class="btn btn-icon btn-hover-transparent-primary btn-dropdown btn-lg mr-1">
                            <a href="{{ route('user.dashboard')}}">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\General\User.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                                    <!--end::Svg Icon--></span>
                            </a>
                        </div>
                    </div>
                </div>
                @endauth

                <!--begin::My Cart-->
                <div class="dropdown">
                    <!--begin::Toggle-->
                    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                        <div class="btn btn-icon btn-hover-transparent-primary btn-dropdown btn-lg mr-1">
                            <span class="svg-icon svg-icon-xl">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                            d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon--></span> </div>
                    </div>
                    <!--end::Toggle-->

                    <!--begin::Dropdown-->
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-xl dropdown-menu-anim-up">
                        <form>
                            <!--begin::Header-->
                            <div class="d-flex align-items-center py-10 px-8 bgi-size-cover bgi-no-repeat rounded-top"
                                style="background-image: url({{asset('media/bg-1.jpg')}})">
                                <span class="btn btn-md btn-icon bg-white-o-15 mr-4">
                                    <i class="flaticon2-shopping-cart-1 text-success"></i>
                                </span>
                                <h4 class="text-white m-0 flex-grow-1 mr-3">سبد خرید</h4>
                                @if ($basket->itemCount() != 0)
                                <button type="button" class="btn btn-success btn-sm">
                                    {{ $basket->itemCount() }} مورد
                                </button>
                                @endif
                            </div>
                            <!--end::Header-->

                            <!--begin::Scroll-->
                            <div class="scroll scroll-push" data-scroll="true" data-height="250"
                                data-mobile-height="200">
                                @if ($basket->itemCount() != 0)
                                @foreach ($basket->all() as $item)
                                <!--begin::Item-->
                                <div class="d-flex align-items-center justify-content-between p-8">
                                    <div class="d-flex flex-column mr-2">
                                        <a href="#"
                                            class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">
                                            {{ $item->name }}
                                        </a>
                                        <span class="text-muted">
                                            {{ $item->teacher->first_name . ' ' . $item->teacher->last_name }}
                                        </span>

                                    </div>
                                    <a href="{{ route('basket.remove', $item->id) }}"
                                        class="btn btn-icon btn-outline-danger btn-sm">
                                        <i class="flaticon-delete-1"></i>
                                    </a>
                                    <a href="#" class="symbol symbol-70 flex-shrink-0">
                                        <img src="{{ asset('storage/' . $item->photo->filePath()) }}" title="" alt="" />
                                    </a>
                                </div>
                                <!--end::Item-->

                                <!--begin::Separator-->
                                <div class="separator separator-solid"></div>
                                <!--end::Separator-->
                                @endforeach
                                @else
                                <p class="text-center font-weight-bold text-dark-75 font-size-lg">سبد خريد شما خالي
                                    ميباشد .</p>
                                @endif

                            </div>
                            <!--end::Scroll-->

                            <!--begin::Summary-->
                            <div class="p-8">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <span class="font-weight-bold text-muted font-size-sm mr-2">کل</span>
                                    <span
                                        class="font-weight-bolder text-dark-50 text-right">{{ number_format($basket->subTotal()) }}
                                        تومان</span>
                                </div>
                                @if ($basket->itemCount() != 0)
                                <div class="text-right">
                                    <a href="{{ route('basket.index') }}"
                                        class="btn btn-primary text-weight-bold">خرید</a>
                                </div>
                                @endif
                            </div>
                            <!--end::Summary-->
                        </form>
                    </div>
                    <!--end::Dropdown-->
                </div>
                <!--end::My Cart-->

            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Top-->

    <!--begin::Bottom-->
    <div class="header-bottom">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Header Menu Wrapper-->
            <div class="header-navs header-navs-left" id="kt_header_navs">
                <!--begin::Tab Navs(for tablet and mobile modes)-->
                <ul class="header-tabs p-5 p-lg-0 d-flex d-lg-none nav nav-bold nav-tabs" role="tablist">
                    <!--begin::Item-->
                    <li class="nav-item mr-2">
                        <a href="#" class="nav-link btn btn-clean">
                            صفحه اصلی
                        </a>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="nav-item mr-2">
                        <a href="#" class="nav-link btn btn-clean active" data-toggle="tab" data-target="#courses"
                            role="tab">
                            کلاس های درسی
                        </a>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="nav-item mr-2">
                        <a href="#" class="nav-link btn btn-clean">
                            کارآفرینی و مالی
                        </a>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="nav-item mr-2">
                        <a href="https://exam.puzzle-stu.com/" class="nav-link btn btn-clean">
                            سامانه آزمون
                        </a>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="nav-item">
                        <a href="#" class="nav-link py-4 px-6">
                            خدمات پازل
                        </a>
                    </li>
                    <!--end::Item-->

                </ul>
                <!--begin::Tab Navs-->

                <!--begin::Tab Content-->
                <div class="tab-content">
                    <!--begin::Tab Pane-->
                    <div class="tab-pane py-5 p-lg-0 show active" id="courses">
                        <!--begin::Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">
                            <!--begin::Nav-->
                            <ul class="menu-nav ">
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                                    aria-haspopup="true"><a href="javascript:;" class="menu-link menu-toggle"><span
                                            class="menu-text">رشته ریاضی - فیزیک</span><span class="menu-desc"></span><i
                                            class="menu-arrow"></i></a>
                                    <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                        <ul class="menu-subnav">
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',4)}}"
                                                    class="menu-link"><span class="menu-text">حسابان و
                                                        ریاضیات</span></a>
                                            </li>
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',5)}}"
                                                    class="menu-link"><span class="menu-text">هندسه</span></a>
                                            </li>
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',6)}}"
                                                    class="menu-link"><span class="menu-text">گسسته</span></a>
                                            </li>
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',7)}}"
                                                    class="menu-link"><span class="menu-text">فیزیک</span></a>
                                            </li>
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',8)}}"
                                                    class="menu-link"><span class="menu-text">شیمی</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                                    aria-haspopup="true"><a href="javascript:;" class="menu-link menu-toggle"><span
                                            class="menu-text">رشته علوم تجربی</span><span class="menu-desc"></span><i
                                            class="menu-arrow"></i></a>
                                    <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                        <ul class="menu-subnav">
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',9)}}"
                                                    class="menu-link"><span class="menu-text">زیست
                                                        شناسی</span></a>
                                            </li>
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',10)}}"
                                                    class="menu-link"><span class="menu-text">ریاضیات</span></a>
                                            </li>
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',11)}}"
                                                    class="menu-link"><span class="menu-text">فیزیک</span></a>
                                            </li>
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',12)}}"
                                                    class="menu-link"><span class="menu-text">شیمی</span></a>
                                            </li>
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',13)}}"
                                                    class="menu-link"><span class="menu-text">زمین
                                                        شناسی</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                                    aria-haspopup="true"><a href="javascript:;" class="menu-link menu-toggle"><span
                                            class="menu-text">دروس عمومی</span><span class="menu-desc"></span><i
                                            class="menu-arrow"></i></a>
                                    <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                        <ul class="menu-subnav">
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',14)}}"
                                                    class="menu-link"><span class="menu-text">ادبیات
                                                        فارسی</span></a>
                                            </li>
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',15)}}"
                                                    class="menu-link"><span class="menu-text">عربی</span></a>
                                            </li>
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',16)}}"
                                                    class="menu-link"><span class="menu-text">دین و
                                                        زندگی</span></a>
                                            </li>
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',17)}}"
                                                    class="menu-link"><span class="menu-text">زبان
                                                        انگلیسی</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="hover"
                                    aria-haspopup="true"><a href="javascript:;" class="menu-link menu-toggle"><span
                                            class="menu-text">سایر وبینارهای درسی</span><span
                                            class="menu-desc"></span><i class="menu-arrow"></i></a>
                                    <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                        <ul class="menu-subnav">
                                            <li class="menu-item  menu-item-submenu" data-menu-toggle="hover"
                                                aria-haspopup="true"><a href="{{route('category.frontend',19)}}"
                                                    class="menu-link"><span class="menu-text">مشاوره
                                                        کنکور</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <!--end::Nav-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--begin::Tab Pane-->
                </div>
                <!--end::Tab Content-->
            </div>
            <!--end::Header Menu Wrapper-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Bottom-->
</div>
<!--end::Header-->