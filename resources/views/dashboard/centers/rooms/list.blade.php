<div data-xhr="centers-rooms-balance">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200" x-data='{"dragable" : false, "dropElement" : null, dragElement : null}'>
                    <thead class="bg-gray-50 cursor-default">
                        <tr>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">#</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">@lang('Therapy room')</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200" x-data='{"table" : $el}' @drop="$dispatch('restartlist', [...$el.querySelectorAll('tr')]);
                    new Statio({type:'render', ajax : {type: 'PUT', data : {room_order: [...$el.querySelectorAll('tr')].map((el)=>{console.log(el.getAttribute('data-roomId')); return el.getAttribute('data-roomId')})}}})" x-init="$dispatch('restartlist', [...$el.querySelectorAll('tr')])">
                        @foreach ($rooms as $room)
                            @include('dashboard.centers.rooms.raw')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
