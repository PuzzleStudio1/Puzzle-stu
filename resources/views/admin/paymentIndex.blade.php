@extends('layouts.admin')

@section('title', 'پازل استودیو | لیست فاکتور ها')

@section('css')

@endsection

@section('content')
    <!--begin::Content-->
    <div class="flex-row-fluid">
        <div class="card card-custom gutter-b shadow-none">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">لیست فاکتور ها</span>
                </h3>
            </div>
            <!--end::Header-->
            <div class="card-body">
                @include('partials.alerts')
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">کاربر</th>
                                <th class="text-center">شماره سفارش</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">محصول</th>
                                <th class="text-center">تاریخ پرداخت</th>
                                <th class="text-center">کد پیگیری</th>
                                <th class="text-center">وضعیت</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td class="text-center">{{ $payment->order->user->first_name.' '.$payment->order->user->last_name }}</td>
                                    <td class="text-center faNum">{{ $payment->order_id }}</td>
                                    <td class="text-center faNum">{{ number_format($payment->price) }}</td>
                                    <td class="text-center">@isset($payment->order->courses[0]){{ $payment->order->courses[0]->name . ' - ' . $payment->order->courses[0]->teacher->last_name }}@endisset</td>
                                    <td class="text-center faNum">{{ \Hekmatinasser\Verta\Verta::instance( $payment->created_at )->format('%d %B %Y - H:i') }}</td>
                                    <td class="text-center faNum">{{ $payment->ref_num}}</td>
                                    <td class="text-center">
                                        @if ($payment->status == 1)
                                        <span class="label label-success label-pill label-inline mr-2">پرداخت شده</span>
                                        @else
                                        <span class="label label-danger label-pill label-inline mr-2">پرداخت نشده</span>
                                        @endif</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">کاربر</th>
                                <th class="text-center">شماره سفارش</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">محصول</th>
                                <th class="text-center">تاریخ پرداخت</th>
                                <th class="text-center">کد پیگیری</th>
                                <th class="text-center">وضعیت</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="d-flex justify-content-center align-items-center flex-wrap p-6">
                    <div class="contaier">
                        <div class="d-flex flex-wrp py-2 mr-3 text-center faNum">
                            {{ $payments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Content-->

@endsection

@section('js')

@endsection
