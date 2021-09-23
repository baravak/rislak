<div class="mt-4">
    <div class="mb-4">
        <h2 class="heading" data-total="" data-xhr="total">@lang('تسویه حساب')</h2>
    </div>
    {{-- <div class="border border-gray-300 px-4 py-2 mb-2 bg-gray-100 rounded">
        <div class="text-xs text-gray-600 cursor-default leading-6">
            <span>آخرین تسویه حساب شما به صورت</span>
            <span class="variable-font-semibold">روزانه</span>
            <span>در تاریخ</span>
            <span class="variable-font-semibold">دوشنبه 25,02,1400 - ساعت 05:42</span>
            <span>به مبلغ</span>
            <span class="variable-font-semibold">125,000 تومان</span>
            <span>و به شماره</span>
            <span class="variable-font-semibold">IR0111123</span>
            <span>درخواست داده شده است.</span>
        </div>
    </div> --}}
    <div class="border border-gray-300 rounded p-4">
        @if ($bank->items && $bank->items->where('status', 'verified')->count())
            @include('dashboard.centers.accounting.bank.checkoutDetails')
        @else
            @include('dashboard.centers.accounting.bank.checkoutNotAvailable')
        @endif
    </div>
</div>
