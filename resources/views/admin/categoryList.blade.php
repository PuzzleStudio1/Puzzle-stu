@extends('layouts.admin')

@section('title', 'پازل استودیو | لیست دسته بندی ها')

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        @include('partials.alerts')

        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">لیست نقش ها</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">نام دسته بندی</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-icon btn-outline-success btn-sm">
                                        <i class="flaticon-edit"></i>
                                    </a>
                                    <a href="{{ route('categories.destroy', $category->id) }}"
                                        class="btn btn-icon btn-outline-danger btn-sm">
                                        <i class="flaticon-delete-1"></i>
                                    </a>
                                </td>
                            </tr>
                            @if (count($category->childrenRecursive) > 0)
                                @include('partials.categoryList', ['categories'=>$category->childrenRecursive,
                                'level'=>1])
                            @endif
                        @empty
                            <p>
                                هیچ دسته بندی برای نمایش وجود ندارد.
                            </p>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Content-->
    <div class="flex-row-fluid">
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">افزودن دسته بندی</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <form method="post" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label class="font-size-h6 font-weight-bolder text-dark">نام دسته بندی</label>
                        <input type="text" name="name" class="form-control  " placeholder="نام دسته بندی">
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
                        <input type="submit" class="btn btn-outline-success btn sm w-50" value="افزودن">
                    </div>
                </form>
            </div>
            <!--end::Body-->
        </div>
    </div>
@endsection
