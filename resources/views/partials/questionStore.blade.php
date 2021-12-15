<div class="card card-custom card-stretch questionBack" id="kt_chat_modal">
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Scroll-->
        <div class="scroll scroll-pull h-100" data-mobile-height="300">
            @if ($course->chat)
                <div class="chatlist">
                    <ul id="list">
                        @foreach($questions as $message)
                            @if(auth()->user()->id == $message->user_id)
                                <li>
                            @else
                                <li class="notcurrent">
                            @endif
                                    <div class="name">{{$message->name}}</div><div class="message">{{$message->text}}</div>
                                </li>
        
                        @endforeach 
                    </ul>
                </div>
            @endif
        </div>
        <!--end::Scroll-->
    </div>
    <!--end::Body-->

    <!--begin::Footer-->
    <div class="card-footer align-items-center p-3">
        <form id="socketForm">
            <div class="form-group row mb-2 pr-4">
                <div class="col-10 pr-0">
                    <input name="text" placeholder="سوال خود را اینجا بنویسید ..." class="form-control questionInput" autocomplete="off" required>
                </div>
                <div class="col-2">
                    <div class="recordrtc">

                        <button class="btn questionInput p-0">
                            <i class="fas fa-microphone voiceS px-6 py-3 font-size-h4"></i>
                        </button>
        
                    <div style="text-align: center; display: none;">
                        <button id="save-to-disk">Save To Disk</button>
                        <button id="open-new-tab">Open New Tab</button>
                        <button id="upload-to-server">Upload To Server</button>
                    </div>
        
                    <br>
                    <div class="d-none">
                        <video controls playsinline autoplay muted=false volume=1"></video>
                    </div>
                    </div>
                    {{-- <a href="">

                        <span class="input-group-text questionInput py-2">
                            <span class="svg-icon svg-icon-primary svg-icon-2x "><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo7\dist/../src/media/svg/icons\Devices\Mic.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M12.9975507,17.929461 C12.9991745,17.9527631 13,17.9762852 13,18 L13,21 C13,21.5522847 12.5522847,22 12,22 C11.4477153,22 11,21.5522847 11,21 L11,18 C11,17.9762852 11.0008255,17.9527631 11.0024493,17.929461 C7.60896116,17.4452857 5,14.5273206 5,11 L7,11 C7,13.7614237 9.23857625,16 12,16 C14.7614237,16 17,13.7614237 17,11 L19,11 C19,14.5273206 16.3910388,17.4452857 12.9975507,17.929461 Z" fill="#000000" fill-rule="nonzero"/>
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-360.000000) translate(-12.000000, -8.000000) " x="9" y="2" width="6" height="12" rx="3"/>
                                </g>
                            </svg><!--end::Svg Icon--></span></span>
                    </a> --}}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 offset-md-8 col-12 offset-0 float-right">
                    <input id="send" type="submit" value="ارسال" class="btn w-100 questionSubmit rounded-pill">
                </div>
            </div>
        </form>
    </div>
    <!--end::Footer-->
</div>