<div class="card card-custom card-stretch rounded-xl shadow-sm" id="kt_chat_modal">
    <!--begin::Body-->
    <div class="card-body px-4 py-1">
        <!--begin::Scroll-->

        <!--begin::Poll-->
        {{-- <div class="text-dark-75 small font-weight-boldest w-100 mt-5 pl-4">نظرسنجی</div>
        <div class="card card-custom border border-2 bg-light mb-3 rounded-xl">
            <div class="progress mt-4" style="height: 3px;">
                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="card-body pb-4 pt-4">
                <p class="small mb-2">
                    به نظر شما کدام یک از گزینه های زیر صحیح است
                </p>
                <form action="">
                    <div class="radio-list">
                        <label class="radio small">
                            <input type="radio" name="radios4" />
                            <span></span>
                            گزینه یک
                        </label>
                        <label class="radio small">
                            <input type="radio" name="radios4" />
                            <span></span>
                            گزینه دو
                        </label>
                        <label class="radio">
                            <input type="radio" name="radios4" />
                            <span></span>
                            گزینه سه
                        </label>
                        <label class="radio">
                            <input type="radio" name="radios4" />
                            <span></span>
                            گزینه چهار
                        </label>
                    </div>
                    <input type="submit" value="ثبت رای" class="btn btn-sm btn-pill btn-primary float-right">
                </form>
            </div>
        </div> --}}
        <!--end::Poll-->

        {{-- <div id="list" data-scroll="true" data-height="200">
            @if ($course->chat)
            @foreach($questions as $message)

            @if(auth()->user()->id == $message->user_id)
            <div class="d-flex flex-column mb-5 align-items-start mt-5">
                <div class="text-dark-75 small w-100">{{ $message->name }}</div>
                <div class="d-flex align-items-center">
                    <div
                        class="mt-0 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right w-100">
                        {{ $message->text }}</div>
                </div>
            </div>
            @else
            <div class="d-flex flex-column mb-5 align-items-env mt-5">
                <div class="text-dark-75 small w-100 text-right">{{ $message->name }}</div>
                <div class="d-flex align-items-center">
                    <div
                        class="mt-0 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-right w-100">
                        {{ $message->text }}</div>
                </div>
            </div>
            @endif

            @endforeach
            @endif
        </div> --}}
        <!--end::Scroll-->
    </div>
    <!--end::Body-->

    <!--begin::Footer-->
    <div class="card-footer align-items-center py-0 px-2 border-top-light">
        <form id="socketForm">
            <div class="form-group row mb-0 my-2 px-4">
                <div class="input-group bg-light rounded-pill bg-hover-light">
                    <input type="text" name="text"
                        class="px-2 rounded-pill form-control form-control-solid bg-hover-light border-0 form-control-lg px-0"
                        style="cursor: text;" placeholder="سوال خود را اینجا بنویسید ..." required/>
                    <div class="input-group-append">
                        <button class="btn bg-transparent py-0 px-3 h-100 questionSubmit" type="submit" id="send"
                            style="transform: rotateY(180deg);">
                            <span class="svg-icon svg-icon-primary">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-08-225706/theme/html/demo1/dist/../src/media/svg/icons/Communication/Send.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--end::Footer-->
</div>