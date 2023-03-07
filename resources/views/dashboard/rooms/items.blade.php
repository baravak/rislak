<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 gap-4">
    @foreach ($rooms as $room)
    @if (isset($center) && $center->id == 'RS9666N9S' && !auth()->user()->isAdmin() && (!$center->acceptation || in_array($center->acceptation->position, ['client', 'psychologist'])))
        @if(in_array($room->id, ['RS9666N9X', 'RS9666N7B', 'RS9666NKB', 'RS9666N7V', 'RS9666N75', 'RS9666G6M', 'RS9666N9S', 'RS9666G6D', 'RS9666NYG', 'RS9666G6A', 'RS9666NR3']))
            @include('dashboard.rooms.item')
        @else
        @endif
    @else
        @include('dashboard.rooms.item')
    @endif
    @endforeach
</div>
