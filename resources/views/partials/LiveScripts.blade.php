@auth
<script>
    var userID = {{$userID}};
                        var userName = "{{ $username }}";
                        var classID = {{$classid}};
                        $(function() {
                
                            //make connection to socket
                            var socket = io("https://ouc.puzzle-stu.com:3000")
                            var room = classID;
                            socket.emit('join', room);
                            socket.emit('set_userid', {
                                userid: userID
                            });
                            socket.emit('set_username', {
                                username: userName
                            });
                
                            
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
                                    if (data.userid == userID) {
                                        var li = '';
                                        var li = li + '<div class="d-flex flex-column mb-5 align-items-start mt-5">';
                                        var li = li + '<div class="text-dark-75 small w-100">'+ data.username +'</div>';
                                        var li = li + '<div class="d-flex align-items-center">';
                                        var li = li + '<div class="mt-0 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right w-100">'+ data.message +'</div>';
                                        var li = li + '</div></div>';
                                    } else {
                                        var li = '';
                                        var li = li + '<div class="d-flex flex-column mb-5 align-items-end mt-5">';
                                        var li = li + '<div class="text-dark-75 small w-100 text-right">'+ data.username +'</div>';
                                        var li = li + '<div class="d-flex align-items-center">';
                                        var li = li + '<div class="mt-0 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-right w-100">'+ data.message +'</div>';
                                        var li = li + '</div></div>';
                                    }
                                    // $("#list").append(li);
                                })
                
                
                        });
                
</script>
@endauth
@guest
<script>
    var userID = {{$userID}};
    var userName = "{{ $username }}";
    var classID = {{$classid}};
    $(function() {
        //make connection to socket
        var socket = io("https://ouc.puzzle-stu.com:3000")
        var room = classID;
        socket.emit('join', room);
        socket.emit('set_userid', {
            userid: userID
        });
        socket.emit('set_username', {
            username: userName
        });
            
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
                    username: $form.find("input[name='name']").val()
                    });
                
                //Clear input value
                $form.find("input[name='text']").val("");

            });

            //Listen for new_message
            socket.on("new_message", (data) => {
                if (data.userid == userID) {
                    var li = '';
                    var li = li + '<div class="d-flex flex-column mb-5 align-items-start mt-5">';
                    var li = li + '<div class="text-dark-75 small w-100">'+ data.username +'</div>';
                    var li = li + '<div class="d-flex align-items-center">';
                    var li = li + '<div class="mt-0 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right w-100">'+ data.message +'</div>';
                    var li = li + '</div></div>';
                } else {
                    var li = '';
                    var li = li + '<div class="d-flex flex-column mb-5 align-items-end mt-5">';
                    var li = li + '<div class="text-dark-75 small w-100 text-right">'+ data.username +'</div>';
                    var li = li + '<div class="d-flex align-items-center">';
                    var li = li + '<div class="mt-0 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-right w-100">'+ data.message +'</div>';
                    var li = li + '</div></div>';
                }
                $("#list").append(li);
            })
    });
                
</script>
@endguest

@if ($liveClass->id == 1 || $liveClass->id == 23 || $liveClass->id == 24 || $liveClass->id == 25 || $liveClass->id ==
26)
<script src="{{ asset('js/video.min.js') }}"></script>
<script src="{{ asset('js/nuevo.min.js') }}"></script>

<script>
    videojs.options.hls.overrideNative = true;
    videojs.options.html5.nativeAudioTracks = false;
    videojs.options.html5.nativeTextTracks = false;
    videojs.options.liveui = true;
    var player = videojs('myplayer');
    player.nuevo({
        logocontrolbar: "{{ asset('storage/image/rsz_logo_new.png') }}",
        logourl: "https://puzzle-stu.com",
        shareMenu: false
    });
    player.on('resolutionchange', function(event, data) {
        var resolution = data.res;
        var label = data.label;
    });
            
</script>
@endif