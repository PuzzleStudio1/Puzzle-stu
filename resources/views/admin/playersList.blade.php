@extends('layouts.admin')

@section('title','پازل استودیو | لیست پخش کننده ها')

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        @include('partials.alerts')
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">افزودن پخش کننده</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <form method="post" action="{{ route('player.store') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">نام پخش کننده</label>
                            <input type="text" name="name" class="form-control  " placeholder="نام پخش کننده">
                            @if ($errors->has('name'))
                            <small class="form-text text-danger"> {{ $errors->first('name') }} </small>
                            @endif
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">راهنمای پخش کننده</label>
                            <input type="text" name="help" class="form-control " placeholder="راهنمای پخش کننده ...">
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="font-size-h6 font-weight-bolder text-dark">کد پخش زنده</label>
                            <textarea class="form-control" name="code" id="" rows="5" placeholder="کد پخش کننده"></textarea>
                            @if ($errors->has('code'))
                            <small class="form-text text-danger"> {{ $errors->first('code') }} </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <input type="submit" class="btn btn-outline-success btn sm w-100" value="افزودن">
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Body-->
        </div>
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">لیست پخش کننده ها</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">نام</th>
                            <th scope="col">کد</th>
                            <th scope="col">توضیحات</th>
                            <th scope="col">عملیات</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($players as $player)
                            <tr>
                                <td> {{ $player->name }} </td>
                                <td> {{ $player->code }} </td>
                                <td> {{ $player->help }} </td>
                                
                                <td>
                                    <a href="{{ route('player.edit', $player->id) }}" class="btn btn-success">
                                        ویرایش
                                    </a>
                                    <div class="display-inline-block">
                                        <form method="post" action="{{ route('player.destroy', $player->id) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" class="btn btn-danger" value="حذف">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <p>
                                هیچ پخش کننده ای برای نمایش وجود ندارد.
                            </p>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!--end::Body-->
        </div>
    </div>
    <!--end::Content-->
@endsection
