
<div class="flex flex-col sm:flex-row sm:items-center bg-gray-50 hover:bg-gray-100 transition py-3 pb-4 sm:py-2 p-2 rounded mt-2">
    <div class="w-40 cursor-default pl-2 hidden lg:flex">
        <span class="block text-xs text-gray-600 en dir-ltr text-right">{{ $assessment->assessment->id }}</span>
    </div>
    <div class="flex-1 px-2 cursor-default">
        <div class="text-xs text-gray-600 variable-font-medium lg:variable-font-normal">{{ substr($assessment->assessment->title, 0, -4) }}</div>
        <span class="block text-xs text-gray-600 en dir-ltr text-right mt-1 lg:hidden">{{ $assessment->assessment->id }}</span>
        <div class="flex items-center text-xs text-gray-400 mt-1">
            @if ($assessment->assessment->edition)
                <span>@lang('Edition') {{ $assessment->assessment->edition }}</span>
                <span class="px-2">-</span>
            @endif
            @if ($assessment->assessment->version)
                <span>@lang('Version') {{ $assessment->assessment->version }}</span>
            @endif
        </div>
    </div>
    {{-- @if ($room) --}}
        {{-- <div class="flex-1 px-2 mt-2 sm:mt-0 cursor-default">
            <span class="text-xs text-gray-600 sm:hidden ml-2">@lang('مبلغ در مرکز'):</span>
            <span class="text-xs text-gray-600 pt-0.5 variable-font-medium sm:variable-font-normal">90٬000 @lang('تومانءءء')</span>
        </div>
        <div class="flex-1 px-2 mt-1 sm:mt-0">
            <label for="default" class="flex items-center cursor-pointer group">
                <span class="text-xs text-gray-600 sm:hidden cursor-default ml-2">@lang('مبلغ در اتاق'): </span>
                <input id="default" type="checkbox" class="w-4 h-4 rounded border border-gray-400 focus">
                <span class="text-xs text-gray-600 mr-1.5 group-hover:text-blue-600">@lang('پیش‌فرض مرکز')</span>
            </label>
            <div class="flex items-center mt-2">
                <input type="number" value="0" class="text-left dir-ltr w-28 h-7 border border-gray-300 rounded text-xs text-gray-600 focus">
                <span class="text-xs text-gray-600 mr-2 pt-0.5">90٬000 @lang('تومانءءء')</span>
            </div>
        </div> --}}
    {{-- @else --}}
        <div class="flex-1 px-2 mt-2 sm:mt-0">
            <span class="text-xs text-gray-600 sm:hidden ml-2">@lang('Amount'):</span>
            <div class="flex items-center mt-1 sm:mt-0" x-data="{amount:{{ $assessment->amount ?: '0' }}}">
                <input type="tel" class="text-left dir-ltr w-52 h-7 border border-gray-300 rounded text-xs text-gray-600 focus" x-data="amontity" x-fill="amount">
                <input type="hidden" name="" x-model='amount'>
            </div>
        </div>
    {{-- @endif --}}
</div>
