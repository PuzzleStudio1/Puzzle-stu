@extends('layouts.admin')

@section('title', 'پازل استودیو | ویرایش پخش کننده')

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
                                    <span class="card-label font-weight-bolder text-dark">ویرایش پخش کننده</span>
                                </h3>
                            </div>
                            <!--end::Header-->
                            <div class="card-body">
                                @include('partials.alerts')
                                <form method="post" action="{{ route('player.update',$player->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">نام پخش کننده</label>
                                            <input type="text" value="{{ $player->name }}" name="name"
                                                class="form-control  " placeholder="نام پخش کننده">
                                            @if ($errors->has('name'))
                                                <small class="form-text text-danger"> {{ $errors->first('name') }} </small>
                                            @endif
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">راهنمای پخش کننده</label>
                                            <input type="text" value="{{ $player->help }}" name="help" class="form-control "
                                                placeholder="کد پخش کننده">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label class="font-size-h6 font-weight-bolder text-dark">کد پخش کننده</label>
                                            <textarea class="form-control" name="code" id="" rows="5"
                                                placeholder="راهنمای پخش کننده ...">{{ $player->code }}
                                            </textarea>
                                            @if ($errors->has('code'))
                                                <small class="form-text text-danger"> {{ $errors->first('code') }} </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <input type="submit" class="btn btn-outline-success btn sm w-100"
                                                value="ویرایش">
                                        </div>
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
