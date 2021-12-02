@extends($layouts->dashboard)
@section('content')
<form class="m-auto w-full md:w-1/2" action="{{ isset($gift) ? route('dashboard.gifts.update', [$center->id, $gift->id])  : route('dashboard.gifts.store', $center->id) }}" method="POST">
    @method(isset($gift) ? 'PUT' : 'POST')
    <div class="border border-gray-300 rounded p-4 mt-8">
        @isset($gift)
            @if ($gift->status == 'expires')
                <div class="flex px-4 py-3 bg-red-50 text-red-600 rounded mb-4">
                    <i class="fal fa-engine-warning ml-3 text-lg"></i>
                    @if ($gift->expires_at && $gift->expires_at->timestamp <= time())
                        <span class="pt-1 text-sm">این کد تخفیف به دلیل سررسید زمان تعیین شده برای انقضاء، منقضی شده است.</span>
                    @elseif($gift->threshold && $gift->usage_count >= $gift->threshold)
                        <span class="pt-1 text-sm">این کد تخفیف به دلیل رسیدن به مقدار حداکثری تعیین شده برای استفاده، منقضی شده است.</span>
                    @else
                        <span class="pt-1 text-sm">این کد تخفیف به صورت دستی، منقضی شده است.</span>
                    @endif
                </div>
            @endif
        @endisset
        <div>
            <label for="title" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Title') }}</label>
            <input type="text" name="title" id="title" @formValue($gift->title) autocomplete="off" placeholder="مثال: یلدا 1400" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-gray-600 placeholder-gray-300 focus">
        </div>
        <div class="grid grid-cols-1 xs:grid-cols-2 gap-4 mt-4" x-data='{type : "{{ isset($gift) ? $gift->type : 'percent' }}", "value_n" : {{ isset($gift) && $gift->type == 'numeral' ? $gift->value : 'null' }}}'>
            <div>
                <label class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('نوع مقدار') }}</label>
                <div class="flex items-center radio-select">
                    <input checked type="radio" name="type" id="percent" value="percent" class="sr-only" x-model="type" @radioChecked($gift->type, 'percent')>
                    <label for="percent" class="w-1/2 flex items-center justify-center h-10 border border-l-0 border-gray-400 rounded rounded-l-none text-sm text-gray-600 cursor-pointer">
                        @lang('درصد')
                    </label>
                    <input type="radio" name="type" id="numeral" class="sr-only"  value="numeral" x-model="type" @radioChecked($gift->type, 'numeral')>
                    <label for="numeral" class="w-1/2 flex items-center justify-center h-10 border border-r-0 border-gray-400 rounded rounded-r-none text-sm text-gray-600 cursor-pointer">
                        @lang('مبلغ ثابت')
                    </label>
                </div>
            </div>
            <div>
                <div x-show="type == 'numeral'">
                        <label for="value-n" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('مقدار تخفیف') }}</label>
                        <div class="w-full relative">
                            <input type="number" :disabled="type != 'numeral'" name="value" id="value-n" class="border border-gray-400 h-10 rounded pr-4 pl-14 w-full text-sm text-gray-600 dir-ltr focus" x-model="value_n" value="{{ isset($gift) && $gift->type == 'numeral' ? $gift->value : '' }}">
                            <span class="absolute left-1 top-1 bg-gray-200 px-3 rounded text-xs flex items-center h-8 cursor-default">تومانءءء</span>
                            <span class="block text-xs text-gray-500 text-left mt-2 cursor-default" x-text="((value_n || '').toString().replace(/\B(?=(\d{3})+(?!\d))/g, '،') || '0') + ' تومان'">0 تومان</span>
                        </div>
                </div>
                <div x-show="type == 'percent'">
                        <label for="value-p" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('مقدار تخفیف') }}</label>
                        <div class="w-full relative">
                        <input type="number"  :disabled="type != 'percent'" name="value" id="value-p" class="border border-gray-400 h-10 rounded pr-4 pl-11 w-full text-sm text-gray-600 dir-ltr focus" value="{{ isset($gift) && $gift->type == 'percent' ? $gift->value : '' }}">
                        {{-- <span class="absolute left-1 top-1 bg-gray-200 px-3 rounded flex items-center h-8 cursor-default">٪</span> --}}
                        <i class="far fa-percentage absolute left-1 top-1 bg-gray-200 text-sm text-gray-600 px-3 rounded flex items-center h-8 cursor-default"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 xs:grid-cols-2 gap-4 mt-4">
            <div>
                <label for="started_at-input" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Start date') }}</label>
                <input type="text" id="started_at-input" data-picker-alt="started_at" dpicker-format="YYYY/MM/DD" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-gray-600 focus date-picker dir-ltr text-left" value="{{ isset($gift) ? $gift->started_at->timestamp : '' }}">
                <input type="hidden" name="started_at" id="started_at" >
            </div>
            <div x-data='{"expires_at" : {{ isset($gift) && $gift->expires_at ? 'true' : 'false' }}}'>
                <div class="flex items-center justify-between mb-2">
                    <label class=" text-sm text-gray-700 variable-font-medium cursor-default">{{ __('End date') }}</label>
                    <div class="relative inline-block w-8 align-middle select-none transition ease-in-out duration-700">
                        <input type="checkbox" id="expires_avalible" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer" x-model="expires_at">
                        <label for="expires_avalible" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>
                <input type="text" id="expires_at-input" data-picker-alt="expires_at" dpicker-format="YYYY/MM/DD" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-gray-600 focus date-picker dir-ltr text-left" :disabled="!expires_at" :class='{"opacity-40" : !expires_at}' value="{{ isset($gift) && $gift->expires_at ? $gift->expires_at->timestamp : '' }}">
                <input type="hidden" name="expires_at" id="expires_at"  :disabled="!expires_at">
            </div>
        </div>

        <div class="mt-4">
            <label for="threshold" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('تعداد دفعات قابل استفاده') }}</label>
            <input type="number" name="threshold" id="threshold" autocomplete="off" placeholder="مثال: 20" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-gray-600 placeholder-gray-300 focus" @formValue($gift->threshold)>
        </div>

        <div class="mt-4">
            <label class="inline-flex items-center group">
                <input type="checkbox" name="disposable" id="disposable" class="w-4 h-4 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1" @radioChecked($gift->disposable, true)>
                <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600 pt-0.5">{{ __('هر کاربر بتواند بیش از یکبار از این کد استفاده کند') }}</span>
            </label>
        </div>

        <div class="mt-4" x-data='{exclusive : {{ isset($gift) && $gift->exclusive ? 'true'  : 'false' }}}'>
            <label for="exclusive_users_active" class="inline-flex items-center mb-2 group">
                <input type="checkbox" name="exclusive_users_active" id="exclusive_users_active" x-model="exclusive" class="w-4 h-4 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1" @radioChecked($gift->exclusive, true)>
                <span class="text-sm text-gray-700 variable-font-medium mr-2 group-hover:text-blue-600 pt-0.5">{{ __('محدودیت کاربر') }}</span>
            </label>
            <select name="exclusive_users" id="exclusive_users" data-placeholder="{{ __('کاربری انتخاب نشده است') }}" class="select2-select" :disabled="!exclusive"></select>
            <div class="flex text-xs text-gray-400 mt-2 cursor-default">
                <i class="fal fa-info-circle ml-1"></i>
                <span>شما می‌توانید با جستجو از طریق شماره موبایل و یا نام، کاربرانی که فقط آن‌ها مجاز به استفاده از این کد می‌باشند را انتخاب کنید. در صورتی که می‌خواهید همه از این کد استفاده کنند، این بخش را خالی بگذارید.</span>
            </div>
        </div>

        <div class="mt-4">
            <label for="description" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Description') }}</label>
            <textarea id="description" name="description"  rows="3" class="resize-none border border-gray-500 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus">{{ isset($gift) ? $gift->description : '' }}</textarea>
        </div>
        @isset($gift)
            <div class="flex items-center justify-end mt-4">
                <div class="bg-gray-50 px-4 py-2 rounded">
                    <span class="text-sm ml-2 text-gray-600 cursor-default">منقضی</span>
                    <div class="relative inline-block w-10 align-middle select-none transition ease-in-out duration-700">
                        <input {{ $gift->status != 'expires' ? 'checked' : '' }} name="status" type="checkbox" id="gift_avalible" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer">
                        <label for="gift_avalible" class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                    <span class="text-sm mr-2 text-gray-600 cursor-default">فعال</span>
                </div>
            </div>
        @endisset
    </div>
    <div class="mt-6">
        <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus" title="@lang(isset($gift) ? 'ویرایش کد تخفیف': 'ساخت کد تخفیف')" aria-label="@lang(isset($gift) ? 'ویرایش کد تخفیف': 'ساخت کد تخفیف')" role="button">
            @lang(isset($gift) ? 'ویرایش کد تخفیف': 'ساخت کد تخفیف')
        </button>
        <a href="{{ isset($gift) ? route('dashboard.gifts.show', [$center->id, $gift->id]) : route('dashboard.gifts.index', $center->id) }}" class="text-sm text-gray-500 hover:text-gray-700 transition" title="انصراف" aria-label="انصراف">انصراف</a>
    </div>
</form>
@endsection
