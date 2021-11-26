<div data-xhr="gift-items">
    @if ($gifts && $gifts->count())
        <div class="hidden sm:flex items-center cursor-default px-2 text-xs variable-font-medium text-gray-600 bg-gray-100 py-2 rounded">
            <div class="w-40 pl-2">@lang('Code')</div>
            <div class="flex-1 px-2">@lang('Title')</div>
            <div class="flex-1 px-2 hidden lg:block">
                <div>@lang('تاریخ شروع اعتبار')</div>
                <div class="mt-1">@lang('تاریخ انقضا')</div>
            </div>
            <div class="flex-1 px-2 hidden lg:block">
                <div>@lang('تعداد مجاز')</div>
                <div class="mt-1">@lang('تعداد استفاده شده')</div>
            </div>
            <div class="flex-1 px-2">@lang('تعداد کاربران استفاده کننده')</div>
            <div class="flex-1 px-2 hidden lg:block">@lang('کاربر خاص')</div>
            <div class="flex-1 px-2 hidden lg:block">@lang('Status')</div>
            <div class="flex-1 px-2"></div>
        </div>
        @foreach ($gifts as $gift)
            @include('dashboard.gifts.listRaw')
        @endforeach
        @if (method_exists($gifts, 'links'))
            {{ method_exists($gifts, 'links') ? $gifts->links() : null }}
        @endif
    @else
        @include('dashboard.gifts.emptyList')
    @endif
</div>
