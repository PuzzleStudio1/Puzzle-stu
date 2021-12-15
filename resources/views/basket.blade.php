@extends('layouts.index')

@inject('basket' , 'App\Support\Basket\Basket')

@section('title', 'پازل استودیو | صفحه خرید')

@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Row-->
            <div class="row my-6">
                @include('partials.alerts')
            </div>

            @if ($items->isEmpty())
                <p>
                    سبد خرید شما خالی میباشد.
                </p>
            @else


                <div class="row my-6">
                    <div class="col-md-7 col-12">
                        <div class="card card-custom bgi-no-repeat gutter-b card-stretch p-5">
                            <div class="card-body well">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">نام محصول</th>
                                            <th class="text-center">حذف</th>
                                            <th class="text-center">قیمت محصول</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td class="text-center"><img src="{{ asset('storage/' . $item->photo->filePath()) }}"
                                                    width="60px" /></td>
                                                <td class="text-center"> {{ $item->name }} </td>
                                                <td class="text-center"><a href="{{ route('basket.remove', $item->id) }}"
                                                    class="btn btn-icon btn-outline-danger btn-sm">
                                                    <i class="flaticon-delete-1"></i>
                                                </a></td>
                                                <td class="text-center"> {{ number_format($item->price) }} تومان</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="card card-custom bgi-no-repeat gutter-b card-stretch p-5">
                            <div class="card">
                                <div class="card-body py-2 px-6">
                                    <h4 class="my-6">پرداخت</h4>
                                    <table class='table my-6'>
                                        <tr>
                                            <td>مبلغ کل</td>
                                            <td> {{ number_format($basket->subTotal()) }} تومان</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="{{ route('basket.checkout') }}" class="btn mt-4  btn-primary btn-lg w-100 d-block">ثبت
                                و
                                پرداخت</a>
                        </div>
                    </div>
                </div>
            @endif
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection

@section('footer')
    @include('partials.footer')
@endsection
