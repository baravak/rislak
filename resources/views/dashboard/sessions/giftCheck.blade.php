<div x-show="amount !== null">
    <div class="mt-4">
        <label for="gift_code" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Gift')</label>
        <div class="flex flex-col xs:flex-row">
            <div class="w-full relative">
                <input type="text" id="gift_code" class="border border-gray-500 h-10 rounded px-4 w-full text-sm dir-ltr focus placeholder-gray-300 pb-2 en" x-on:change="gift_code = (gift_code || '').replace(/^[^\-]{9}-/, ''); document.querySelector('#giftCheck').dispatchEvent(new CustomEvent('link'))" x-model="gift_code" value="{{ isset($callbackPayment->gift_code) ? substr($callbackPayment->gift_code, 10) : '' }}">
                {{-- <span class="absolute left-1 top-1 px-2 rounded text-sm text-gray-500 flex items-center h-8 cursor-default dir-ltr text-left pt-0.5">{{ $center->id }} -</span> --}}
            </div>
            <input type="hidden" name="gift_code" value="{{ isset($callbackPayment->gift_code) ? $callbackPayment->gift_code : ''}}" :value="gift_code ? '{{ $center->id }}-' + gift_code : ''">

            <button id="giftCheck" data-lijax data-action="/dashboard/giftCheck" x-on:link="$el.setAttribute('data-action', '/dashboard/giftCheck/{{ $center->id }}-'+(gift_code || '').replace(/^{{ $center->id }}\-/, '')+'?region={{ $center->id }}&amount=' + amount); if(gift.title){gift.amount = gift.type == 'percent' ? Math.max(0, (amount * (100 - gift.value))/100) : Math.max(0, amount - gift.value)}" class="mt-2 xs:mt-0 xs:mr-2 flex-shrink-0 text-sm text-white px-8 h-10 rounded bg-green-600 hover:bg-green-700 transition focus-current ring-green-600" data-lijax x-on:statio-done="gift = event.detail; gift_type = event.detail.type;">@lang('اعمال کد تخفیف')</button>
        </div>
    </div>
    <div class="mt-6 p-4 bg-gray-50 border-2 border-gray-300 border-dashed rounded cursor-default">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between">
            <span class="text-sm text-gray-500">هزینه جلسه</span>
            <div class="flex items-center justify-end mt-0.5">
                <span class="text-sm text-gray-500 variable-font-medium" x-data="amontifa('amount')"></span>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-2" x-show="gift && gift.title">
            <div class="text-sm text-gray-500">کد تخفیف: <span class="text-green-600 variable-font-medium" x-text="gift.title"></span></div>
            <div class="flex items-center justify-end mt-0.5">
                <div class="text-sm text-green-600 variable-font-medium">
                    <span x-text="gift.type == 'percent' ? '٪' : ''"></span>
                    <span x-text="gift.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '،')"></span>
                    <span x-text="gift.type == 'percent' ? '' : 'تومنء'"></span>
                </div>
                <button type="button" class="flex items-center justify-center w-4 h-4 rounded-full text-gray-500 hover:text-red-600 mr-2 focus-current ring-red-600" title="@lang('حذف کد تخفیف')" @click="gift_code = null; gift = {title:null, type:'percent', value:0, amount:0}; document.querySelector('#giftCheck').dispatchEvent(new CustomEvent('link'))">
                    <i class="fal fa-times-circle"></i>
                </button>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-2" x-show="gift && gift.title">
            <span class="text-sm text-gray-500">هزینه جلسه با احتساب تخفیف</span>
            <div class="flex items-center justify-end mt-0.5">
                <span class="text-sm text-gray-500 variable-font-medium" x-data="amontifa('gift.amount')"></span>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-4 pt-2 border-t border-gray-300" x-show="wallet">
            <span class="text-sm text-gray-500">اعتبار کیف پول</span>
            <div class="flex items-center justify-end mt-0.5">
                <span class="text-sm text-gray-500 variable-font-medium" x-data="amontifa('wallet')"></span>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mt-2">
            <span class="text-sm text-gray-500">مبلغ قابل پرداخت</span>
            <span class="text-gray-600 variable-font-semibold mt-0.5 text-left" x-data="amontifa('(Math.max(0, (gift.amount || amount) - wallet))')"></span>
        </div>
    </div>
</div>
