@extends('layouts.admin')

@section('title','پازل استودیو | ویرایش دسته بندی')

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        @include('partials.alerts')
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">ویرایش دسته بندی</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <form method="post" action="{{ route('categories.update',$category->id) }}">
                    @csrf
                    <div class="form-group row">
                        <label class="font-size-h6 font-weight-bolder text-dark">نام دسته بندی</label>
                    <input type="text" name="name" class="form-control  " placeholder="نام دسته بندی" value="{{$category->name}}">
                        @if ($errors->has('name'))
                            <small class="form-text text-danger"> {{ $errors->first('name') }} </small>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="font-size-h6 font-weight-bolder text-dark">دسته بندی والد</label>
                        <select name="parent_id" class="form-control selectpicker">
                            <option value="" selected>بدون دسته بندی</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @if (count($category->childrenRecursive) > 0)
                                    @include('partials.category', ['categories'=>$category->childrenRecursive,
                                    'level'=>1])
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <input type="submit" class="btn btn-outline-success btn sm" value="ویرایش">
                    </div>
                </form>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Content-->
@endsection
