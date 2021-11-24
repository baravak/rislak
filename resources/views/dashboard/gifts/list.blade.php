<div data-xhr="gift-items">
    {{-- @if ($gifts && $gifts->count()) --}}
        <div class="hidden sm:flex items-center cursor-default px-2 text-xs variable-font-medium text-gray-600 bg-gray-100 py-2 rounded">
            <div class="flex-1 pl-2">@lang('Code')</div>
            <div class="flex-1 px-2">@lang('Title')</div>
            <div class="flex-1 px-2">
                <div>@lang('تاریخ شروع اعتبار')</div>
                <div class="mt-1">@lang('تاریخ انقضا')</div>
            </div>
            <div class="flex-1 px-2">
                <div>@lang('تعداد دفعات مجاز')</div>
                <div class="mt-1">@lang('تعداد دفعات قابل استفاده')</div>
            </div>
            <div class="flex-1 px-2">@lang('تعداد کاربران استفاده کننده')</div>
            <div class="flex-1 px-2">@lang('کاربر خاص')</div>
            <div class="flex-1 px-2">@lang('Status')</div>
            <div class="flex-1 px-2"></div>
        </div>
        {{-- @foreach ($gifts as $gift) --}}
            @include('dashboard.gifts.listRaw')
        {{-- @endforeach --}}
        {{-- @if (method_exists($gifts, 'links'))
            {{ method_exists($gifts, 'links') ? $gifts->links() : null }}
        @endif --}}
    {{-- @else --}}
        {{-- @include('dashboard.gifts.emptyList') --}}
    {{-- @endif --}}
</div>