<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
</head>

<body>

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
    {{-- <script src="https://code.jquery.com/jquery-latest.min.js"></script> --}}
    <script src="{{ asset('/js/app.js') }}"></script>
    <script>
            // $.ajax({
            //     type: "POST",
            //     url: "http://localhost/puzzlestuback-master/public/chatPost",
            //     dataType: "json",
            //     data: {
            //         "text": term,
            //         "classid":{{$classid}},
            //     },
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            // });
    </script>
    <script>

        var userID = {{$userID}};
        var userName = "{{$username}}";
        var classID = {{$classid}};
        $(function () {
            
            //make connection to socket
            var socket = io("https://ouc.puzzle-stu.com:3000")
            var room = classID;
            socket.emit('join', room);
            socket.emit('set_userid', {userid:userID});
            socket.emit('set_username', {username:userName});

            // Attach a submit handler to the form
            $("#socketForm").submit(function(event) {

                // Stop form from submitting normally
                event.preventDefault();

                // Get some values from elements on the page:
                var $form = $(this),
                term = $form.find("input[name='text']").val();

                //Emit message
                socket.emit("new_message", {
                    message: term,
                    room: room,
                });

                //Clear input value
                $form.find("input[name='text']").val("");

            });

            //Listen for new_message
            socket.on("new_message", (data) => {
                console.log(data)
                if(data.userid == userID){
                    var li = $('<li></li>');
                }else{
                    var li = $('<li class="notcurrent"></li>');
                }
                li.html(`<div class="name">` + data.username + `</div><div class="message">` + data.message + `</div>`);
                $("#list").append(li);
            })
            

        });
    </script>

</body>

</html>