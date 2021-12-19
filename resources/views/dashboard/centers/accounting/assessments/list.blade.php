<div data-xhr="gift-items">
    <div class="hidden sm:flex items-center cursor-default px-2 text-xs variable-font-medium text-gray-600 bg-gray-100 py-2 rounded">
        <div class="w-40 pl-2">@lang('Serial')</div>
        <div class="flex-1 px-2">@lang('Scale')</div>
        <div class="flex-1 px-2">@lang('Amount')</div>
    </div>
    {{-- @foreach ($assessments as $assessment) --}}
        @include('dashboard.centers.accounting.assessments.listRaw')
    {{-- @endforeach --}}
    {{-- @if (method_exists($assessments, 'links'))
        {{ method_exists($assessments, 'links') ? $assessments->links() : null }}
    @endif --}}
</div>