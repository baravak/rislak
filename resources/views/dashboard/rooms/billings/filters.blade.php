<div class="flex items-center justify-end mb-4 flex-wrap">
    <div class="dropdown ml-2 mt-2 sm:mt-0" style="display: none">
        <button type="button" class="flex i tems-center border rounded-full px-4 h-8 transition dropdown-toggle focus text-xs {{-- border-gray-300 --}} border-brand text-brand bg-blue-50">
            <a href="#" class="relative top-0.5 ml-2"><i class="fas fa-times-circle"></i></a>
            <span class="text-sm">@lang('اتاق درمان')</span>
            <span class="text-xs mr-1">(1)</span>
        </button>
        <div class="rounded-xl border border-gray-200 mt-2 shadow-lg dropdown-menu absolute left-0 w-64 click-over">
            <div class="px-4 py-3 max-h-44 overflow-y-auto">
                <label class="block group mt-1">
                    <input type="checkbox" checked name="room-manager" id="room-manager"class="w-4 h-4 border border-gray-400 rounded-sm focus">
                    <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">محمدعلی نخلی</span>
                </label>
                <label class="block group mt-1">
                    <input type="checkbox" name="room-manager" id="room-manager"class="w-4 h-4 border border-gray-400 rounded-sm focus">
                    <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">مرجان علیمحمدی</span>
                </label>
            </div>
            <div class="flex items-center justify-between bg-gray-100 px-4 py-3">
                <button class="text-xs text-white px-4 h-8 rounded-full bg-green-600 hover:bg-green-700 transition focus-current ring-green-600">@lang('اعمال فیلتر')</button>
                <button class="text-xs text-gray-700 px-4 h-8 border border-gray-300 rounded-full hover:bg-gray-200 transition focus-current ring-gray-500">@lang('پاک کردن')</button>
            </div>
        </div>
    </div>
    <div class="dropdown ml-2 mt-2 sm:mt-0" x-data='{"filters" : {{ request()->from && request()->to ? 'true' : 'null' }}}'>
        <button type="button" class="flex items-center border rounded-full px-4 h-8 transition dropdown-toggle focus text-xs border-brand text-brand" :class='{"border-gray-300" : filters == null, "bg-blue-50" : filters != null}'>
            <span class="relative top-0.5 ml-2" x-show="filters" @click="jQuery.query.set('from', null).set('to', null).go(); filters=false"><i class="fas fa-times-circle"></i></span>
            <span class="text-sm">@lang('بازه زمانی')</span>
        </button>
        <div class="rounded-xl border border-gray-200 mt-2 shadow-lg dropdown-menu absolute left-0 w-72">
                <div class="px-4 py-3">
                    <label for="from-date" class="inline-block mb-2 text-sm text-gray-700 variable-font-medium">@lang('از تاریخ')</label>
                    <div class="relative">
                        <input type="hidden" id="from" name="from" x-ref="from">
                        <input type="hidden" id="to" name="to" x-ref="to">
                        <input type="text" id="from-date" data-picker-alt="from" dpicker-format="YYYY/MM/DD" class="border border-gray-400 text-gray-700 h-10 rounded pl-8 pr-4 w-full text-sm focus date-picker dir-ltr text-left">
                        <i class="fal fa-calendar-alt text-lg absolute left-2 top-1 text-gray-400 cursor-default"></i>
                    </div>
                    <label for="to-date" class="inline-block mt-4 mb-2 text-sm text-gray-700 variable-font-medium">@lang('تا تاریخ')</label>
                    <div class="relative">
                        <input type="text" id="to-date" data-picker-alt="to" dpicker-format="YYYY/MM/DD" class="border border-gray-400 text-gray-700 h-10 rounded pl-8 pr-4 w-full text-sm focus date-picker dir-ltr text-left">
                        <i class="fal fa-calendar-alt text-lg absolute left-2 top-1 text-gray-400 cursor-default"></i>
                    </div>
                </div>
                <div class="flex items-center justify-between bg-gray-100 px-4 py-3">
                    <button class="text-xs text-white px-4 h-8 rounded-full bg-green-600 hover:bg-green-700 transition focus-current ring-green-600" @click="jQuery.query.set('from', $refs.from.value).set('to', $refs.to.value).go(); filters=true">@lang('اعمال فیلتر')</button>
                    <button class="text-xs text-gray-700 px-4 h-8 border border-gray-300 rounded-full hover:bg-gray-200 transition focus-current ring-gray-500" @click="jQuery.query.set('from', null).set('to', null).go(); filters=false">@lang('پاک کردن')</button>
                </div>
        </div>
    </div>
    <button type="button" class="mt-2 sm:mt-0 flex items-center bg-brand rounded-full h-8 px-8 text-white text-xs hover:bg-blue-700 transition focus">
        <i class="fal fa-file-export text-xs ml-2"></i>
        <a target="_blank" href="{{ request()->create(request()->fullUrl(), 'GET', ['page' => null, 'export' => 'true'])->getUri() }}">@lang('Export')</a>
    </button>
</div>
{{-- <div class="text-sm bg-green-50 border-r-2 border-green-600 text-green-700 px-4 py-3 mb-2 leading-6 cursor-default">
    درخواست خروجی شما با موفقیت ثبت شد. هم اکنون می‌توانید از
    <a href="#" class="variable-font-semibold hover:text-blue-600 transition underline">صفحه لیست خروجی‌ها</a>
    ، روند انجام خروجی را مشاهده و یا خروجی مورد نظر را دانلود کنید.
</div> --}}
