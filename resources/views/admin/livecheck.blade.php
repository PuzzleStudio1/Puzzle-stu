@extends('layouts.admin')

@section('title', 'پازل استودیو | نظارت بر کلاس‌ها')

@section('css')
<link href="{{ asset('css/videojstheme.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!--begin::Content-->
<div class="flex-row-fluid">
    @include('partials.alerts')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    نظارت بر کلاس‌ها
                </h3>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ($classrooms as $classroom)
                <div class="col-md-4 mb-6">
    
                    <div class="card card-custom border shadow-0">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">{{ $classroom->course->name }}</h3>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            @if($classroom->player->id == 1 || $classroom->player->id == 23 || $classroom->player->id == 24
                            || $classroom->player->id == 25 || $classroom->player->id == 26)
                            <video id="myplayer" class="video-js vjs-16-9 vjs-default-skin mx-md-0 mx-auto"
                                style="width:100%" poster="https://puzzle-stu.com/storage/image/clear-cover-min.jpg"
                                controls preload="auto">
                                <source src="{{ $classroom->player->code }}{{ $classroom->id }}.m3u8"
                                    type="application/x-mpegURL">
                            </video>
                            @else
                            {!! $classroom->player->code !!}
                            @endif
                        </div>
                    </div>
    
                </div>
                @empty
                <p>
                    هیچ کلاسی در حال برگزاری نمیباشد.
                </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
<!--end::Content-->
@endsection

@section('script')
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
@endsection