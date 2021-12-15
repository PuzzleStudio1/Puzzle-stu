@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="mb-2 alert alert-danger">
            {!! $error !!}
        </div>
    @endforeach
@endif
