<div class="flex flex-col sm:flex-row sm:items-center bg-gray-50 hover:bg-gray-100 transition py-3 pb-4 sm:py-2 p-2 rounded mt-2">
    <div class="w-40 items-center cursor-default pl-2">
        <span class="block text-xs text-gray-600 en dir-ltr text-right">$OtherCustom-9A</span>
    </div>
    <div class="flex-1 px-2 cursor-default">
        <div class="text-xs text-gray-600 variable-font-medium lg:variable-font-normal">آزمون اختصاصی آزمون‌های گروهی پرسش‌نامه پایان‌نامه‌ای</div>
        <div class="flex items-center text-xs text-gray-400 mt-1">
            {{-- @if ($edition) --}}
                <span>@lang('Edition') طلیعه سلامت</span>
            {{-- @endif --}}
            <span class="px-2">-</span>
            {{-- @if ($version) --}}
                <span>@lang('Version') 5</span>
            {{-- @endif --}}
        </div>
    </div>
    <div class="flex-1 px-2">
        <div class="flex items-center">
            <input type="number" value="0" class="text-left dir-ltr w-24 h-7 border border-gray-300 rounded text-sm text-gray-600 focus">
            <span class="text-xs text-gray-600 mr-2 pt-0.5">90٬000 @lang('تومانءءء')</span>
        </div>
    </div>
</div>