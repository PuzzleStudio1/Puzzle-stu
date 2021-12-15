@extends('layouts.admin')

@section('title', 'پازل استودیو | ویرایش دوره')

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        <div class="card card-custom gutter-b">
            <!--Begin::Body-->
            <div class="card-body p-2">
                <div class="tab-content pt-5">
                    <!--begin::Tab Content-->
                    <div class="tab-pane active">
                        <div class="card card-custom gutter-b shadow-none">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">ویرایش {{ $course->name }}</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="{{ route('course.index') }}"
                                        class="btn btn-success font-weight-bolder font-size-sm">
                                        لیست دوره ها
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <!--end::Header-->
                            <div class="card-body">
                                @include('partials.alerts')
                                @include('partials.validation-errors')
                                <form method="post" action=" {{ route('course.update',$course->id) }} "enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <div class="form-group row py-4">
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">نام</label>
                                            <input type="text" name="name" class="form-control" placeholder="نام دوره"
                                                value="{{ $course->name }}">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">نوع</label>
                                            <select name="type" class="form-control selectpicker">
                                                <option value=null disabled>نوع دوره را انتخاب کنید.
                                                </option>
                                                
                                                <option value="free" @if ($course->type == 'free')selected @endif>
                                                    رایگان
                                                    <span class="text-muted font-weight-bold">
                                                        بدون ثبت نام
                                                    </span>
                                                </option>
                                                <option value="login" @if ($course->type == 'login')selected @endif>
                                                    رایگان
                                                    <span class="text-muted font-weight-bold">
                                                        نیاز به ثبت نام
                                                    </span>
                                                </option>
                                                <option value="class" @if ($course->type == 'class')selected @endif>کلاس</option>
                                                <option value="paid" @if ($course->type == 'paid')selected @endif>دوره پولی</option>
                                                <option value="code" @if($course->type == 'code')selected @endif>دوره کد ورود</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row py-4">
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">معلم</label>
                                            <select name="teacher" class="form-control selectpicker" data-size="7"
                                                data-live-search="true">
                                                @forelse ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}" @if ($course->teacher->id == $teacher->id) selected @endif >{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
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
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}" @if ($course->institute->id == $teacher->id) selected
                                                @endif>{{ $teacher->first_name }}
                                                {{ $teacher->last_name }}</option>
                                                @endforeach
                                                @foreach ($institutes as $institute)
                                                    <option value="{{ $institute->id }}" @if ($course->institute->id == $institute->id) selected
                                                @endif>{{ $institute->first_name }}
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
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if ($course->hasCategories($category->id)) selected
                                                @endif>{{ $category->name }}</option>
                                                @if (count($category->childrenRecursive) > 0)
                                                    @include('partials.categoryEdit',
                                                    ['categories'=>$category->childrenRecursive,
                                                    'level'=>1])
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">برچسب</label>
                                            <select name="tags[]" class="form-control selectpicker" multiple>
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}" @if ($course->hasTags($tag->id)) selected
                                                @endif>{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row py-4">
                                        <div class="col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">توضیحات</label>
                                            <textarea class="form-control" name="description" rows="10"
                                                placeholder="توضیحات دوره را وارد نمایید">{{ $course->description }}</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row py-4">
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">قیمت</label>
                                            <input type="text" name="price" class="form-control  " placeholder="قیمت دوره"
                                                value="{{ $course->price }}">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">قیمت تخفیف
                                                خورده</label>
                                            <input type="text" name="discount_price" class="form-control  "
                                                placeholder="قیمت تخفیف خورده دوره" value="{{ $course->discount_price }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row py-4">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label class="font-size-h6 font-weight-bolder text-dark">آپلود فایل</label>
                                                <div class="custom-file mb-3">
                                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">فایل خود را انتخاب کنید</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="is-private" name="is-private">
                                                    <label class="custom-control-label" for="is-private">به صورت خصوصی آپلود شود</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            @empty(!$course->photo)
                                                    <img src="{{ asset('storage/' . $course->photo->filePath()) }}" alt="" class="img-thumbnail">
                                                @endempty
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">قابلیت چت</label>
                                        <div class="col-3">
                                            <span class="switch">
                                                <label>
                                                    
                                                    <input type="checkbox" name="chat" @if ($course->chat == true)checked="checked" @endif/>
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                        <label class="col-3 col-form-label">مشاهده لیست حضور غیاب توسط معلم</label>
                                        <div class="col-3">
                                            <span class="switch">
                                                <label>
                                                    <input type="checkbox" name="see_absences" @if ($course->see_absences == true)checked="checked" @endif/>
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-10">
                                        <label class="col-md-3 col-6 col-form-label">وضعیت</label>
                                        <div class="col-md-3 col-6 align-self-center">
                                            <div class="radio-inline">
                                                <label class="radio">
                                                    <input type="radio" name="status" value="public" @if ($course->status == 'public')checked="checked" @endif/>
                                                    <span></span>
                                                    عمومی
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="status" value="private" @if ($course->status == 'private')checked="checked" @endif/>
                                                    <span></span>
                                                    خصوصی
                                                </label>
                                            </div>
                                        </div>

                                        <label class="col-md-3 col-6 col-form-label">محدودیت دسترسی</label>
                                        <div class="col-md-3 col-6 align-self-center">
                                            <div class="radio-inline">
                                                <span class="switch">
                                                    <label>
                                                        <input type="checkbox" name="limited" @if ($course->limited == true)checked="checked" @endif/>
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mt-5">
                                        <input type="submit" class="btn btn-outline-success btn w-25" value="ویرایش دوره">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end::Tab Content-->
                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Content-->

@endsection
