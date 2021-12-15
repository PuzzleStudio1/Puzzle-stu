<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سوالات کلاس</title>

    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <link href="{{ asset('css/style.bundle.rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body cz-shortcut-listen="true" style="background-color: #000;">
    <nav class="navbar fixed-top navbar-expand-lg shadow-sm navbar-light bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <button type="button" class="btn btn-danger px-20" id="timer-button">توقف</button>
            </ul>
            <h2 class="text-right pt-2 pr-3 text-light h5">{{ $course->name }}</h2>
        </div>
        <a class="navbar-brand" href="#"><img src="{{ asset('media/Logo-New.svg') }}" height="37px"></a>
    </nav>
    <div id="ResultQuestions" class="mt-5">
        <div class="container-fluid">
            <div class="row pt-5" style="direction: rtl; text-align: right; background-color: #000;">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($questions as $question)
                        <div class="col-lg-4 col-md-6 col-12 mb-5">
                            <div class="shadow-sm p-3 h-100 rounded bg-dark" style="border: 2px solid #FF3366;">
                                <div class="container">
                                    <div class="row">
                                        <div style="font-size: 16px; font-weight: 600;color: #FF9933; width: 50%;">
                                            @if ($question->user_id != null)
                                            {{ $question->user->first_name . ' ' . $question->user->last_name }}
                                            @else
                                            {{ $question->name }}
                                            @endif
                                        </div>
                                        <div
                                            style="font-size: 16px; font-weight: 600;color: #FF9933; width: 50%; text-align: left;">
                                            {{ $question->timeDiff }} دقیقه پیش
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-5 text-white"
                                    style="font-size: 24px; font-weight: 400;overflow: hidden;">
                                    @if ($question->voice_id == null)
                                    {{ $question->text }}
                                    @else
                                    <audio controls class="w-100" onplaying="clearTime()">
                                        <source src="{{ asset($question->voice->path) }}" type="audio/ogg">
                                        <source src="{{ asset($question->voice->path) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>

                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="shadow-sm pt-2 pb-2 px-1 h-100 rounded bg-dark w-100 mx-1"
                            style="border: 2px solid #FF3366;">
                            <h4
                                style="font-size: 18px; font-weight: 600;color: #FF9933; width: 100%;text-align: right;float: right;">
                                آمار بازدید زنده({{ $userCount }} نفر)</h4>
                            <ul style="list-style: none;padding: 0;" class="mb-0">
                                @if ($presentUser == null)
                                @if ($course->type == 'free')
                                @forelse ($presentUsers as $presentUser)
                                <li class="mt-4 text-white font-size-h5">
                                    {{ $presentUser->user->first_name . ' ' . $presentUser->user->last_name }}
                                </li>
                                @empty
                                <li class="mt-4 text-white font-size-h5">هیچ دانش آموزی حاضر نیست.</li>
                                @endforelse
                                @else
                                @forelse ($presentUsers as $presentUser)
                                <li class="mt-4 text-white font-size-h5">
                                    {{ $presentUser->first_name . ' ' . $presentUser->last_name }}
                                </li>
                                @empty
                                <li class="mt-4 text-white font-size-h5">هیچ دانش آموزی حاضر نیست.</li>
                                @endforelse
                                @endif
                                @else
                                @foreach ($presentUser as $presentUsers)
                                @if ($course->type == 'free')
                                @forelse ($presentUsers as $presentUserr)
                                <li class="mt-4 text-white font-size-h5">
                                    {{ $presentUserr->user->first_name . ' ' . $presentUserr->user->last_name }}
                                </li>
                                @empty
                                <li class="mt-4 text-white font-size-h5">هیچ دانش آموزی حاضر نیست.</li>
                                @endforelse
                                @else
                                <li class="mt-4 text-white font-size-h5">
                                    {{ $presentUsers->first_name . ' ' . $presentUsers->last_name }}
                                </li>
                                @endif
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var timer_enable = 0;

            var initList = setInterval(function() {
                location.reload();
            }, 5000);

            $('#timer-button').click(function() {
                console.log(timer_enable);
                if (timer_enable == 0) {
                    clearInterval(initList);
                    $(this).html('ادامه');
                    $(this).removeClass('btn-danger');
                    $(this).addClass('btn-success');
                    timer_enable = 1;
                } else {
                    $(this).html('توقف');
                    $(this).removeClass('btn-success');
                    $(this).addClass('btn-danger');
                    timer_enable = 0;
                    initList = setInterval(function() {
                        location.reload();
                    }, 5000);
                }
            });
        });

    </script>
</body>

</html>