<div class="container" id="liveBox">
    <div class="row my-10">
        <div class="col-md-3">
            @include('partials.questionStoreNew')
        </div>

        <div class="col-md-9">
            <div class="card card-custom gutter-b shadow-sm rounded-xl bg-black mb-0">
                <div class="card-body p-0">
                    @if($liveClass->id == 1 || $liveClass->id == 23 || $liveClass->id == 24 || $liveClass->id == 25 ||
                    $liveClass->id == 26)
                    <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin mx-md-0 mx-auto" style="width:100%"
                        poster="https://puzzle-stu.com/storage/image/clear-cover-min.jpg" controls preload="auto">
                        <source src="{{ $liveClass->code }}{{ $course->live_class }}.m3u8" type="application/x-mpegURL">
                    </video>
                    @else
                    {!! $liveClass->code !!}
                    @endif
                </div>
                <div class="card-footer border-0 py-2">
                    <button
                        class="btn btn-transparent-primary btn-hover-transparent-primary btn-pill font-weight-bold mr-2"
                        id="TheaterMode">
                        <span class="svg-icon">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-03-183419/theme/html/demo1/dist/../src/media/svg/icons/Design/Substract.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                    <path
                                        d="M10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L10.1818182,16 C8.76751186,16 8,15.2324881 8,13.8181818 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        حالت تئاتر
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>