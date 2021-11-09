<div data-xhr="sample-items">
    @if ($samples->count())
        <div class="flex items-center cursor-default px-2 text-xs variable-font-medium text-gray-600 bg-gray-100 py-2 rounded hidden sm:flex">
            <div class="w-24 hidden lg:flex">@lang('Serial')</div>
            <div class="flex-1 px-2">@lang('Scale')</div>
            <div class="flex-1 px-2 hidden md:flex">@lang('Client')</div>
            <div class="flex-1 px-2">@lang('Therapy room')</div>
            <div class="flex-1 px-2">@lang('Status')</div>
            <div class="flex-1 px-2"></div>
        </div>
        @foreach ($samples as $sample)
            @include('dashboard.samples.listRaw')
        @endforeach
        {{ method_exists($samples, 'links') ? $samples->links() : null }}
    @else
        @include('dashboard.samples.emptyList')
    @endif
</div>