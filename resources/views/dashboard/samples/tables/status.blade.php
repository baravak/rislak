@if (in_array($sample->status, ['scoring', 'creating_files']))
    <span class="text-xs text-gray-500 cursor-default" data-samplsta="{{ $sample->id }}" data-xhr="sample-status-{{ $sample->id }}">
        <i class="fad fa-spinner-third animate-spin"></i>
    </span>
    @else
        @can('management', [$sample, isset($room) ? $room : null])
            @if ($sample->status == 'closed')
            <span class="text-xs text-gray-500 cursor-default" data-xhr="sample-status-{{ $sample->id }}">
                    <form action="{!! urldecode(route('dashboard.samples.scoring', ['sample' => $sample->id, 'inline' => 1])) !!}" method="POST"  class="inline-block">
                        <button type="submit" class="inline-block px-7 py-1 text-xs text-blue-600 hover:text-white border border-blue-600 hover:bg-blue-600 rounded-full transition">
                            {{ __("Scoring") }}
                        </button>
                    </form>
            </span>
            @else
                <span class="text-xs text-gray-500 cursor-default" data-xhr="sample-status-{{ $sample->id }}">@lang(ucfirst($sample->status))</span>
            @endif
        @else
            <span class="text-xs text-gray-500 cursor-default" data-xhr="sample-status-{{ $sample->id }}">@lang(ucfirst($sample->status))</span>
        @endcan
    @endif
