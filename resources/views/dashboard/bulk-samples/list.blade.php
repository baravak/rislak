<div data-xhr="sample-items">
    @if ($bulkSamples->count())
        <div class="hidden sm:flex items-center cursor-default px-2 text-xs variable-font-medium text-gray-600 bg-gray-100 py-2 rounded">
            <div class="w-24 hidden xl:flex">@lang('Serial')</div>
            <div class="flex-1 px-2">@lang('Title')</div>
            <div class="flex-1 px-2">@lang('Psychologist')</div>
            <div class="flex-1 px-2 hidden lg:flex">@lang('Case')</div>
            <div class="flex-1 px-2 hidden lg:flex">@lang('Users')</div>
            <div class="flex-1 px-2 hidden md:flex">@lang('Status')</div>
            <div class="flex-1 px-2"></div>
        </div>
        @foreach ($bulkSamples as $bulkSample)
            @include('dashboard.bulk-samples.listRaw')
        @endforeach
        {{method_exists($bulkSamples, 'links') ? $bulkSamples->links() : null}}
    @else
        @include('dashboard.bulk-samples.emptyList')
    @endif
</div>
