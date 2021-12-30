<div class="flex flex-col sm:flex-row sm:items-center bg-gray-50 hover:bg-gray-100 transition py-3 pb-4 sm:py-2 p-2 rounded mt-2">
    <div class="w-40 cursor-default pl-2 hidden lg:flex">
        <span class="block text-xs text-gray-600 en dir-ltr text-right">{{ $assessment->assessment->id }}</span>
    </div>
    <div class="flex-1 px-2 cursor-default">
        <div class="text-xs text-gray-600 variable-font-medium lg:variable-font-normal"> {{ substr($assessment->assessment->title, 0, -4) }}</div>
        <span class="block text-xs text-gray-600 en dir-ltr text-right mt-1 lg:hidden">{{ $assessment->assessment->id }}</span>
        <div class="flex items-center text-xs text-gray-400 mt-1">
            @if ($assessment->assessment->edition)
                <span>@lang('Edition') {{ $assessment->assessment->edition }}</span>
                <span class="px-2">-</span>
            @endif
            <span>@lang('Version') {{ $assessment->assessment->version }}</span></span>
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
            <div class="mt-2 xs:mt-0 relative inline-block" x-data='{amount:{{ $assessment->amount ?: '0' }}}'>
                <input type="tel" name="amount" class="text-left dir-ltr w-40 h-8 pl-12 border border-gray-300 rounded text-sm text-gray-600 focus" x-data="amontity()" x-fill="amount" x-bind="amontity" data-lijax="700 change" :value="amount"  :data-value="amount" data-method="PUT" data-action="{{ route('dashboard.center.assessments.index', [$center->id]) }}/{{ $assessment->assessment->id }}" autocomplete="off">
                <span class="absolute left-1 top-1/2 transform -translate-y-1/2 flex items-center px-2 pt-0.5 h-6 text-xs bg-gray-200 rounded text-gray-600">@lang('تومانءءء')</span>
            </div>
        </div>
    {{-- @endif --}}

    <div class="w-10 dir-ltr text-left px-2 hidden sm:flex">
        <a href="#" class="text-gray-600 hover:text-blue-600 transition" title="مبلغ این آزمون در اتاق‌های درمان">
            <i class="fal fa-loveseat pt-1"></i>
        </a>
    </div>

    <div class="mt-4 px-2 sm:hidden">
        <a href="#" class="text-sm rounded-full border border-gray-300 text-gray-600 hover:text-blue-600 hover:border-blue-600 transition mt-2 px-4 py-1" title="مبلغ این آزمون در اتاق‌های درمان">
            مبلغ در اتاق‌های درمان
        </a>
    </div>
</div>
