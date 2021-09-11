<tr class="transition hover:bg-gray-100 {{ ($loop->index % 2) ? 'bg-gray-50' : '' }}" x-data="{ pinned: Boolean({{ $room->commission_pinned }}) , room_commission : {{ $room->commission }}, _room_commission : {{ $room->commission }}}" x-ref="row_{{ $room->id }}">
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
            <div class="relative">
                <input type="number" x-bind:disabled="pinned" x-effect="if(pinned) room_commission = commission;" :value="pinned ? commission : room_commission" x-model="room_commission" id="commission-{{ $room->id }}" class="w-16 h-7 border border-gray-300 rounded text-xs text-gray-600 focus disabled:bg-gray-100 lijax input-loading"data-lijax="500 change"  data-merge='{"room_id" : "{{ $room->id }}"}' data-action="{{ route('dashboard.center.commissions.update', $center->id) }}" data-method="put" name="commission" id="commissions[{{ $room->id }}]"  x-on:statio-init="$el.disabled=true; $refs.row_{{ $room->id }}.classList.remove('statio-fold')" x-on:jresp="$el.disabled = false; $refs.row_{{ $room->id }}.classList.add('statio-fold'); _room_commission = (event.detail.is_ok ? room_commission : _room_commission); room_commission = _room_commission" x-ref="input">
                <span class="spinner"></span>
            </div>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <input type="checkbox" x-bind:checked="pinned" x-model="pinned"  name="pinned" data-merge='{"room_id" : "{{ $room->id }}"}' data-action="{{ route('dashboard.center.commissions.update', $center->id) }}" data-method="put" class="lijax w-4 h-w-4 border border-gray-600 rounded-sm focus cursor-pointer relative checkbox-loading" x-on:statio-init="$refs.input.disabled = true; $el.disabled=true; $refs.row_{{ $room->id }}.classList.remove('statio-fold')" x-on:jresp="$el.disabled = false; $refs.row_{{ $room->id }}.classList.add('statio-fold'); $el.checked = event.detail.is_ok ? $el.checked : !$el.checked; pinned =  $el.checked; $refs.input.disabled = $el.checked">
        </div>
    </td>
</tr>
