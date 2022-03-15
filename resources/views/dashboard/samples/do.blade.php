@can('management', [$sample, isset($room) ? $room : null])
    <div class="inline-block mr-4  relative top-0.5">
        <a href="{{ urldecode(route('dashboard.samples.show', $sample->id)) }}" title="@lang('View')" aria-label="@lang('View')">
            <i class="fal fa-eye text-sm text-gray-600 hover:text-blue-600"></i>
        </a>
    </div>
@endcan

@if ($sample->chain)
    <div class="inline-block mr-6 relative top-0.5">
        <a href="{{ route('dashboard.samples.index', ['chain' => $sample->chain->id]) }}" class="relative text-gray-600 hover:text-blue-600" title="@lang('نمو‌نه‌های زنجیره‌ای این نمونه')" aria-label="@lang('نمو‌نه‌های زنجیره‌ای این نمونه')">
            <i class="fal fa-ballot-check relative top-0.5"></i>
            <i class="fal fa-link text-xs flex items-center justify-center w-4 h-4 shadow bg-white rounded-full absolute left-2 bottom-0"></i>
        </a>
    </div>
@endif

@can('fill', [$sample, isset($room) ? $room : null])
    <div class="inline-block">
        <a href="{{ urldecode(route('samples.form', $sample->id)) }}" target="_blank" class="inline-flex items-center justify-center w-24 h-7 text-xs text-blue-600 hover:text-white border border-blue-600 hover:bg-blue-600 rounded-full transition">{{ __('Do sample') }}</a>
    </div>
@endcan

{{-- <div class="inline-block">
    <a href="#" target="_blank" class="inline-flex items-center justify-center w-20 h-7 text-xs text-blue-600 hover:text-white border border-blue-600 hover:bg-blue-600 rounded-full transition">@lang('Payment')</a>
</div> --}}

@if ($sample->status == 'closed')
    @can('management', [$sample, isset($room) ? $room : null])
        <span class="text-xs text-gray-500">
            <form action="{!! urldecode(route('dashboard.samples.scoring', ['sample' => $sample->id, 'inline' => 1])) !!}" method="POST"  class="inline-block" data-lijax-preload="______">
                <button type="submit" class="inline-flex items-center justify-center w-24 h-7 text-xs text-white bg-blue-600 hover:bg-blue-700 rounded-full transition">
                    {{ __("Scoring") }}
                </button>
            </form>
        </span>
    @endcan
@endif
