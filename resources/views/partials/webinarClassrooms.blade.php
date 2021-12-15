@forelse ($classrooms as $classroom)
    <div class="col-lg-6 mb-6">
        <!--begin::Card-->
        <div class="card card-custom border">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ $classroom->name }} @if($classroom->free) <span class="label label-light-success label-pill label-inline mr-2">رایگان</span> @endif @if($classroom->stu_num == 0) <span class="label label-danger label-pill label-inline mr-2">کنسلی</span> @endif</h3>
                </div>
                <div class="card-toolbar">
                    <small class="faNum">
                        {{ $classroom->classroom_date }}
                    </small>
                </div>
            </div>
            <div class="card-body p-0">
                @if ($classroom->link != null)
                    {!!$classroom->link!!}
                @endif
            </div>
        </div>
        <!--end::Card-->
    </div>

@empty
    <div class="alert alert-info w-100 rounded-pill" role="alert">هیچ جلسه ای برای این دوره ثبت نشده است !</div>
@endforelse

@section('js')

@auth
<script>
    window.onload = function() {
        var media_objs = window.Vis.libraryMedias.getAll();
        for(item in media_objs)
        {
            media_objs[item].api.DRMText({
                text : ["{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}","{{auth()->user()->phone}}"], // text to show (only array(s)...)
                time: 2.5,
                color: 'white',
                fontSize: "14px",
                fontName: "IRANSansX",
                opacity: 0.4,
            });
        }
    };
</script>
@endauth

@endsection