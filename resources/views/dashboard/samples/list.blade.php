<div data-xhr="sample-items">
    @if ($samples && $samples->count())
        <div class="hidden sm:flex items-center cursor-default px-2 text-xs variable-font-medium text-gray-600 bg-gray-100 py-2 rounded">
            <div class="w-24 hidden lg:flex">@lang('Serial')</div>
            <div class="flex-1 px-2">@lang('Scale')</div>
            <div class="flex-1 px-2 hidden md:flex">@lang('Client')</div>
            @if ((isset($bulkSample) && $bulkSample->case_status == 'personal') || !isset($bulkSample))
                <div class="flex-1 px-2">
                    @isset($bulkSample)
                        @lang('Case')
                    @else
                        @lang('Therapy room')
                    @endisset
                </div>
            @endif
            <div class="flex-1 px-2">@lang('Status')</div>
            <div class="flex-1 px-2"></div>
        </div>
        @foreach ($samples as $sample)
            @include('dashboard.samples.listRaw')
        @endforeach
        @if (method_exists($samples, 'links'))
            {{ method_exists($samples, 'links') ? $samples->links() : null }}
        @endif
    @else
        @include('dashboard.samples.emptyList')
    @endif
</div>