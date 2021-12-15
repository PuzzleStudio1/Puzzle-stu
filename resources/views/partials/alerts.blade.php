@if (session('success'))
    <div class="alert alert-success">
        عملیات با موفقیت انجام شد
    </div>
@endif

@if (session('add to basket'))
    <div class="alert alert-success font-size-h4">
        دوره به سبد خرید شما اضافه شد،میتوانید با کلیک روی <a href="{{ route('basket.index') }}" class="alert-link">سبد خرید</a> ،خرید خود را نهایی کنید.
        
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger">
        عملیات با شکست مواجه شد.
    </div>
@endif

@if (session('file wrong'))
    <div class="alert alert-danger">
        لطفا فایل را اصلاح کنید.
    </div>
@endif

@if (session('classroom is live'))
    <div class="alert alert-danger">
        کلاس در حال برگزاری است و امکان حذف کلاس وجود ندارد.
    </div>
@endif

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if (session('file has exists'))
    <div class="alert alert-danger">
        فایلی با نام مشابه وجود دارد لطفا نام فایل را تغییر دهید.
    </div>
@endif

@if (session('invalidCode'))
    <div class="alert alert-danger">
        کد وارد شده اشتباه میباشد.
    </div>
@endif

@if (session('cantSendCode'))
<div class="alert alert-danger">
    مشکلی در هنگام ارسال کد به وجود آمده است.
</div>
@endif

@if (session('user is exists in course'))
<div class="alert alert-danger">
    کاربر مورد نظر هم اکنون دانش آموز دوره میباشد.
</div>
@endif

@if (session('number of user exists'))
<div class="alert alert-danger">
    شماره یکی از دانش آموز های وارد شده در سامانه موجود میباشد.
</div>
@endif

@if (session('phone number must be 11 digit'))
<div class="alert alert-danger">
    شماره تلفن دانش آموز باید 11 رقم باشد مثال:09123456789
</div>
@endif

@if (session('invalid code'))
<div class="alert alert-danger mt-2">
    کد دسترسی وارد شده نامعتبر است
</div>
@endif

@if (session('transaction failed'))
<div class="alert alert-danger">
    مشکلی در سیستم پرداخت بوجود آمده لطفا دوباره تلاش کنید.
</div>
@endif

@if (session('transaction unsuccessful'))
<div class="alert alert-danger">
    پردا خت شما ناموفق بود دوباره تلاش کنید.
</div>
@endif

@if (session('classroom has no link'))
<div class="alert alert-danger">
    کلاس انتخاب شده به عنوان دمو لینک ارشیوی ندارد ، برای اینکه کلاس به عنوان دموی دوره انتخاب شود ابتدا باید آرشیو شود.
</div>
@endif

@if (session('codeResent'))
<div class="alert alert-success">
    کد احراز هویت برای شما دوباره ارسال شد .
</div>
@endif

@if (session('userUpdate'))
<div class="alert alert-success">
    کاربر با موفقیت ویرایش شد.
</div>
@endif

@if (session('roleStore'))
<div class="alert alert-success">
    نقش با موفقیت اضافه شد.
</div>
@endif

@if (session('roleUpdate'))
<div class="alert alert-success">
    نقش با موفقیت ویرایش شد.
</div>
@endif

@if (session('roleDelete'))
<div class="alert alert-success">
    نقش با موفقیت حذف شد.
</div>
@endif

@if (session('permissionDelete'))
<div class="alert alert-success">
    دسترسی با موفقیت حذف شد.
</div>
@endif

@if (session('permissionStore'))
<div class="alert alert-success">
    دسترسی با موفقیت اضافه شد.
</div>
@endif

@if (session('userDelete'))
<div class="alert alert-success">
    کاربر با موفقیت حذف شد.
</div>
@endif

@if (session('userCreate'))
<div class="alert alert-success">
    کاربر با موفقیت اضافه شد.
</div>
@endif

@if (session('tagStore'))
<div class="alert alert-success">
    تگ با موفقیت اضافه شد.
</div>
@endif

@if (session('tagDelete'))
<div class="alert alert-success">
    تگ با موفقیت حذف شد.
</div>
@endif

@if (session('categoryStore'))
<div class="alert alert-success">
    دسته بندی با موفقیت اضافه شد.
</div>
@endif

@if (session('transaction confirm'))
<div class="alert alert-success">
    خرید با موفقیت انجام شد.
</div>
@endif

@if (session('notifCreate'))
<div class="alert alert-success">
    اطلاعیه با موفقیت ساخته شد.
</div>
@endif

@if (session('taskCreate'))
<div class="alert alert-success">
    کار با موفقیت ساخته شد.
</div>
@endif

@if (session('notifDelete'))
<div class="alert alert-success">
    اطلاعیه با موفقیت حذف شد.
</div>
@endif