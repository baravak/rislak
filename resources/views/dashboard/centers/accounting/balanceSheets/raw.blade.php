<tr id="room-{{ $room->id }}" class="relative transition hover:bg-gray-100 {{ ($loop->index % 2) ? 'bg-gray-50' : '' }}"  x-data='{"dragEnter" : false, "inDrag" : false, "row_node" : $el}' draggable="true" @dragstart="inDrag = true; dragable = true; dragElement = $el" @dragend="dragable = false; inDrag = false">
    <td class="px-3 py-2 whitespace-nowrap">
        <div style="position: absolute; top:0; left: 0; width:100%; height:100%;" x-show="dragable" :class='{"border-top border-t-8 border-gray-400" : dragEnter  && !inDrag}' @dragenter.prevent="dragEnter = true;" @dragleave.prevent="dragEnter = false"  @drop.prevent="dragEnter = false;" @drop="$el.parentNode.parentNode.parentNode.insertBefore(dragElement, $el.parentNode.parentNode)" @dragover.prevent="event.preventDefault()"></div>
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">
                <span x-show="dragable" x-on:restartlist.window="$el.innerHTML = event.detail.indexOf(row_node) + 1 + '.'">{{ $loop->index + 1 }}.</span>
                {{ $room->manager->name }}
            </span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            @if ($room->balance == 0)
                <span class="text-xs text-gray-600 block cursor-default">0</span>
            @elseif($room->balance >= 0)
                <span class="text-xs text-green-600 block cursor-default">
                    @amount($room->balance)
                </span>
            @else
                <span class="text-xs text-red-600 block cursor-default">
                    @amount($room->balance)
                </span>
            @endif
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">{{ $room->transaction_records }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default relative top-0.5">
                @time($room->settled_at,'%A %d %B %y - ساعت H:i')
            </span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block">
            <a href="{{ route('dashboard.center.balanceSheets.show', $room->id) }}" class="inline-block px-3 py-1 text-xs text-brand hover:text-white border border-brand hover:bg-brand rounded-full transition">@lang('Pre-invoice and settlement')</a>
            @if (config('app.env') == 'local')
                <a href="#" class="inline-block px-3 py-1 text-xs text-gray-500 hover:text-white border border-gray-400 hover:bg-gray-400 rounded-full transition ml-1">@lang('Reports')</a>
            @endif
        </div>
    </td>
</tr>
