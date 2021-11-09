@can('management', [$sample, isset($room) ? $room : null])
    <div class="inline-block mr-4">
        <a href="{{ urldecode(route('dashboard.samples.show', $sample->id)) }}" title="@lang('View')" aria-label="@lang('View')">
            <i class="fal fa-eye text-sm text-gray-600 hover:text-blue-600 relative top-0.5"></i>
        </a>
    </div>
@endcan

@if ($sample->chain)
    <div class="inline-block mr-6">
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
