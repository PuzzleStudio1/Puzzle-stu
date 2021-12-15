@extends('layouts.admin')

@section('title', 'پازل استودیو | افزودن دوره')

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        <div class="card card-custom gutter-b shadow-none">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">افزودن دوره</span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{ route('course.index') }}" class="btn btn-success font-weight-bolder font-size-sm">
                        لیست دوره ها
                    </a>
                </div>
            </div>
            <hr>
            <!--end::Header-->
            <div class="card-body">
                @include('partials.alerts')
                @include('partials.validation-errors')
                <form method="post" action=" {{ route('course.store') }} " enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row py-4">
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">نام</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="نام دوره">
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">نوع</label>
                            <select name="type" class="form-control selectpicker">
                                <option value=null selected disabled>نوع دوره را انتخاب کنید.
                                </option>
                                <option value="free" @if(old('type') == 'free')selected @endif>
                                    رایگان
                                    <span class="text-muted font-weight-bold">
                                        بدون ثبت نام
                                    </span>
                                </option>
                                <option value="login" @if(old('type') == 'login')selected @endif>
                                    رایگان
                                    <span class="text-muted font-weight-bold">
                                        نیاز به ثبت نام
                                    </span>
                                </option>
                                <option value="class" @if(old('type') == 'class')selected @endif>کلاس</option>
                                <option value="paid" @if(old('type') == 'paid')selected @endif>دوره پولی</option>
                                <option value="code" @if(old('type') == 'code')selected @endif>دوره کد ورود</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row py-4">
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">معلم</label>
                            <select name="teacher" class="form-control selectpicker" data-size="7" data-live-search="true">
                                <option value=null selected disabled>معلم دوره را انتخاب کنید.
                                </option>
                                @forelse ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" @if(old('teacher') == $teacher->id)selected @endif>{{ $teacher->first_name }}
                                        {{ $teacher->last_name }}</option>
                                @empty
                                    هیچ معلمی برای نمایش وجود ندارد.
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">برگزار کننده
                            </label>
                            <select name="institute" class="form-control selectpicker" data-size="7"
                                data-live-search="true">
                                <option value=null selected disabled>برگزار کننده دوره را انتخاب کنید.
                                </option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" @if(old('institute') == $teacher->id)selected @endif>{{ $teacher->first_name }}
                                        {{ $teacher->last_name }}</option>
                                @endforeach
                                @foreach ($institutes as $institute)
                                    <option value="{{ $institute->id }}" @if(old('institute') == $institute->id)selected @endif>{{ $institute->first_name }}
                                        {{ $institute->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row py-4">
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">دسته بندی</label>
                            <select name="categories[]" class="form-control selectpicker" multiple>
                                <option value=null selected disabled>دسته بندی دوره را انتخاب کنید.
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @if (count($category->childrenRecursive) > 0)
                                        @include('partials.category',
                                        ['categories'=>$category->childrenRecursive,
                                        'level'=>1])
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">برچسب</label>
                            <select name="tags[]" class="form-control selectpicker" multiple>
                                <option value=null selected disabled>برچسب دوره را انتخاب کنید.</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <div class="col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">توضیحات</label>
                            <textarea class="form-control" name="description" rows="10"
                                placeholder="توضیحات دوره را وارد نمایید">{{old('description')}}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row py-4">
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">قیمت</label>
                            <input type="text" name="price" class="form-control  " placeholder="قیمت دوره" value="{{old('price')}}">
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">قیمت تخفیف
                                خورده</label>
                            <input type="text" name="discount_price" class="form-control  "
                                placeholder="قیمت تخفیف خورده دوره" value="{{old('discount_price')}}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row py-4">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">آپلود تصویر دوره</label>
                                <div class="custom-file mb-3">
                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">فایل خود را انتخاب
                                        کنید</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is-private" name="is-private">
                                    <label class="custom-control-label" for="is-private">به صورت خصوصی آپلود
                                        شود</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">قابلیت چت</label>
                        <div class="col-3">
                            <span class="switch">
                                <label>
                                    <input type="checkbox" name="chat" @if (old('chat') == 'on')checked @endif/>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <label class="col-3 col-form-label">مشاهده لیست حضور غیاب توسط معلم</label>
                        <div class="col-3">
                            <span class="switch">
                                <label>
                                    <input type="checkbox" name="see_absences" @if (old('see_absences') == 'on')checked @endif/>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">وضعیت</label>
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="status" value="public" @if (old('status') == 'public')checked="checked" @endif/>
                                <span></span>
                                عمومی
                            </label>
                            <label class="radio">
                                <input type="radio" name="status" value="private" @if (old('status') == 'private')checked="checked" @endif/>
                                <span></span>
                                خصوصی
                            </label>
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <input type="submit" class="btn btn-outline-success btn w-25" value="ایجاد دوره">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Content-->

@endsection
