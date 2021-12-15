@extends('layouts.admin')

@section('title', 'پازل استودیو | کد ورودها')

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        @include('partials.alerts')
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">لیست کدهای تایید ورود</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--Begin::Body-->
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">کد تایید</th>
                            <th scope="col">شماره موبایل</th>
                            <th scope="col">نام و نام خانوادگی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($twofactors as $twofactor)
                            <tr>
                                <td>{{ $twofactor->code }}</td>
                                <td>{{ $twofactor->user->phone }}</td>
                                <td>{{ $twofactor->user->first_name }} {{ $twofactor->user->last_name }}</td>
                            </tr>
                        @empty
                            <p>
                                هیچ کد ورودی یافت نشد.
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
