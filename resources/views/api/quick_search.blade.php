<div class="quick-search-result">
    @if ($users->count() == 0)
    @else
    <!--begin::Section-->
    <div class="font-size-sm text-primary font-weight-bolder text-uppercase mb-2">
        مدرسین و برگزارکنندگان
    </div>
    <div class="mb-10">
        @foreach ($users as $user)
        <div class="d-flex align-items-center flex-grow-1 mb-2">
            @if ($user->hasRole('institute'))
            <a class="symbol symbol-30 bg-transparent flex-shrink-0" href="{{ route('institute.frontend', $user) }}">
            @else
            <a class="symbol symbol-30 bg-transparent flex-shrink-0" href="{{ route('teacher.frontend', $user) }}">
            @endif
                @if($user->photo != null)
                    <img src="{{ asset('storage/' . $user->photo->filePath()) }}" class="border rounded">
                @else
                    <img src="{{ asset('media/favicon.ico') }}" class="border rounded">
                @endif
            </a>
            <div class="d-flex flex-column ml-3 mt-2 mb-2">
                @if ($user->hasRole('institute'))
                    <a href="{{ route('institute.frontend', $user) }}" class="font-weight-bold text-dark text-hover-primary">
                @else
                    <a href="{{ route('teacher.frontend', $user) }}" class="font-weight-bold text-dark text-hover-primary">
                @endif
                    {{ $user->first_name . ' ' . $user->last_name }}
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <!--end::Section-->
    @endif
    @if ($courses->count() == 0)
    <div class="font-size-sm text-primary font-weight-bolder text-uppercase mb-2">
        دوره‌ها
    </div>
    <!--begin::Message-->
    <div class="text-muted">
        نتیجه‌ای یافت نشد
    </div>
    <!--end::Message-->
    @else
    <!--begin::Section-->
    <div class="font-size-sm text-primary font-weight-bolder text-uppercase mb-2">
        دوره‌ها
    </div>
    <div class="mb-10">
        @foreach ($courses as $course)
        <div class="d-flex align-items-center flex-grow-1 mb-2">
            <a class="symbol symbol-30 bg-transparent flex-shrink-0"
                href="{{ route('webinar.frontend', $course->id) }}">
                <img src="{{ asset('storage/' . $course->photo->filePath()) }}" alt="{{ $course->name }}" class="border rounded">
            </a>
            <div class="d-flex flex-column ml-3 mt-2 mb-2">
                <a href="{{ route('webinar.frontend', $course->id) }}"
                    class="font-weight-bold text-dark text-hover-primary">
                    {{ $course->name }}
                </a>
                <span class="font-size-sm font-weight-bold text-muted">
                    {{ $course->teacher->first_name . ' ' . $course->teacher->last_name }}
                </span>
            </div>
        </div>
        @endforeach
    </div>
    <!--end::Section-->
    @endif

</div>