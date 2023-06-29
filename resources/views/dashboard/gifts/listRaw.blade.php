<div data-xhr="gift-list-id" class="flex flex-col sm:flex-row sm:items-center bg-gray-50 hover:bg-gray-100 transition py-3 pb-4 sm:py-2 p-2 rounded mt-2">
    <div class="w-32 hidden sm:flex items-center pl-2 relative">
        <div title="@lang('کپی کردن کد')" class="text-sm text-gray-600 hover:text-blue-600 transition ml-1 sm:pt-1 cursor-pointer" data-clipboard-text="{{ substr($gift->code, 10) }}"><i class="fal fa-copy pb-0.5"></i></div>
        <div class="copied-tooltip absolute -right-5 -top-7">@lang('کپی شد')</div>
        <span class="text-xs text-right text-gray-600 dir-ltr en cursor-default">{{ substr($gift->code, 10) }}</span>
    </div>
    <div class="flex-1 px-2 cursor-default">
        <div class="flex sm:hidden items-center">
            <div title="@lang('کپی کردن کد')" class="text-sm text-gray-600 hover:text-blue-600 transition ml-1 focus-current ring-blue-600 rounded-full w-5 h-5 flex items-center justify-center" data-clipboard-text="{{ substr($gift->code, 10) }}"><i class="fal fa-copy pb-0.5"></i></div>
            <span class="text-xs text-right text-gray-600 dir-ltr en cursor-default pb-0.5 font-medium">{{ substr($gift->code, 10) }}</span>
        </div>
        <div class="flex flex-col">
            <span class="text-xs text-gray-600 variable-font-medium">{{ $gift->title }}</span>
            @isset($gift->atom)
            <span class="text-xs text-gray-500 mt-0.5">{{$gift->atom->owner->name}}</span>
            @endisset
        </div>
        <div class="flex text-xs text-gray-600 lg:hidden mt-1">
            @if ($gift->type == 'percent')
                مقدار تخفیف: <span class="block dir-ltr text-right mr-1">% {{ $gift->value }}</span>
            @else
                مقدار تخفیف: <div class="mr-1">@amount($gift->value) <span class="text-sx">تومانءءء</span></div>
            @endif
        </div>
        <div class="text-xs text-gray-600 lg:hidden mt-1">شروع اعتبار: @time($gift->started_at, "Y/m/d")</div>
        <div class="text-xs text-gray-500 lg:hidden mt-1">
            انقضا:
            @if ($gift->expires_at)
                @time($gift->expires_at, "Y/m/d")
            @else
                <i class="far fa-infinity relative sm:top-0.5 text-sx" title="@lang('نامحدود')"></i>
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
        <div class="text-xs text-gray-600 mt-1 sm:hidden">تعداد مجاز:
            @if ($gift->threshold)
                <span>{{ number_format($gift->threshold) }}</span>
            @else
                <i class="far fa-infinity relative top-0.5 text-sx" title="@lang('نامحدود')"></i>
            @endif
        </div>
        <div class="text-xs text-gray-600 mt-1 sm:hidden">تعداد استفاده شده: {{ number_format($gift->usage_count) }}</div>
    </div>
    <div class="flex-1 px-2 cursor-default hidden lg:block">
        <div class="text-xs text-gray-600">
            @if ($gift->type == 'percent')
                <span class="block dir-ltr text-right">% {{ $gift->value }}</span>
            @else
                <div>@amount($gift->value) <span class="text-sx">تومانءءء</span></div>
            @endif
        </div>
    </div>
    <div class="flex-1 px-2 cursor-default hidden lg:block">
        <div class="text-xs text-gray-600">@time($gift->started_at, "Y/m/d")</div>
        <div class="text-xs text-gray-500 mt-0.5">
            @if ($gift->expires_at)
                @time($gift->expires_at, "Y/m/d")
            @else
                <i class="far fa-infinity relative top-0.5 text-sx" title="@lang('نامحدود')"></i>
            @endif
        </div>
    </div>
    <div class="flex-1 px-2 cursor-default hidden lg:block">
        <div class="text-xs text-gray-600">
            @if ($gift->threshold)
                <span>{{ number_format($gift->threshold) }}</span>
            @else
                <i class="far fa-infinity relative top-0.5 text-sx" title="@lang('نامحدود')"></i>
            @endif
        </div>
        <div class="text-xs text-gray-600 mt-1">{{ number_format($gift->usage_count) }}</div>
    </div>
    <div class="flex-1 px-2 cursor-default hidden sm:block">
        <div class="text-xs text-gray-600">{{ number_format($gift->user_count) }}</div>
        <div class="text-xs text-gray-600 mt-1 lg:hidden">کاربر خاص: @lang($gift->exclusive ? 'دارد' : 'ندارد')</div>
        <div class="text-xs text-gray-600 mt-1 lg:hidden">تعداد مجاز:
            @if ($gift->threshold)
                <span>{{ number_format($gift->threshold) }}</span>
            @else
                <i class="far fa-infinity relative top-0.5 text-sx" title="@lang('نامحدود')"></i>
            @endif
        </div>
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
