<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="ورود به حساب کاربری" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('css/login-3.rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->

    @yield('css')
    <!--begin::Global Theme Styles(used by all pages)-->
    {{-- <link href="{{ asset('css/plugins.bundle.css')}}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('css/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('css/style.bundle.rtl.min.css')}}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/main.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/all.css')}}">
    <!--end::Global Theme Styles-->

    <!--Start imber.live Widget-->
    <script type="text/javascript">
        !(function(){window.IMBER_LANG = 'fa';var a=window,d=document;function im(){window.IMBER_ID="9q9td6y7kr3ehj6d";window.IMBER_TOKEN=localStorage.getItem("imber_token");i=document.createElement("div");i.id="imber-top-parent";x=document;s=x.createElement("script");s.src="https://widget.imber.live/imber?id="+ window.IMBER_ID +"&token=" +(window.IMBER_AUTH? "null&auth=" + JSON.stringify(window.IMBER_AUTH): window.IMBER_TOKEN);s.async=1;x.getElementsByTagName("head")[0].appendChild(s);x.getElementsByTagName("body")[0].appendChild(i);window.$imber={};}"complete"===d.readyState?im():a.attachEvent?a.attachEvent("onload",im):a.addEventListener("load",im,!1);})();
    </script>
    <!--End imber.live Widget-->

    <link rel="shortcut icon" href="{{ asset('media/favicon.ico')}}" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading" dir="rtl">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        @yield('content')
        
    </div>
    <!--end::Main-->

    <script>var HOST_URL = "{{URL::to('/')}}";</script>
    <!--begin::Global Config(global config for global JS scripts)-->
    @yield('script')
    
    <!--end::Global Config-->
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
            "font-family": "IRANSansX"
        };
    </script>
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="{{ asset('js/lazysizes.min.js') }}" async=""></script>
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('js/plugins.bundle.js')}}"></script>
    {{-- <script src="{{ asset('js/prismjs.bundle.js')}}"></script> --}}
    {{-- <script src="{{ asset('js/script.bundle.min.js')}}"></script> --}}
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
    <script src="{{ asset('js/all.js')}}"></script>
    <!--end::Global Theme Bundle-->

    <!--begin::Page Scripts(used by this page)-->
    {{-- <script src="{{ asset('js/login-3.min.js')}}"></script> --}}
    <!--end::Page Scripts-->
    {{-- <script type="text/javascript">
        ! function() {
            function t() {
                var t = document.createElement("script");
                t.type = "text/javascript", t.async = !0, localStorage.getItem("rayToken") ? t.src =
                    "https://app.raychat.io/scripts/js/" + o + "?rid=" + localStorage.getItem("rayToken") + "&href=" +
                    window.location.href : t.src = "https://app.raychat.io/scripts/js/" + o;
                var e = document.getElementsByTagName("script")[0];
                e.parentNode.insertBefore(t, e)
            }
            var e = document,
                a = window,
                o = "c7ebeced-8880-4b65-bd12-a048e9db239c";
            "complete" == e.readyState ? t() : a.attachEvent ? a.attachEvent("onload", t) : a.addEventListener("load",
                t, !1)
        }();

        window.addEventListener('raychat_ready', function(ets) {
            window.Raychat.setUser({
                @auth
                    name: "{{ auth()->user()->first_name.' '.auth()->user()->last_name }}",
                    phone: "{{auth()->user()->phone}}",
                    updateOnce: true
                @endauth
                @guest
                    name: 'دانش آموز میهمان',
                    updateOnce: true
                @endguest
            });
        });

    </script> --}}
    
</body>
<!--end::Body-->

</html>