<form class="m-auto w-full md:w-1/2" action="" method="POST">
    <div class="border border-gray-300 rounded p-4 mt-8">
        <div>
            <label for="title" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Title') }}</label>
            <input type="text" name="title" id="title" autocomplete="off" placeholder="مثال: یلدا 1400" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-gray-600 placeholder-gray-300 focus">
        </div>

        <div class="grid grid-cols-1 xs:grid-cols-2 gap-4 mt-4">
            <div>
                <label for="type" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('نوع مقدار') }}</label>
                <div class="flex items-center radio-select">
                    <input checked type="radio" name="type" id="percentage" class="sr-only">
                    <label for="percentage" class="w-1/2 flex items-center justify-center h-10 border border-l-0 border-gray-400 rounded rounded-l-none text-sm text-gray-600 cursor-pointer">
                        @lang('Percentage')
                    </label>
                    <input type="radio" name="type" id="fixed-amount" class="sr-only">
                    <label for="fixed-amount" class="w-1/2 flex items-center justify-center h-10 border border-r-0 border-gray-400 rounded rounded-r-none text-sm text-gray-600 cursor-pointer">
                        @lang('مبلغ ثابت')
                    </label>
                </div>
            </div>
            <div>
                <label for="amount" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('مقدار تخفیف') }}</label>
                {{-- <div class="w-full relative">
                    <input type="number" name="amount" id="amount" class="border border-gray-400 h-10 rounded pr-4 pl-16 w-full text-sm text-gray-600 dir-ltr focus">
                    <span class="absolute left-1 top-1 bg-gray-200 px-3 rounded text-xs flex items-center h-8 cursor-default">@lang('Toman')</span>
                    <span class="block text-xs text-gray-500 text-left mt-2 cursor-default" x-text="(amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '،') || '0') + ' تومان'">0 تومان</span>
                </div> --}}
                <div class="w-full relative">
                    <input type="number" name="amount" id="amount" class="border border-gray-400 h-10 rounded pr-4 pl-16 w-full text-sm text-gray-600 dir-ltr focus">
                    <span class="absolute left-1 top-1 bg-gray-200 px-3 rounded text-xs flex items-center h-8 cursor-default">@lang('Percentage')</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 xs:grid-cols-2 gap-4 mt-4">
            <div>
                <label for="start-date" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Start date') }}</label>
                <input type="text" id="specific-date" data-picker-alt="date" dpicker-format="YYYY/MM/DD" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-gray-600 focus date-picker dir-ltr text-left">
                <input type="hidden" name="start-date" id="start-date" >
            </div>
            <div>
                <label for="end-date" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('End date') }}</label>
                <input type="text" id="specific-date" data-picker-alt="date" dpicker-format="YYYY/MM/DD" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-gray-600 focus date-picker dir-ltr text-left">
                <input type="hidden" name="end-date" id="end-date" >
            </div>
        </div>

        <div class="mt-4">
            <label for="count" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('تعداد دفعات قابل استفاده') }}</label>
            <input type="number" name="count" id="count" autocomplete="off" placeholder="مثال: 20" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-gray-600 placeholder-gray-300 focus">
        </div>

        <div class="mt-4">
            <label class="inline-flex items-center group">
                <input type="checkbox" name="use-more-one" id="use-more-one" class="w-4 h-4 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600 pt-0.5">{{ __('هر کاربر بتواند بیش از یکبار از این کد استفاده کند') }}</span>
            </label>
        </div>

        <div class="mt-4">
            <label for="clients" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('کاربران مجاز') }}</label>
            <select name="clients" id="clients" data-placeholder="{{ __('کاربری انتخاب نشده است') }}" class="select2-select"></select>
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