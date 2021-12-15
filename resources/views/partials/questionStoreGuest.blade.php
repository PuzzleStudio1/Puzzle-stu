<div class="card card-custom card-stretch questionBack" id="kt_chat_modal">
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Scroll-->
        <div class="scroll scroll-pull h-100" data-mobile-height="300">
            {{-- @isset($questions) --}}
            {{-- @include('partials.chatMessage',$questions) --}}
            {{-- @endisset --}}
            {{-- @if ($course->chat)
                <div class="chatlist">
                    <ul id="list">
                        @foreach($questions as $message)
                            @if(auth()->user()->id == $message->user_id)
                                <li>
                            @else
                            @endif
                                <li class="notcurrent">
                                    <div class="name">{{$message->name}}</div><div class="message">{{$message->text}}</div>
                                </li>
                        @endforeach 
                    </ul>
                </div>
            @endif --}}
        </div>
        <!--end::Scroll-->
    </div>
    <!--end::Body-->

    <!--begin::Footer-->
    <div class="card-footer align-items-center p-3">
        <form id="socketForm">
            {{-- @csrf --}}
            <div class="form-group row mb-2">
                <div class="col-12">
                    <input type="text" class="form-control questionInput" name="name"
                        placeholder="نام و نام خانوادگی" required>
                </div>
            </div>
            <div class="form-group row mb-2">
                <div class="col-12">
                    <input name="text" placeholder="سوال خود را اینجا بنویسید ..." class="form-control questionInput" autocomplete="off" required>
                    {{-- <textarea class="form-control questionInput" id="text" name="text" rows="3"
                        placeholder="سوال خود را اينجا بنويسيد ...." autocomplete="off"></textarea> --}}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 offset-md-8 col-12 offset-0 float-right">
                    <input id="send" type="submit" value="ارسال" class="btn w-100 questionSubmit rounded-pill">
                </div>
            </div>
        </form>
        {{-- <form id="questionSend" action="{{ route('question.storeGuest', $course->live_class) }}"
            method="post">
            @csrf
            <div class="form-group row mb-2">
                <div class="col-12">
                    <input type="text" class="form-control questionInput" name="name"
                        placeholder="نام و نام خانوادگی">
                </div>
            </div>
            <div class="form-group row mb-2">
                <div class="col-12">
                    <input type="text" class="form-control questionInput" name="phone"
                        placeholder="تلفن همراه">
                </div>
            </div>
            <div class="form-group row mb-2">
                <div class="col-12">
                    <textarea class="form-control questionInput" id="text" name="text" rows="3"
                        placeholder="سوال خود را اينجا بنويسيد ...."></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 offset-md-8 col-12 offset-0 float-right">
                    <input id="send" type="submit" value="ارسال" class="btn w-100 questionSubmit rounded-pill">
                </div>
            </div>
        </form> --}}
    </div>
    <!--end::Footer-->
</div>