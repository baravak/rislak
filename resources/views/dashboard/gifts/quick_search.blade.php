<div class="flex justify-between items-center flex-wrap mb-2">
    @include('dashboard.gifts.listFilters')
    @include('layouts.quick_search')
    <a href="{{ route('dashboard.gifts.create', $center) }}" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-white border bg-green-700 hover:bg-green-900 rounded-full transition mr-4 focus-current ring-green-700" title="@lang('Create gift')">
        <i class="fal fa-plus sm:ml-2"></i>
        <span class="hidden sm:inline">@lang('Create gift')</span>
    </a>
</div>
