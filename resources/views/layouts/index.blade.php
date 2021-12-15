@inject('basket', 'App\Support\Basket\Basket')
<!DOCTYPE html>
<!--
__________                     .__         ________               
\______   \__ _________________|  |   ____ \______ \   _______  __
 |     ___/  |  \___   /\___   /  | _/ __ \ |    |  \_/ __ \  \/ /
 |    |   |  |  //    /  /    /|  |_\  ___/ |    `   \  ___/\   / 
 |____|   |____//_____ \/_____ \____/\___  >_______  /\___  >\_/  
                      \/      \/         \/        \/     \/      

-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">

    <!-- Supporting homescreen-installed apps prior to M39 -->
    <meta name="mobile-web-app-capable" content="yes">

    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <link rel="apple-touch-icon" href="{{ asset('icon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('icon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('icon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('icon-192x192.png') }}">

    <link rel="icon" sizes="192x192" href="{{ asset('icon-192x192.png') }}">
    <link rel="shortcut icon" sizes="16x16 24x24 32x32 48x48 62x62" href="{{ asset('favicon.ico') }}">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Puzzle Studio">

    <!-- Windows 8 -->
    <meta name="msapplication-TileImage" content="{{ asset('icon-192x192.png') }}">
    <meta name="msapplication-TileColor" content="#fff">
    <meta name="theme-color" content="#3699ff">


    <meta name="description"
        content="استودیو پازل برگزارکننده کلاس های وبینار آنلاین در فضای استودیویی با جدیدترین تکنولوژی های ضبط از جمله پرده سبز و ضبط و نمایش آرشیو با کیفیت فول  " />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <!--begin::Global Theme Styles(used by all p ages)-->
    <link href="{{ mix('plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('plugins/custom/prismjs/prismjs.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ mix('css/all.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->

    @yield('css')

    <link rel="shortcut icon" href="{{ asset('media/favicon.ico') }}" />

    <!--Start imber.live Widget-->
    <script type="text/javascript">
        !(function(){window.IMBER_LANG = 'fa';var a=window,d=document;function im(){window.IMBER_ID="9q9td6y7kr3ehj6d";window.IMBER_TOKEN=localStorage.getItem("imber_token");i=document.createElement("div");i.id="imber-top-parent";x=document;s=x.createElement("script");s.src="https://widget.imber.live/imber?id="+ window.IMBER_ID +"&token=" +(window.IMBER_AUTH? "null&auth=" + JSON.stringify(window.IMBER_AUTH): window.IMBER_TOKEN);s.async=1;x.getElementsByTagName("head")[0].appendChild(s);x.getElementsByTagName("body")[0].appendChild(i);window.$imber={};}"complete"===d.readyState?im():a.attachEvent?a.attachEvent("onload",im):a.addEventListener("load",im,!1);})();
    </script>
    <!--End imber.live Widget-->

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKC2TWJ');
    </script>
    <!-- End Google Tag Manager -->
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed page-loading topbar-mobile-on" dir="rtl">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKC2TWJ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile bg-primary header-mobile-fixed ">
        <div class="container-fluid">
            <div class="row align-items-center text-center">
                <div class="col">
                    <!--begin::Logo-->
                    <a href="{{ route('home') }}">
                        <span class="svg-icon svg-icon-xl svg-icon-white">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                        </span>
                    </a>
                    <!--end::Logo-->
                </div>

                <div class="col">
                    <!--begin::My Cart-->
                    <div class="dropdown">
                        <!--begin::Toggle-->
                        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                            <div class="btn btn-icon btn-hover-transparent-light btn-dropdown btn-lg mr-1">
                                <span class="svg-icon svg-icon-xl svg-icon-white">
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
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                        </div>
                        <!--end::Toggle-->

                        <!--begin::Dropdown-->
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-xl dropdown-menu-anim-up">
                            <form>
                                <!--begin::Header-->
                                <div class="d-flex align-items-center py-10 px-8 bgi-size-cover bgi-no-repeat rounded-top"
                                    style="background-image: url({{ asset('media/bg-1.jpg') }})">
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
                                            <img src="{{ asset('storage/' . $item->photo->filePath()) }}" title=""
                                                alt="" />
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
                @guest
                <div class="col">
                    <button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                        <span class="svg-icon svg-icon-xl svg-icon-white">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg
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
                            <!--end::Svg Icon-->
                        </span> </button>
                </div>
                @endguest
                @auth
                <div class="col">
                    <button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                        <span class="svg-icon svg-icon-xl svg-icon-white">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg
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
                            <!--end::Svg Icon-->
                        </span> </button>
                </div>
                @endauth
                <div class="col">
                    <button class="btn p-0 burger-icon burger-icon-left mx-4" id="kt_header_mobile_toggle">
                        <span class=" svg-icon-white"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @include('partials.navbar')


                <!--begin::Content-->
                <div class="content pt-md-0  d-flex flex-column flex-column-fluid" id="kt_content">
                    @yield('content')

                </div>
                <!--end::Content-->
                @yield('footer')


            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg--><svg
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>
    <!--end::Scrolltop-->

    <script>
        var HOST_URL = "{{URL::to('/')}}";
    </script>
    @yield('script')
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1200
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#6993FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1E9FF",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#212121",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#ECF0F3",
                    "gray-300": "#E5EAEE",
                    "gray-400": "#D6D6E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#80808F",
                    "gray-700": "#464E5F",
                    "gray-800": "#1B283F",
                    "gray-900": "#212121"
                }
            },
            "font-family": 'IRANSansX'
        };
        @auth
            document.addEventListener("IMBER_READY", () => { 
                window.$imber.setVisitor({
                    name : "{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}",
                    phone : "{{ auth()->user()->phone }}"
                });
            });
        @endauth
    </script>

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('js/lazysizes.min.js') }}" async=""></script>

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('js/plugins.bundle.js') }}"></script>
    {{-- <script src="{{ asset('js/prismjs.bundle.js') }}"></script>
    --}}
    <script src="{{ mix('js/scripts.bundle.js') }}"></script>

    {{-- <script>
        $(window).on('load', function(){
          setTimeout(removeLoader, 200);
        });
        $('.add-loader').click(function(){
            addLoader();
        });
        function removeLoader(){
            $(".overlay-loading").fadeOut(function() {
                $(".overlay-loading").hide();
            });  
        }
        function addLoader(){
            $(".overlay-loading").fadeIn(function() {
                $(".overlay-loading").show();
            });  
        }        
    </script> --}}

    {{-- <script src="{{ mix('js/all.js') }}"></script> --}}
    <!--end::Global Theme Bundle-->

    <!--begin::Page Vendors(used by this page)-->
    <!--end::Page Vendors-->

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('js/widgets.js') }}"></script>
    <!--end::Page Scripts-->
    @yield('js')

    <!--Start hantana.org Widget-->
    <script type="text/javascript" defer>
        !(function(d,w,u,t,s,i){
        w.addEventListener('readystatechange', function(){if(w.readyState==="interactive") i = document.documentElement.scrollTop});
        function ha(){
            s = w.createElement("script");
            d._hantanaSettings={tId:t,i:i};
            s.type = "text/javascript", s.async = !0, s.src = u + t;
            h = w.getElementsByTagName('head')[0];
            h.appendChild(s);
        }
        "complete"===w.readyState?ha():d.attachEvent?d.attachEvent("onload",ha):d.addEventListener("load",ha,!1);
    })(window,document,'https://hantana.org/widget/','6095b-d73f6-06441-e45a6',0);
    </script>
    <!--End hantana.org Widget-->

</body>
<!--end::Body-->

</html>