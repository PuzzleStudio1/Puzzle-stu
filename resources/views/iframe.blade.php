<!DOCTYPE html>
<html lang="en">

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>پازل</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />


    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @if ($player->id == 1 || $player->id == 23 || $player->id == 24 || $player->id == 25 || $player->id == 26)
    <link href="{{ asset('css/videojstheme.min.css') }}" rel="stylesheet">
    @endif
</head>

<body class="header-fixed header-mobile-fixed page-loading" dir="rtl">
    <div class="content pt-md-0  d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid">
                <div class="row bg-black d-flex flex-md-row flex-column-reverse">
                    @if ( $course->id != 199 )
                    <div class="col-md-3 col-12 px-0 d-flex justify-content-center">
                        <div class="card card-custom card-stretch questionBack w-100" id="kt_chat_modal">
                            <div class="card-body">
                                <div class="scroll scroll-pull h-100" data-mobile-height="300">
                                    <div></div>
                                </div>
                            </div>
                            <div class="card-footer align-items-center p-3">
                                <form action="{{ route('question.storeGuest') }}" method="POST" id="questionSend">
                                    <div class="form-group row mb-2">
                                        <div class="col-12">
                                            <input type="text" class="form-control questionInput" name="name"
                                                placeholder="نام و نام خانوادگی" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-2">
                                        <div class="col-12">
                                            <input id="text" name="text" placeholder="سوال خود را اینجا بنویسید ..."
                                                class="form-control questionInput" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4 offset-md-8 col-12 offset-0 float-right">
                                            <input id="send" type="submit" value="ارسال"
                                                class="btn w-100 questionSubmit rounded-pill">
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" name="class_id"
                                        value="{{ $liveClass->id }}">

                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="@if($course->id == 199) col-md-12 @else col-md-9 @endif col-12 webinar_player">
                        @if ($player->id == 1 || $player->id == 23 || $player->id == 24 || $player->id == 25 || $player->id == 26)
                        <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin" style="width:100%"
                            height="500px" poster="{{ asset('storage/image/clear-cover-min.jpg') }}" controls
                            preload="auto">
                            <source src="{{ $player->code }}{{ $course->live_class }}.m3u8"
                                type="application/x-mpegURL">
                        </video>
                        @else
                        {!! $player->code !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

@if ($player->id == 1 || $player->id == 23 || $player->id == 24 || $player->id == 25 || $player->id == 26)
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
<script>
    $('#questionSend').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{ route('question.storeGuest') }}",
            type: 'post',
            data: $('#questionSend').serialize(),
            dataType: 'json',
            success: function(_response) {
                $('#text').val("");
                console.log('send');
            },
            error: function(_response) {
                console.log('failed to send question');
            }
        });
    });

</script>

</html>