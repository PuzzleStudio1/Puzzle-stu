@extends('layouts.admin')

@section('title', 'پازل استودیو | فاکتور ساز')

@section('css')
<link rel="stylesheet" href="{{ asset('css/persian-datepicker.min.css')}}" />

<script src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{ asset('js/persian-date.min.js')}}" defer></script>
<script src="{{ asset('js/persian-datepicker.min.js')}}" defer></script>
@endsection

@section('content')
<!--begin::Content-->
<div class="flex-row-fluid">
    @include('partials.alerts')

    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title font-weight-bolder">
                فاکتور ساز
            </h3>
        </div>
        <!--begin::Form-->
        <form class="form" method="post" action="{{ route('admin.invoiceDemo') }}" >
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>شماره فاکتور:</label>
                    <input type="tel" class="form-control form-control-solid form-control-lg"
                        placeholder="شماره فاکتور" name="invoice_num"/>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>نام مشتری/شرکت:</label>
                        <input type="text" class="form-control form-control-solid form-control-lg"
                            placeholder="نام مشتری/شرکت" name="invoice_co" />
                    </div>
                    <div class="col-lg-6">
                        <label>آدرس یا سایر توضیحات مشتری:</label>
                        <textarea class="form-control form-control-solid form-control-lg" name="invoice_co_desc" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>تاریخ فاکتور:</label>
                        <input type="text" class="form-control form-control-solid form-control-lg initial-value-example"
                            placeholder="تاریخ فاکتور" name="invoice_date1" />
                    </div>
                    <div class="col-lg-6">
                        <label>تاریخ سررسید فاکتور:</label>
                        <input type="text" class="form-control form-control-solid form-control-lg initial-value-example"
                            placeholder="تاریخ سررسید فاکتور" name="invoice_date2" />
                    </div>
                </div>
                <hr class="my-15">
                <div class="form-group row align-items-center border border-3 rounded py-4">
                    <div class="col-lg-1">
                        <a class="btn btn-dark w-100">ردیف یک</a>
                    </div>
                    <div class="col-lg-7">
                        <label>شرح:</label>
                        <input type="text" class="form-control form-control-solid form-control-lg"
                            placeholder="شرح" name="invoice_item_1_desc" />
                    </div>
                    <div class="col-lg-2">
                        <label>تعداد ساعت:</label>
                        <input type="number" class="form-control form-control-solid form-control-lg"
                            placeholder="ساعت" name="invoice_item_1_time" />
                    </div>
                    <div class="col-lg-2">
                        <label>قیمت هر ساعت:</label>
                        <input type="number" class="form-control form-control-solid form-control-lg"
                            placeholder="هر ساعت" name="invoice_item_1_pertime" />
                    </div>
                </div>
                <div class="form-group row align-items-center border border-3 rounded py-4">
                    <div class="col-lg-1">
                        <a class="btn btn-dark w-100">ردیف دو</a>
                    </div>
                    <div class="col-lg-7">
                        <label>شرح:</label>
                        <input type="text" class="form-control form-control-solid form-control-lg"
                            placeholder="شرح" name="invoice_item_2_desc" />
                    </div>
                    <div class="col-lg-2">
                        <label>تعداد ساعت:</label>
                        <input type="number" class="form-control form-control-solid form-control-lg"
                            placeholder="ساعت" name="invoice_item_2_time" />
                    </div>
                    <div class="col-lg-2">
                        <label>قیمت هر ساعت:</label>
                        <input type="number" class="form-control form-control-solid form-control-lg"
                            placeholder="هر ساعت" name="invoice_item_2_pertime" />
                    </div>
                </div>
                <div class="form-group row align-items-center border border-3 rounded py-4">
                    <div class="col-lg-1">
                        <a class="btn btn-dark w-100">ردیف سه</a>
                    </div>
                    <div class="col-lg-7">
                        <label>شرح:</label>
                        <input type="text" class="form-control form-control-solid form-control-lg"
                            placeholder="شرح" name="invoice_item_3_desc" />
                    </div>
                    <div class="col-lg-2">
                        <label>تعداد ساعت:</label>
                        <input type="number" class="form-control form-control-solid form-control-lg"
                            placeholder="ساعت" name="invoice_item_3_time" />
                    </div>
                    <div class="col-lg-2">
                        <label>قیمت هر ساعت:</label>
                        <input type="number" class="form-control form-control-solid form-control-lg"
                            placeholder="هر ساعت" name="invoice_item_3_pertime" />
                    </div>
                </div>
                <div class="form-group row align-items-center border border-3 rounded py-4">
                    <div class="col-lg-1">
                        <a class="btn btn-dark w-100">ردیف چهار</a>
                    </div>
                    <div class="col-lg-7">
                        <label>شرح:</label>
                        <input type="text" class="form-control form-control-solid form-control-lg"
                            placeholder="شرح" name="invoice_item_4_desc" />
                    </div>
                    <div class="col-lg-2">
                        <label>تعداد ساعت:</label>
                        <input type="number" class="form-control form-control-solid form-control-lg"
                            placeholder="ساعت" name="invoice_item_4_time" />
                    </div>
                    <div class="col-lg-2">
                        <label>قیمت هر ساعت:</label>
                        <input type="number" class="form-control form-control-solid form-control-lg"
                            placeholder="هر ساعت" name="invoice_item_4_pertime" />
                    </div>
                </div>
                <div class="form-group row align-items-center border border-3 rounded py-4">
                    <div class="col-lg-1">
                        <a class="btn btn-dark w-100">ردیف پنج</a>
                    </div>
                    <div class="col-lg-7">
                        <label>شرح:</label>
                        <input type="text" class="form-control form-control-solid form-control-lg"
                            placeholder="شرح" name="invoice_item_5_desc" />
                    </div>
                    <div class="col-lg-2">
                        <label>تعداد ساعت:</label>
                        <input type="number" class="form-control form-control-solid form-control-lg"
                            placeholder="ساعت" name="invoice_item_5_time" />
                    </div>
                    <div class="col-lg-2">
                        <label>قیمت هر ساعت:</label>
                        <input type="number" class="form-control form-control-solid form-control-lg"
                            placeholder="هر ساعت" name="invoice_item_5_pertime" />
                    </div>
                </div>


                <div class="form-group">
                    <label>مبلغ تخفیف(تومان):</label>
                    <input type="text" class="form-control form-control-solid form-control-lg"
                        placeholder="مبلغ تخفیف" name="invoice_discount" />
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2 btn-lg font-weight-bolder">ساخت فرم</button>
            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
<!--end::Content-->
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.initial-value-example').persianDatepicker({
            initialValueType: 'persian',
            altFormat: 'YYYY/MM/DD',
            format: 'YYYY/MM/DD',
            timePicker: {
                enabled: false
            }
        });
    });
</script>
@endsection