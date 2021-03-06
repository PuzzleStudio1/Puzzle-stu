

@extends('layouts.index')

@section('title', 'پازل استودیو | معلم')
@section('css')
<script src="{{ asset('js/RecordRTC.js')}}"></script>
<script src="{{ asset('js/gif-recorder.js')}}"></script>
<script src="{{ asset('js/getScreenId.js')}}"></script>
<script src="{{ asset('js/DetectRTC.js')}}"></script>
<!-- for Edige/FF/Chrome/Opera/etc. getUserMedia support -->
<script src="{{ asset('js/adapter-latest.js')}}"></script>
@endsection
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Row-->
            <div class="row my-6">
                <!--begin::Product-->
                <div class="col-12">
                    <div class="card card-custom bgi-no-repeat gutter-b p-5">
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless">
                            <div class="card-body p-0">
                                <div class="recordrtc">

                                    <button class="btn btn-primary p-0">
                                        <i class="fas fa-microphone voiceS p-6"></i>
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
                                {{-- <section class="recordrtc">
                                </section> --}}
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection

@section('js')
    <script>
        (function() {
            var params = {},
                r = /([^&=]+)=?([^&]*)/g;

            function d(s) {
                return decodeURIComponent(s.replace(/\+/g, ' '));
            }

            var match, search = window.location.search;
            while (match = r.exec(search.substring(1))) {
                params[d(match[1])] = d(match[2]);

                if (d(match[2]) === 'true' || d(match[2]) === 'false') {
                    params[d(match[1])] = d(match[2]) === 'true' ? true : false;
                }
            }

            window.params = params;
        })();

    </script>

    <script>
        var recordingDIV = document.querySelector('.recordrtc');
        // var recordingMedia = recordingDIV.querySelector('.recording-media');
        var recordingPlayer = recordingDIV.querySelector('video');
        // var mediaContainerFormat = recordingDIV.querySelector('.media-container-format');

        recordingDIV.querySelector('.voiceS').onclick = function() {
            var button = this;

            if (button.classList.contains("fa-arrow-alt-circle-up")) {
                button.disabled = true;
                button.disableStateWaiting = true;
                setTimeout(function() {
                    button.disabled = false;
                    button.disableStateWaiting = false;
                }, 2 * 1000);

                // button.innerHTML = 'Start Recording';
                button.classList.add("fa-microphone");
                button.classList.remove("fa-arrow-alt-circle-up");

                function stopStream() {
                    if (button.stream && button.stream.stop) {
                        button.stream.stop();
                        button.stream = null;
                    }
                }

                if (button.recordRTC) {
                    if (button.recordRTC.length) {
                        button.recordRTC[0].stopRecording(function(url) {
                            if (!button.recordRTC[1]) {
                                button.recordingEndedCallback(url);
                                stopStream();

                                saveToDiskOrOpenNewTab(button.recordRTC[0]);
                                return;
                            }

                            button.recordRTC[1].stopRecording(function(url) {
                                button.recordingEndedCallback(url);
                                stopStream();
                            });
                        });
                    } else {
                        button.recordRTC.stopRecording(function(url) {
                            button.recordingEndedCallback(url);
                            stopStream();

                            saveToDiskOrOpenNewTab(button.recordRTC);
                        });
                    }
                }

                return;
            }

            button.disabled = true;

            var commonConfig = {
                onMediaCaptured: function(stream) {
                    button.stream = stream;
                    if (button.mediaCapturedCallback) {
                        button.mediaCapturedCallback();
                    }

                    // button.innerHTML = 'Stop Recording';
                    button.classList.remove("fa-microphone");
                    button.classList.add("fa-arrow-alt-circle-up");

                    button.disabled = false;
                },
                onMediaStopped: function() {
                    // button.innerHTML = 'Start Recording';
                    button.classList.remove("fa-microphone");

                    if (!button.disableStateWaiting) {
                        button.disabled = false;
                    }
                },
                onMediaCapturingFailed: function(error) {
                    if (error.name === 'PermissionDeniedError' && !!navigator.mozGetUserMedia) {
                        InstallTrigger.install({
                            'Foo': {
                                // https://addons.mozilla.org/firefox/downloads/latest/655146/addon-655146-latest.xpi?src=dp-btn-primary
                                URL: 'https://addons.mozilla.org/en-US/firefox/addon/enable-screen-capturing/',
                                toString: function() {
                                    return this.URL;
                                }
                            }
                        });
                    }

                    commonConfig.onMediaStopped();
                }
            };

            captureAudio(commonConfig);

            button.mediaCapturedCallback = function() {
                button.recordRTC = RecordRTC(button.stream, {
                    type: 'audio',
                    bufferSize: typeof params.bufferSize == 'undefined' ? 0 : parseInt(params
                        .bufferSize),
                    sampleRate: typeof params.sampleRate == 'undefined' ? 44100 : parseInt(
                        params.sampleRate),
                    leftChannel: params.leftChannel || false,
                    disableLogs: params.disableLogs || false,
                    recorderType: DetectRTC.browser.name === 'Edge' ? StereoAudioRecorder : null
                });

                button.recordingEndedCallback = function(url) {
                    var audio = new Audio();
                    audio.src = url;
                    audio.controls = true;
                    // recordingPlayer.parentNode.appendChild(document.createElement('hr'));
                    // recordingPlayer.parentNode.appendChild(audio);

                    if (audio.paused) audio.play();

                    audio.onended = function() {
                        audio.pause();
                        audio.src = URL.createObjectURL(button.recordRTC.blob);
                    };
                };

                button.recordRTC.startRecording();
            };
            // if (recordingMedia.value === 'record-audio') {}

        };
        function captureAudio(config) {
            captureUserMedia({
                audio: true
            }, function(audioStream) {
                recordingPlayer.srcObject = audioStream;

                config.onMediaCaptured(audioStream);

                audioStream.onended = function() {
                    config.onMediaStopped();
                };
            }, function(error) {
                config.onMediaCapturingFailed(error);
            });
        }

        function captureUserMedia(mediaConstraints, successCallback, errorCallback) {
            navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);
        }

        function setMediaContainerFormat(arrayOfOptionsSupported) {
            var options = Array.prototype.slice.call(
                mediaContainerFormat.querySelectorAll('option')
            );

            var selectedItem;
            options.forEach(function(option) {
                option.disabled = true;

                if (arrayOfOptionsSupported.indexOf(option.value) !== -1) {
                    option.disabled = false;

                    if (!selectedItem) {
                        option.selected = true;
                        selectedItem = option;
                    }
                }
            });
        }

        recordingMedia.onchange = function() {
            if (this.value === 'record-audio') {
                setMediaContainerFormat(['WAV', 'Ogg']);
                return;
            }
            setMediaContainerFormat(['WebM', /*'Mp4',*/ 'Gif']);
        };

        if (DetectRTC.browser.name === 'Edge') {
            // webp isn't supported in Microsoft Edge
            // neither MediaRecorder API
            // so lets disable both video/screen recording options

            console.warn(
                'Neither MediaRecorder API nor webp is supported in Microsoft Edge. You cam merely record audio.'
            );

            recordingMedia.innerHTML = '<option value="record-audio">Audio</option>';
            setMediaContainerFormat(['WAV']);
        }

        if (DetectRTC.browser.name === 'Firefox') {
            // Firefox implemented both MediaRecorder API as well as WebAudio API
            // Their MediaRecorder implementation supports both audio/video recording in single container format
            // Remember, we can't currently pass bit-rates or frame-rates values over MediaRecorder API (their implementation lakes these features)

            recordingMedia.innerHTML = '<option value="record-audio-plus-video">Audio+Video</option>' +
                '<option value="record-audio-plus-screen">Audio+Screen</option>' +
                recordingMedia.innerHTML;
        }

        // disabling this option because currently this demo
        // doesn't supports publishing two blobs.
        // todo: add support of uploading both WAV/WebM to server.
        if (false && DetectRTC.browser.name === 'Chrome') {
            recordingMedia.innerHTML = '<option value="record-audio-plus-video">Audio+Video</option>' +
                recordingMedia.innerHTML;
            console.info(
                'This RecordRTC demo merely tries to playback recorded audio/video sync inside the browser. It still generates two separate files (WAV/WebM).'
            );
        }

        var MY_DOMAIN = 'webrtc-experiment.com';

        function isMyOwnDomain() {
            // replace "webrtc-experiment.com" with your own domain name
            return document.domain.indexOf(MY_DOMAIN) !== -1;
        }

        function saveToDiskOrOpenNewTab(recordRTC) {
            // recordingDIV.querySelector('#save-to-disk').parentNode.style.display = 'block';
            // recordingDIV.querySelector('#save-to-disk').onclick = function() {
            //     if (!recordRTC) return alert('No recording found.');

            //     recordRTC.save();
            // };

            // recordingDIV.querySelector('#open-new-tab').onclick = function() {
            //     if (!recordRTC) return alert('No recording found.');

            //     window.open(recordRTC.toURL());
            // };

            if (isMyOwnDomain()) {
                recordingDIV.querySelector('#upload-to-server').disabled = true;
                recordingDIV.querySelector('#upload-to-server').style.display = 'none';
            } else {
                recordingDIV.querySelector('#upload-to-server').disabled = false;
            }

                if (isMyOwnDomain()) {
                    alert('PHP Upload is not available on this domain.');
                    return;
                }

                if (!recordRTC) return alert('No recording found.');
                this.disabled = true;

                // var button = this;
                uploadToServer(recordRTC, function(progress, fileURL) {
                    // if (progress === 'ended') {
                    //     button.disabled = false;
                    //     button.innerHTML = 'Click to download from server';
                    //     button.onclick = function() {
                    //         window.open(fileURL);
                    //     };
                    //     return;
                    // }
                    // button.innerHTML = progress;
                });
            // recordingDIV.querySelector('#upload-to-server').onclick = function() {
            // };
        }

        // var listOfFilesUploaded = [];

        function uploadToServer(recordRTC, callback) {
            var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.blob;
            var fileType = blob.type.split('/')[0] || 'audio';
            var fileName = (Math.random() * 1000).toString().replace('.', '');

            if (fileType === 'audio') {
                fileName += '.' + (!!navigator.mozGetUserMedia ? 'ogg' : 'wav');
            } else {
                fileName += '.webm';
            }

            // create FormData
            var formData = new FormData();
            formData.append(fileType + '-filename', fileName);
            formData.append(fileType + '-blob', blob);

            callback('Uploading ' + fileType + ' recording to server.');

            // var upload_url = 'https://your-domain.com/files-uploader/';
            var upload_url = "{{ route('voice.save') }}";

            // var upload_directory = upload_url;
            var upload_directory = 'uploads/';

            makeXMLHttpRequest(upload_url, formData, function(progress) {
                if (progress !== 'upload-ended') {
                    callback(progress);
                    return;
                }

                callback('ended', upload_directory + fileName);

                // to make sure we can delete as soon as visitor leaves
                // listOfFilesUploaded.push(upload_directory + fileName);
            });
        }

        function makeXMLHttpRequest(url, data, callback) {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    callback('upload-ended');
                }
            };

            request.upload.onloadstart = function() {
                callback('Upload started...');
            };

            request.upload.onprogress = function(event) {
                callback('Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%");
            };

            request.upload.onload = function() {
                callback('progress-about-to-end');
            };

            request.upload.onload = function() {
                callback('progress-ended');
            };

            request.upload.onerror = function(error) {
                callback('Failed to upload to server');
                console.error('XMLHttpRequest failed', error);
            };

            request.upload.onabort = function(error) {
                callback('Upload aborted.');
                console.error('XMLHttpRequest aborted', error);
            };

            request.open('POST', url);
            request.send(data);
        }

        // window.onbeforeunload = function() {
        //     recordingDIV.querySelector('button').disabled = false;
        //     recordingMedia.disabled = false;
        //     mediaContainerFormat.disabled = false;

        //     if (!listOfFilesUploaded.length) return;

        //     var delete_url = 'https://webrtcweb.com/f/delete.php';
        //     // var delete_url = 'RecordRTC-to-PHP/delete.php';

        //     listOfFilesUploaded.forEach(function(fileURL) {
        //         var request = new XMLHttpRequest();
        //         request.onreadystatechange = function() {
        //             if (request.readyState == 4 && request.status == 200) {
        //                 if (this.responseText === ' problem deleting files.') {
        //                     alert('Failed to delete ' + fileURL + ' from the server.');
        //                     return;
        //                 }

        //                 listOfFilesUploaded = [];
        //                 alert('You can leave now. Your files are removed from the server.');
        //             }
        //         };
        //         request.open('POST', delete_url);

        //         var formData = new FormData();
        //         formData.append('delete-file', fileURL.split('/').pop());
        //         request.send(formData);
        //     });

        //     return 'Please wait few seconds before your recordings are deleted from the server.';
        // };

    </script>
    {{-- <script src="https://www.webrtc-experiment.com/commits.js" async></script> --}}

@endsection

@section('footer')
    @include('partials.footer')
@endsection
