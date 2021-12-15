@extends('layouts.admin')

@section('title','پازل استودیو | ویرایش نقش')

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        @include('partials.alerts')
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">افزودن نقش</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <form method="post" action="{{ route('roles.update', $role->id) }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 col-12">
                            <input type="text" name="name" class="form-control" value="{{ $role->name }}"
                                placeholder="نام نقش">
                            @if ($errors->has('name'))
                                <small class="form-text text-danger"> {{ $errors->first('name') }} </small>
                            @endif
                        </div>
                        <div class="col-md-6 col-12 mt-5 mt-md-0">
                            <input type="text" name="persian_name" class="form-control" value="{{ $role->persian_name }}"
                                placeholder="نام فارسی نقش">
                            @if ($errors->has('persian_name'))
                                <small class=" form-text text-danger"> {{ $errors->first('persian_name') }} </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <span>
                            افزودن دسترسی به نقش
                        </span>
                        <hr>
                    </div>
                    <div class="form-group">
                        @forelse ($permissions as $permission)
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name='permissions[]'
                                    {{ $role->permissions->contains($permission) ? 'checked' : '' }}
                                    value="{{ $permission->name }}" class="custom-control-input"
                                    id="{{ 'permission' . $permission->id }}">
                                <label class="custom-control-label"
                                    for="{{ 'permission' . $permission->id }}">{{ $permission->persian_name }}</label>
                            </div>
                        @empty
                            <p>
                                هیچ دسترسی وجود ندارد .
                            </p>
                        @endforelse
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-success btn sm" value="ویرایش">
                    </div>
                </form>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Content-->
@endsection
