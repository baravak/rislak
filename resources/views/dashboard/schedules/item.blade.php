<a href="{{ $schedule->status == 'registration_awaiting' ? route('dashboard.schedules.show', $schedule->id) : route('dashboard.sessions.show', $schedule->id) }}" class="flex flex-col border border-{{ $schedule->session_border_color }} rounded relative focus-current ring-{{ $schedule->session_border_color }} transition overflow-hidden {{ strpos($schedule->status, 'awaiting') === false ? 'opacity-60' : '' }}">
    <div class="flex items-center justify-between px-2 py-1 border-b border-gray-100 bg-{{ $schedule->session_bg_color }}">
        <div class="flex flex-col">
            <span class="variable-font-semibold">{{ $schedule->started_at->format('H:i') }}</span>
            <span class="text-xs text-gray-500 text-right" style="direction: ltr">{{ $schedule->duration . "'" }}</span>
        </div>
        <div class="flex flex-col dir-ltr text-left">
            <div class="flex h-2 w-2 relative">
                @if ($schedule->status == 'session_awaiting')
                    <span class="absolute animate-ping inline-flex h-full w-full rounded-full bg-brand opacity-80"></span>
                @endif
                <span class="relative inline-flex rounded-full h-2 w-2 bg-{{ $schedule->session_status_color }}"></span>
            </div>
            <div class="text-{{ $schedule->session_status_color }} text-xs mt-2">@lang(ucfirst($schedule->status))</div>
        </div>
    </div>
    @if (strpos($schedule->status, 'awaiting') === false)
      @include('dashboard.schedules.itemPure')
      @else
      @include('dashboard.schedules.itemDetail')
    @endif
</a>
