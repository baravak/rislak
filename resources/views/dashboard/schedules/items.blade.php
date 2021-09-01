<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 p-4">
    @foreach ($schedules->where('started_at', '>=', $day)->where('started_at', '<=', (clone $day)->endOfDay()) as $schedule)
        @include('dashboard.schedules.item')
    @endforeach
</div>
