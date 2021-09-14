<div class="mt-4">
    <div class="mb-4">
        <h2 class="heading" data-total="" data-xhr="total">@lang('حساب‌های بانکی')</h2>
    </div>
    <div class="border border-gray-300 rounded p-4">
        <div>
            <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('شماره شبا')</label>
            <div class="">
                <div class="w-full relative">
                    <input type="number" name="sheba" id="sheba" class="border border-gray-300 h-10 rounded pr-4 pl-14 w-full text-sm dir-ltr focus">
                    <span class="absolute left-1 top-1 text-sm flex items-center justify-center bg-gray-200 rounded px-4 h-8 cursor-default pt-0.5">@lang('IR')</span>
                </div>
                <div class="mt-6 flex justify-end">
                    <button class="bg-brand rounded-full h-9 px-8 text-white text-sm hover:bg-blue-700 transition focus">
                        @lang('افزودن حساب بانکی')
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.centers.accounting.checkout.bankAccounts')
</div>