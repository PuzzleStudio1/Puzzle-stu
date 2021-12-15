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


    <meta name="description" content="استودیو پازل برگزارکننده کلاس های وبینار آنلاین در فضای استودیویی با جدیدترین تکنولوژی های ضبط از جمله پرده سبز و ضبط و نمایش آرشیو با کیفیت فول  " />
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
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKC2TWJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper pt-0" id="kt_wrapper">
                <nav class="navbar navbar-expand-lg navbar-dark py-5 bg-dark">
                    <div class="container">
                      <a class="navbar-brand font-weight-boldest font-size-h3" href="#"><img alt="Logo" src="{{asset('media/Logo-New.svg')}}" class="h-40px" /></a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
                        <ul class="navbar-nav font-size-h5 ">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">خانه</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">خدمات پازل</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">راهنمای استفاده</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">درباره ما</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">تماس با ما</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                <!--begin::Content-->
                <div class="content pt-md-0 d-flex flex-column flex-column-fluid mt-10" id="kt_content">
                    @yield('content')
                </div>
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
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                    <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>
    <!--end::Scrolltop-->

    <script>var HOST_URL = "{{URL::to('/')}}";</script>
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