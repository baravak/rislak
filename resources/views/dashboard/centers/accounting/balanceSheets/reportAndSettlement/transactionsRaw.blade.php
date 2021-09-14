<tr class="transition hover:bg-gray-100 {{ ($loop->index % 2) ? 'bg-gray-50' : '' }}"  x-data='{"enabled":  true, "room_commission" : {{ (100 - $room->commission ?: 0) * 0.01 * $transaction->amount }}, "commission" : {{ 100 - $room->commission ?: 0 }}, "amount" : {{ $transaction->amount }}}'>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <input type="checkbox" checked class="w-4 h-w-4 border border-gray-600 rounded-sm focus cursor-pointer relative" @change.prevent="enabled = $el.checked;" @change="$dispatch('sheetchange')">
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">{{ $loop->index + 1 }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col">
            <span class="text-xs text-gray-600 cursor-default">@time($transaction->updated_at,'%A %d %B %y')</span>
            <span class="text-xs text-gray-600 cursor-default">@time($transaction->updated_at,'ساعت H:i')</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">{{ $transaction->title }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default text-right dir-ltr en">{{ $transaction->action->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">{{ $transaction->description }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            @if ($transaction->amount > 0)
                <span class="text-xs text-green-600 cursor-default">@amount($transaction->amount) تومان</span>
            @elseif ($transaction->amount < 0)
                <span class="text-xs text-red-600 cursor-default">@amount($transaction->amount) تومان</span>
            @else
                <span class="text-xs text-gray-600 cursor-default">0</span>
            @endif
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap" :class='{"opacity-50" : !enabled}'>
        <div class="flex items-center">
            <span class="text-xs text-gray-600 relative top-0.5 cursor-default ml-1">%</span>
            <div class="relative">

                <input type="number" class="w-16 h-7 border border-gray-300 rounded text-xs text-gray-600 focus disabled:bg-gray-100" :value="commission" x-model="commission" x-effect="commission = Math.round(Math.max(0,Math.min(commission, 100)));$el.value = commission; room_commission = Math.round((commission * 0.01) * amount);" :disabled="!enabled">
            </div>
            <div class="relative mr-1">
                <input type="number" class="text-left ltr w-24 h-7 border border-gray-300 rounded text-xs text-gray-600 focus disabled:bg-gray-100" :value="room_commission" x-model="room_commission" x-effect="room_commission = parseInt(room_commission); room_commission = room_commission = amount > 0 ? room_commission : (room_commission > 0 ? room_commission * -1 : room_commission);room_commission = room_commission = amount > 0 ? Math.round(Math.max(0,Math.min(room_commission, amount))) : Math.round(Math.min(0,Math.max(amount, room_commission)));$el.value = room_commission;commission = Math.round((room_commission * 100) / amount);$dispatch('sheetchange')" x-ref="room_commission" :disabled="!enabled" data-amount="{{ $transaction->amount }}" data-commission="">
                <span class="spinner"></span>
            </div>
            <span class="text-xs text-gray-600 relative top-0.5 cursor-default mr-1">تومان</span>
        </div>
    </td>
</tr>
