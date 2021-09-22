<div class="mt-4">
    <div class="mb-4">
        <h2 class="heading" data-total="" data-xhr="total">@lang('حساب‌های بانکی')</h2>
    </div>
    <div class="border border-gray-300 rounded p-4">
        <form action="{{ route('dashboard.center.bank.store', $center->id) }}" method="POST">
            <div>
                <label for="sheba" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('شماره شبا')</label>
                <div class="">
                    <div class="w-full relative" x-data='{"IBAN" : null, "IBANString" : null}'>
                        <input type="number" name="isbn" :value="IBAN" x-model="IBAN" x-effect="IBANString = IBAN ?`IR-${IBAN.substr(0,2)}${'0'.repeat(2 - IBAN.substr(0,2).length)}-${IBAN.substr(2,3)}${'0'.repeat(3 - IBAN.substr(2,3).length)}-${IBAN.substr(5,1) || '0'}-${IBAN.substr(6, 18)}${'0'.repeat(18 - IBAN.substr(6,18).length)}` : null" id="sheba" class="border border-gray-300 h-10 rounded pr-4 pl-14 w-full text-sm dir-ltr focus">
                        <span class="absolute left-1 top-1 text-sm flex items-center justify-center bg-gray-200 rounded px-4 h-8 cursor-default pt-0.5">@lang('IR')</span>
                        <span class="block text-sm text-gray-500 dir-ltr text-left mt-2 cursor-default" x-text="IBANString"></span>
                    </div>
                    <div class="mt-4 flex">
                        <button type="submit" class="bg-brand rounded-full h-9 px-8 text-white text-sm hover:bg-blue-700 transition focus">
                            @lang('افزودن حساب بانکی')
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @include('dashboard.centers.accounting.bank.bankAccounts')
</div>
