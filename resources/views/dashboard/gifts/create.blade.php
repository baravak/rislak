@extends($layouts->dashboard)
@section('content')
<form class="m-auto w-full md:w-1/2" action="{{ route('dashboard.gifts.store', $center->id) }}" method="POST">
    <div class="border border-gray-300 rounded p-4 mt-8">
        <div>
            <label for="title" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Title') }}</label>
            <input type="text" name="title" id="title" autocomplete="off" placeholder="مثال: یلدا 1400" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-gray-600 placeholder-gray-300 focus">
        </div>

        <div class="grid grid-cols-1 xs:grid-cols-2 gap-4 mt-4" x-data='{type : "percent", "value_n" : 0}'>
            <div>
                <label class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('نوع مقدار') }}</label>
                <div class="flex items-center radio-select">
                    <input checked type="radio" name="type" id="percent" value="percent" class="sr-only" x-model="type">
                    <label for="percent" class="w-1/2 flex items-center justify-center h-10 border border-l-0 border-gray-400 rounded rounded-l-none text-sm text-gray-600 cursor-pointer">
                        @lang('درصد')
                    </label>
                    <input type="radio" name="type" id="numeral" class="sr-only"  value="numeral" x-model="type">
                    <label for="numeral" class="w-1/2 flex items-center justify-center h-10 border border-r-0 border-gray-400 rounded rounded-r-none text-sm text-gray-600 cursor-pointer">
                        @lang('مبلغ ثابت')
                    </label>
                </div>
            </div>
            <div>
                <div x-show="type == 'numeral'">
                        <label for="value-n" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('مقدار تخفیف') }}</label>
                        <div class="w-full relative">
                            <input type="number" :disabled="type != 'numeral'" name="value" id="value-n" class="border border-gray-400 h-10 rounded pr-4 pl-16 w-full text-sm text-gray-600 dir-ltr focus" x-model="value_n">
                            <span class="absolute left-1 top-1 bg-gray-200 px-3 rounded text-xs flex items-center h-8 cursor-default">@lang('Toman')</span>
                            <span class="block text-xs text-gray-500 text-left mt-2 cursor-default" x-text="(value_n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '،') || '0') + ' تومان'">0 تومان</span>
                        </div>
                </div>
                <div x-show="type == 'percent'">
                        <label for="value-p" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('مقدار تخفیف') }}</label>
                        <div class="w-full relative">
                        <input type="number"  :disabled="type != 'percent'" name="value" id="value-p" class="border border-gray-400 h-10 rounded pr-4 pl-16 w-full text-sm text-gray-600 dir-ltr focus">
                        <span class="absolute left-1 top-1 bg-gray-200 px-3 rounded text-xs flex items-center h-8 cursor-default">@lang('Percentage')</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 xs:grid-cols-2 gap-4 mt-4">
            <div>
                <label for="started_at-input" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Start date') }}</label>
                <input type="text" id="started_at-input" data-picker-alt="started_at" dpicker-format="YYYY/MM/DD" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-gray-600 focus date-picker dir-ltr text-left">
                <input type="hidden" name="started_at" id="started_at" >
            </div>
            <div x-data='{"disable" : true}'>
                <div class="block mb-1">
                    <input type="checkbox" class="w-4 h-4 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1" x-model="disable">
                    <label for="expires_at-input" class=" text-sm text-gray-700 variable-font-medium cursor-default">{{ __('End date') }}</label>
                </div>
                <input type="text" id="expires_at-input" data-picker-alt="expires_at" dpicker-format="YYYY/MM/DD" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-gray-600 focus date-picker dir-ltr text-left" :disabled="disable" :class='{"opacity-40" : disable}'>
                <input type="hidden" name="expires_at" id="expires_at"  :disabled="disable">
            </div>
        </div>

        <div class="mt-4">
            <label for="threshold" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('تعداد دفعات قابل استفاده') }}</label>
            <input type="number" name="threshold" id="threshold" autocomplete="off" placeholder="مثال: 20" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-gray-600 placeholder-gray-300 focus">
        </div>

        <div class="mt-4">
            <label class="inline-flex items-center group">
                <input type="checkbox" name="disposable" id="disposable" class="w-4 h-4 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600 pt-0.5">{{ __('هر کاربر بتواند بیش از یکبار از این کد استفاده کند') }}</span>
            </label>
        </div>

        <div class="mt-4">
            <label for="exclusive_users" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('کاربران مجاز') }}</label>
            <select name="exclusive_users" id="exclusive_users" data-placeholder="{{ __('کاربری انتخاب نشده است') }}" class="select2-select"></select>
            <div class="flex text-xs text-gray-400 mt-2">
                <i class="fal fa-info-circle ml-1"></i>
                <span>شما می‌توانید با جستجو از طریق شماره موبایل و یا نام، کاربرانی که فقط آن‌ها مجاز به استفاده از این کد می‌باشند را انتخاب کنید. در صورتی که می‌خواهید همه از این کد استفاده کنند، این بخش را خالی بگذارید.</span>
            </div>
        </div>

        <div class="mt-4">
            <label for="description" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Description') }}</label>
            <textarea id="description" name="description"  rows="3" class="resize-none border border-gray-500 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus"></textarea>
        </div>
    </div>
    <div class="mt-6">
        <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus" title="@lang('ساخت کد تخفیف')" aria-label="@lang('ساخت کد تخفیف')" role="button">
            @lang('ساخت کد تخفیف')
        </button>
        <a href="#" class="text-sm text-gray-500 hover:text-gray-700 transition" title="انصراف" aria-label="انصراف">انصراف</a>
    </div>
</form>
@endsection
