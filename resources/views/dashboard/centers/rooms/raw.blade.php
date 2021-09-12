<tr id="room-{{ $room->id }}" data-roomId="{{ $room->id }}" class="relative transition hover:bg-gray-100 {{ ($loop->index % 2) ? 'bg-gray-50' : '' }}"  x-data='{"dragEnter" : false, "inDrag" : false, "row_node" : $el}' draggable="true" @dragstart="inDrag = true; dragable = true; dragElement = $el" @dragend="dragable = false; inDrag = false">
    <td class="px-3 py-2 whitespace-nowrap text-xs text-gray-600 cursor-default" x-on:restartlist.window="$el.innerHTML = event.detail.indexOf(row_node) + 1">{{ $loop->index + 1 }}
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div style="position: absolute; top:0; left: 0; width:100%; height:100%;" x-show="dragable" :class='{"border-top border-t-8 border-gray-400" : dragEnter  && !inDrag}' @dragenter.prevent="dragEnter = true;" @dragleave.prevent="dragEnter = false"  @drop.prevent="dragEnter = false;" @drop="$el.parentNode.parentNode.parentNode.insertBefore(dragElement, $el.parentNode.parentNode)" @dragover.prevent="event.preventDefault()"></div>
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">
                {{ $room->manager->name }}
            </span>
        </div>
    </td>
</tr>
