<div class="relative dropdown ml-1">
    <button role="button" data-toggle="dropdownx" aria-haspopup="true" class="{{ request()->status ? 'filter-active' : '' }} text-sm text-gray-400 border border-gray-300 rounded h-9 w-9 sm:w-auto sm:px-4 focus-current ring-gray-400 dropdown-toggle">
        <i class="fal fa-filter relative top-0.5"></i>
        <span class="mr-1 hidden sm:inline-flex">@lang('فیلتر')</span>
    </button>
    <div class="rounded-md bg-white border border-gray-200 mt-2 shadow-md dropdown-menu w-64 absolute p-4 right:0">
        <div>
            <span class="text-sm text-gray-600 variable-font-medium cursor-default">بر اساس وضعیت</span>
            <div class="border border-gray-200 rounded bg-white mt-2 p-4 space-y-2">
                <label class="flex items-center group">
                    <input type="checkbox" name="status" value="open" data-tagFilter="status" {{ in_array('open', explode(',', request()->status)) ? 'checked' : '' }} class="w-4 h-4 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                    <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600 pt-0.5">{{ __('فعال') }}</span>
                </label>
                <label class="flex items-center group">
                    <input type="checkbox" name="status" value="awaiting" data-tagFilter="status" {{ in_array('awaiting', explode(',', request()->status)) ? 'checked' : '' }} class="w-4 h-4 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                    <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600 pt-0.5">{{ __('در انتظار') }}</span>
                </label>
                <label class="flex items-center group">
                    <input type="checkbox" name="status" value="expires" data-tagFilter="status" {{ in_array('expires', explode(',', request()->status)) ? 'checked' : '' }} class="w-4 h-4 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                    <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600 pt-0.5">{{ __('منقضی شده') }}</span>
                </label>
            </div>
        </div>
        <div class="flex items-center justify-between mt-4">
            <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['status' => null]))->getUri() }}" class="flex items-center justify-center rounded-full text-xs text-gray-500 hover:text-red-600 transition">
                <i class="fal fa-trash-alt ml-2"></i>
                <span>@lang('پاک کردن همه فیلترها')</span>
            </a>
        </div>
    </div>
</div>

{{-- <div class="flex items-center justify-start mb-4 flex-wrap" x-data='filters = {!! json_encode(request()->all('open', 'expires', 'awaiting')) !!}'>
    <div class= "ml-2 mt-2 sm:mt-0 relative inline-block">
        <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['open' => 1]))->getUri() }}" class="flex items-center border rounded-full px-4 h-8 transition focus text-xs border-brand text-brand border-gray-300 inline-block" :class='{"border-gray-300" : filters.open == null, "bg-blue-50" : filters.open != null}'>
            <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['open' => null]))->getUri() }}" class="relative top-0.5 ml-2" x-show="filters.open">
                <i class="fas fa-times-circle"></i>
            </a>
            <span class="text-sm">فعال</span>
        </a>
    </div>
    <div class= "ml-2 mt-2 sm:mt-0 relative inline-block">
        <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['expires' => 1]))->getUri() }}" class="flex items-center border rounded-full px-4 h-8 transition focus text-xs border-brand text-brand border-gray-300 inline-block" :class='{"border-gray-300" : filters.expires == null, "bg-blue-50" : filters.expires != null}'>
            <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['expires' => null]))->getUri() }}" class="relative top-0.5 ml-2" x-show="filters.expires">
                <i class="fas fa-times-circle"></i>
            </a>
            <span class="text-sm">منقضی</span>
        </a>
    </div>
    <div class= "ml-2 mt-2 sm:mt-0 relative inline-block">
        <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['awaiting' => 1]))->getUri() }}" class="flex items-center border rounded-full px-4 h-8 transition focus text-xs border-brand text-brand border-gray-300 inline-block" :class='{"border-gray-300" : filters.awaiting == null, "bg-blue-50" : filters.awaiting != null}'>
            <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['awaiting' => null]))->getUri() }}" class="relative top-0.5 ml-2" x-show="filters.awaiting">
                <i class="fas fa-times-circle"></i>
            </a>
            <span class="text-sm">درانتظار</span>
        </a>
    </div>
</div> --}}
