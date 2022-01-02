<div data-xhr="assessments-items">
    <div class="hidden sm:flex items-center cursor-default px-2 text-xs variable-font-medium text-gray-600 bg-gray-100 py-2 rounded">
        <div class="w-40 pl-2 hidden lg:block">@lang('Serial')</div>
        <div class="flex-1 px-2">@lang('Scale')</div>
        {{-- @if ($room) --}}
            {{-- <div class="flex-1 px-2">@lang('مبلغ در مرکز')</div>
            <div class="flex-1 px-2">@lang('مبلغ در اتاق')</div> --}}
        {{-- @else --}}
            <div class="flex-1 px-2">@lang('Amount')</div>
        {{-- @endif --}}
        <div class="w-20 px-2 hidden lg:block"></div>
    </div>
        @foreach ($assessments as $assessment)
            @include('dashboard.centers.accounting.assessments.listRaw')
        @endforeach
    <span>
        @if (method_exists($assessments, 'links'))
        {{ $assessments->links() }}
        @endif
    </span>
</div>
