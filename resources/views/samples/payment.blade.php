@php
    $amount = $sample->chain ? $sample->chain->list->where('purchased', false)->sum('amount') : $sample->amount;
    $billings = $sample->chain ? $sample->chain->list->where('billing.id', '<>', null)->pluck('billing.id')->toArray() : [$sample->billing->id];
@endphp
<div class="flex items-center justify-center h-screen px-8" x-data="{amount : {{ $amount }}, wallet:{{ auth()->user()->treasuries->where('symbol', 'wallet')->first()->balance ?: '0' }}, gift : {}, gift_code: null}">
    <div class="w-full sm:w-96">
        <h1 class="text-center text-brand variable-font-bold mb-6 text-xl">@lang('ریسلو')</h1>
        <div class="flex flex-col items-center border border-gray-200 shadow-lg rounded-xl px-4 py-6">
            <div class="flex flex-col items-center cursor-default">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-14 h-14 rounded-full bg-blue-50">
                        <i class="fal fa-credit-card text-blue-600 text-2xl"></i>
                    </div>
                    <div class="flex items-center justify-center w-14 h-14 rounded-full bg-blue-50 -mr-2 ring-4 ring-white">
                        <i class="fal fa-ballot-check text-blue-600 text-2xl"></i>
                    </div>
                </div>
                <h2 class="variable-font-bold text-gray-700 mt-4">@lang('پرداخت و اجرای آزمون')</h2>
            </div>
            <div class="flex items-center justify-between mt-6 w-full cursor-default text-xs xs:text-sm text-gray-500">
                <span>هزینه آزمون</span>
                <span class="variable-font-medium" x-currency.3="amount"></span>
            </div>
            <template x-if="gift.value">
                <div class="flex items-center justify-between mt-2 w-full text-xs xs:text-sm">
                    <div class="text-gray-500">کد تخفیف: <span class="text-green-600 variable-font-medium">یلدا 1400</span></div>
                    <div class="flex items-center justify-end mt-0.5">
                        <div class="text-green-600 variable-font-medium">
                            <span x-text="gift.type == 'percent' ? '٪' : ''"></span>
                            <span x-text="gift.value ? gift.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '،') : 0"></span>
                            <span x-text="gift.type == 'percent' ? '' : 'تومانءءء'"></span>
                        </div>
                        <button type="button" class="flex items-center justify-center w-4 h-4 rounded-full text-gray-500 hover:text-red-600 mr-2 focus-current ring-red-600" title="@lang('حذف کد تخفیف')" @click="gift_code = null; gift = {title:null, type:'percent', value:0, amount:0}; document.querySelector('#giftCheck').dispatchEvent(new CustomEvent('link'))">
                            <i class="fal fa-times-circle"></i>
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-2 w-full text-xs xs:text-sm text-gray-500">
                    <span>هزینه آزمون با تخفیف</span>
                    <div class="flex items-center justify-end mt-0.5">
                        <span class="variable-font-medium" x-currency.3="amount"></span>
                    </div>
                </div>
            </template>
            <div class="mt-4 pt-2 border-t border-gray-300 w-full flex flex-col">
                <div class="flex items-center justify-between mt-2 text-xs xs:text-sm text-gray-500">
                    <span>اعتبار کیف پول</span>
                    <div class="flex items-center justify-end mt-0.5">
                        <span class="variable-font-medium" x-currency.3="wallet"></span>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-xs xs:text-sm text-gray-500">مبلغ قابل پرداخت</span>
                    <span class="text-sm xs:text-base text-gray-600 variable-font-semibold mt-0.5 text-left" x-currency.3="(wallet >= amount ? 0 : amount - wallet)"></span>
                </div>
            </div>
        </div>
        <div class="mt-4" x-show="false">
            <label for="gift_code" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Gift')</label>
            <div class="flex">
                <input type="text" id="gift_code" class="border border-gray-500 h-9 rounded px-4 w-full text-sm dir-ltr focus placeholder-gray-300 pb-2 en">
                <input type="hidden" name="gift_code">
                <button id="giftCheck" class="mr-2 flex-shrink-0 text-xs text-green-700 px-8 h-9 rounded border border-green-100 bg-green-50 hover:bg-green-500 hover:text-white transition focus-current ring-green-600">@lang('اعمال کد')</button>
            </div>
        </div>
        <button x-lijax:click data-action="{{ $sample->billing ? route('dashboard.billings.settled', $sample->billing->id) : route('dashboard.samples.purchase', $sample->id)  }}"  data-method="POST" class="direct flex items-center justify-center text-white text-sm bg-green-500 hover:bg-green-600 transition rounded-full h-10 mt-6 focus-current ring-green-500 spinner">@lang('پرداخت')</button>
        @if (!$sample->prepayment)
            <a href="{{ urldecode(route('samples.form', ['sample' => $sample->id, 'skipPayment' => true])) }}" class="direct flex items-center justify-center text-brand text-sm hover:bg-blue-50 border border-brand transition rounded-full h-10 mt-2 focus spinner">@lang('اجرای آزمون بدون پرداخت')</a>
        @endif
    </div>
</div>
