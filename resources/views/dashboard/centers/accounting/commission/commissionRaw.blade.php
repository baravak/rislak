<tr class="transition hover:bg-gray-50" x-data="{ pinned: Boolean({{ $room->commission_pinned }}) , room_commission : {{ $room->commission }}}" x-ref="row_{{ $room->id }}">
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
        <div class="flex items-center">
            <span class="text-xs text-gray-600 relative top-0.5 cursor-default ml-1">%</span>
            <input type="number" x-bind:disabled="pinned" x-effect="if(pinned) room_commission = commission;" :value="pinned ? commission : room_commission" x-model="room_commission" id="commission-{{ $room->id }}" class="w-16 h-7 border border-gray-300 rounded text-xs text-gray-600 focus disabled:bg-gray-100 lijax"data-lijax="500 change"  data-merge='{"room_id" : "{{ $room->id }}"}' data-action="{{ route('dashboard.center.commissions.update', $center->id) }}" data-method="put" name="commission" id="commissions[{{ $room->id }}]"  x-on:statio-init="$el.disabled=true; $refs.row_{{ $room->id }}.classList.remove('statio-fold')" x-on:jresp="$el.disabled = false; $refs.row_{{ $room->id }}.classList.add('statio-fold')">
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <input type="checkbox" x-bind:checked="pinned" x-model="pinned"  name="pinned" data-merge='{"room_id" : "{{ $room->id }}"}' data-action="{{ route('dashboard.center.commissions.update', $center->id) }}" data-method="put" class="lijax w-4 h-w-4 border border-gray-600 rounded-sm focus cursor-pointer" x-on:statio-init="$el.disabled=true; $refs.row_{{ $room->id }}.classList.remove('statio-fold')" x-on:jresp="$el.disabled = false; $refs.row_{{ $room->id }}.classList.add('statio-fold')">
        </div>
    </td>
</tr>
