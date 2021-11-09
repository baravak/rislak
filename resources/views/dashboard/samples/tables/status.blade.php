@if (in_array($sample->status, ['scoring', 'creating_files']) && auth()->user()->can('management', [$sample, isset($room) ? $room : null]))
    <span class="text-xs text-gray-500 cursor-default" data-samplsta="{{ $sample->id }}" data-xhr="sample-status-{{ $sample->id }}" title="@lang('در حال نمره‌دهی')" aria-label="@lang('در حال نمره‌دهی')">
        <i class="fad fa-spinner-third animate-spin"></i>
    </span>
@else
    <span class="text-xs text-gray-500 cursor-default" data-xhr="sample-status-{{ $sample->id }}">@lang(ucfirst($sample->status))</span>
@endif
