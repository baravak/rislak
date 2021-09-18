<div class="mt-4">
    <div class="mb-4">
        <h2 class="heading" data-total="" data-xhr="total">@lang('تسویه حساب')</h2>
    </div>
    <div class="border border-gray-300 rounded p-4">
        @if ($bank->items && $bank->items->where('status', 'verified')->count())
            @include('dashboard.centers.accounting.bank.checkoutDetails')
        @else
            @include('dashboard.centers.accounting.bank.checkoutNotAvailable')
        @endif
    </div>
</div>
