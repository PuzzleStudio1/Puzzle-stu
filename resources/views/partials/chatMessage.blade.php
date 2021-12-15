{{-- <!--begin::Messages-->
<div class="messages">
    @foreach ($questions as $question)
        @if ($question->user_id == auth()->user()->id)
        <div class="d-flex flex-column mb-5 align-items-end">
            <div class="d-flex align-items-center">
                <div>
                    <a href="#"
                        class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">شما</a>
                </div>
            </div>
            <div
                class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                {{$question->text}}
            </div>
        </div>
        @else
        <div class="d-flex flex-column mb-5 align-items-start">
            <div class="d-flex align-items-center">
                <div>
                    <a href="#"
                        class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">دانش آموز دیگر</a>
                </div>
            </div>
            <div
                class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                {{$question->text}}
            </div>
        </div>
        @endif
    @endforeach
</div>
<!--end::Messages--> --}}

<div class="chatbox">
    <div class="chatlist">
        <ul id="list">
            @foreach($messages as $message)
                @if($userID == $message->user_id)
                    <li>
                @else
                    <li class="notcurrent">
                @endif
                        <div class="name">{{$message->name}}</div><div class="message">{{$message->text}}</div>
                    </li>

            @endforeach 
        </ul>
    </div>
    <div class="chatinputform">
        <form id="socketForm">
            <input name="text" placeholder="سوال شما" class="chatinput" autocomplete="off">
        </form>
    </div>
</div>