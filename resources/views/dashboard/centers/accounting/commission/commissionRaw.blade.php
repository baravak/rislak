<tr class="transition hover:bg-gray-50" x-data="{ pinned: {{ $room->commission_pinned }} , room_commission : {{ $room->commission }}}" x-ref="row">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">{{ $room->manager->name }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default" x-text="(100 - (pinned ? commission : room_commission)) + '%'"></span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        {{-- ↓ ↓ برای غیرفعال کردن این اینپوت کافیه اتریبیوت دیزیبلد بهش داده بشه، حالت غیرفعال با رنگ اوکی میشه خودش ↓ ↓ --}}
        <div class="flex items-center">
            <span class="text-xs text-gray-600 relative top-0.5 cursor-default ml-1">%</span>
            <input type="number" x-bind:disabled="pinned" x-effect="if(pinned) room_commission = commission" :value="pinned ? commission : room_commission" x-model="room_commission" id="commission-{{ $room->id }}" class="w-16 h-7 border border-gray-300 rounded text-xs text-gray-600 focus disabled:bg-gray-100">
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <input type="checkbox" x-bind:checked="pinned" x-model="pinned"  name="" id="" value="" class="w-4 h-w-4 border border-gray-600 rounded-sm focus cursor-pointer">
        </div>
    </td>
</tr>
