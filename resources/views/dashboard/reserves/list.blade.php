<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>@sortView($rooms, 'id', '#')</th>
                <th>{{__('Title')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
            @include('dashboard.rooms.listRaw')
            @endforeach
        </tbody>
    </table>
</div>
