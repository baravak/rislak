<div data-xhr="renewCode" class="w-full">
    @if ($gift->renew_count && ($gift->renew_count >= 10 || \Carbon\Carbon::now()->diffInMinutes($gift->last_renew_at) < 30))
    <button type="button" disabled class="flex items-center w-full border border-gray-200 rounded-lg px-3 text-gray-300 transition h-14">
        <i class="far fa-exchange"></i>
        <span class="text-sm mr-3 pt-0.5">@lang('تغییر کد و لینک')</span>
    </button>
    @else
        <div class="relative dropdown w-full" data-xhr="renewCode">
            <button type="button" class="dropdown-toggle flex items-center w-full border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-purple-600 hover:border-purple-600 hover:bg-purple-50 hover:bg-opacity-20 transition h-14 focus-current ring-purple-600">
                <i class="far fa-exchange"></i>
                <span class="text-sm mr-3 pt-0.5">@lang('تغییر کد و لینک')</span>
            </button>
            <div class="dropdown-menu absolute w-56 left-0 top-16 bg-white rounded-md shadow-md px-2 py-4 z-50">
                <div class="flex flex-col items-center justify-center">
                    <span class="text-xs text-gray-700 cursor-default text-center">کد <span class="en">{{ substr($gift->code, 10) }}</span> تغییر می‌کند و دیگر قابل استفاده نیست، به جای آن یک کد جدید ایجاد می‌شود</span>
                    <div class="flex flex-col justify-center text-xs mt-3">
                        <button class="flex items-center bg-purple-600 text-white hover:bg-purple-700 transition rounded-full h-7 px-8 focus-current ring-purple-600" data-lijax data-method="PUT" data-action="{{ route('dashboard.gifts.renew', [$gift->region->id, $gift->id]) }}">@lang('تغییر کد')</button>
                        <button class="flex items-center bg-gray-100 text-gray-600 hover:bg-gray-200 transition rounded-full h-7 px-8 focus-current ring-gray-600 mt-2 single-click">@lang('انصراف')</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>