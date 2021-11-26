<div data-xhr="gift-list-id" class="flex flex-col sm:flex-row sm:items-center bg-gray-50 hover:bg-gray-100 transition py-3 pb-4 sm:py-2 p-2 rounded mt-2">
    <div class="w-40 hidden sm:flex items-center pl-2">
        <a href="#" title="@lang('کپی کردن کد')"><i class="fal fa-copy text-sm text-gray-600 hover:text-blue-600 transition ml-2 sm:pt-0.5"></i></a>
        <span class="text-xs text-right text-gray-600 dir-ltr en cursor-default">{{ $gift->code }}</span>
    </div>
    <div class="flex-1 px-2 cursor-default">
        <div class="flex sm:hidden items-center">
            <a href="#" title="@lang('کپی کردن کد')"><i class="fal fa-copy text-sm text-gray-600 hover:text-blue-600 transition ml-2"></i></a>
            <span class="text-xs text-right text-gray-600 dir-ltr en cursor-default pb-0.5 font-medium">{{ $gift->code }}</span>
        </div>
        <span class="text-xs text-gray-600 variable-font-medium lg:variable-font-normal">{{ $gift->title }}</span>
        <div class="text-xs text-gray-600 lg:hidden mt-1">شروع اعتبار: @time($gift->started_at, "Y/m/d")</div>
        <div class="text-xs text-gray-500 lg:hidden mt-1">
            انقضا:
            @if ($gift->expires_at)
                @time($gift->expires_at, "Y/m/d")
            @else
                ∞
            @endif
        </div>
        <div class="text-xs lg:hidden mt-1">
            <span class="text-gray-600">@lang('وضعیت')</span>
            @switch($gift->status)
                @case('open')
                    <span class="text-green-600">فعال</span>
                    @break
                @case('expires')
                    <span class="text-red-600">منقضی شده</span>
                    @break
                @case('awaiting')
                    <span class="text-yellow-500">در انتظار</span>
                    @break
            @endswitch
        </div>
        <div class="text-xs text-gray-600 mt-1 sm:hidden">تعداد کاربران استفاده کننده: {{ number_format($gift->user_count) }}</div>
        <div class="text-xs text-gray-600 mt-1 sm:hidden">کاربر خاص: @lang($gift->exclusive ? 'دارد' : 'ندارد')</div>
        <div class="text-xs text-gray-600 mt-1 sm:hidden">تعداد مجاز: {{ $gift->threshold ? number_format($gift->threshold) : '∞' }}</div>
        <div class="text-xs text-gray-600 mt-1 sm:hidden">تعداد استفاده شده: {{ number_format($gift->usage_count) }}</div>
    </div>
    <div class="flex-1 px-2 cursor-default hidden lg:block">
        <div class="text-xs text-gray-600">@time($gift->started_at, "Y/m/d")</div>
        <div class="text-xs text-gray-500 mt-1">
            @if ($gift->expires_at)
                @time($gift->expires_at, "Y/m/d")
            @else
                ∞
            @endif
        </div>
    </div>
    <div class="flex-1 px-2 cursor-default hidden lg:block">
        <div class="text-xs text-gray-600">{{ $gift->threshold ? number_format($gift->threshold) : '∞' }}</div>
        <div class="text-xs text-gray-600 mt-1">{{ number_format($gift->usage_count) }}</div>
    </div>
    <div class="flex-1 px-2 cursor-default hidden sm:block">
        <div class="text-xs text-gray-600">{{ number_format($gift->user_count) }}</div>
        <div class="text-xs text-gray-600 mt-1 lg:hidden">کاربر خاص: @lang($gift->exclusive ? 'دارد' : 'ندارد')</div>
        <div class="text-xs text-gray-600 mt-1 lg:hidden">تعداد مجاز: {{ $gift->threshold ? number_format($gift->threshold) : '∞' }}</div>
        <div class="text-xs text-gray-600 mt-1 lg:hidden">تعداد استفاده شده: {{ number_format($gift->usage_count) }}</div>
    </div>
    <div class="flex-1 px-2 cursor-default hidden lg:block">
        <span class="text-xs text-gray-600">@lang($gift->exclusive ? 'دارد' : 'ندارد')</span>
    </div>
    <div class="flex-1 px-2 cursor-default hidden lg:block">
        @switch($gift->status)
            @case('open')
                <span class="text-xs text-green-600">فعال</span>
                @break
            @case('expires')
                <span class="text-xs text-red-600">منقضی شده</span>
                @break
            @case('awaiting')
                <span class="text-xs text-yellow-500">در انتظار</span>
                @break
        @endswitch
    </div>
    <div class="flex-1 px-2 text-left dir-ltr mt-2 sm:mt-0">
        <div class="hidden sm:inline-block mr-4 relative top-0.5">
            <a href="{{ route('dashboard.gifts.show', ['center' => $region->id,'gift'=> $gift->id]) }}" title="@lang('View')" aria-label="@lang('View')">
                <i class="fal fa-eye text-sm text-gray-600 hover:text-blue-600"></i>
            </a>
        </div>
        <div class="sm:hidden inline-block mr-2">
            <a href="{{ route('dashboard.gifts.show', ['center' => $region->id,'gift'=> $gift->id]) }}" title="@lang('View')" aria-label="@lang('View')" class="flex-shrink-0 px-4 py-1 rounded-full text-xs text-brand border border-brand hover:bg-brand hover:text-white transition">@lang('View')</a>
        </div>
        <div class="hidden sm:inline-block relative top-0.5">
            <a href="{{ route('dashboard.gifts.edit', ['center' => $region->id,'gift'=> $gift->id]) }}" title="@lang('Edit')" aria-label="@lang('Edit')">
                <i class="fal fa-edit text-sm text-gray-600 hover:text-blue-600"></i>
            </a>
        </div>
        <div class="sm:hidden inline-block">
            <a href="{{ route('dashboard.gifts.edit', ['center' => $region->id,'gift'=> $gift->id]) }}" title="@lang('Edit')" aria-label="@lang('Edit')" class="flex-shrink-0 px-4 py-1 rounded-full text-xs text-gray-500 border border-gray-400 hover:bg-gray-500 hover:text-white transition">@lang('Edit')</a>
        </div>
    </div>
</div>
