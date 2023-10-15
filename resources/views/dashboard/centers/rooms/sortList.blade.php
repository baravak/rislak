<div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-4 2xl:grid-cols-6 gap-4 d-notification" x-data='{"rooms" : {{ json_encode($rooms) }}, "dragStart" : false, "dragElement" : null, dropElement: null}' x-ref="list" @drop="$el.querySelectorAll('[data-room]').forEach(function(el, i){rooms[el.getAttribute('data-index')].order = i + 1})"  @move.window="new Statio({context: $el, url : `/dashboard/rooms/${event.detail.id}`,type:'render', ajax:{method : 'PUT', data : {order : event.detail.order}}})">
    <template x-for="(room, key) in rooms">
        <div class="relative" x-data='{"base" : false}' :data-room="room.id" x-init="room.order = key + 1" :data-index="key">
            <div class="border rounded transition p-2 border-gray-400 border-dashed " style="position: absolute; width: 100%; height: 100%; top:0; right:0; z-index:2;" x-show="dragStart" @dragenter.prevent="dropElement = $el.parentNode; base = true" @dragleave.prevent="dropElement = null; base = false" :class='{"opacity-100" : base, "opacity-0" : !base}' @drop="$dispatch('move', {'id' : dragElement.getAttribute('data-room'), 'order' : rooms[dragElement.getAttribute('data-index')].order < rooms[$el.parentNode.getAttribute('data-index')].order ?  rooms[$el.parentNode.getAttribute('data-index')].order - 1 : rooms[$el.parentNode.getAttribute('data-index')].order}); $el.parentNode.parentNode.insertBefore(dragElement, $el.parentNode);" @drop.prevent="base = false; dragStart =false; dragElement= null"  @dragover.prevent="event.preventDefault()">
            </div>
            <div class="flex items-center justify-center" x-show="dragStart && base" style="position: absolute; width: 100%; height: 100%; top:0; right:0;">
                <div class="text-gray-400 relative top-0.5" x-text="room.order" :data-sort="room.order"></div>
            </div>
            <div class="relative border rounded transition p-2 cursor-move border-gray-300" draggable="true" @dragstart="dragStart = true; dragElement = $el.parentNode;"  @dragend="dragStart = false" x-show="!dragStart || (dragStart && !base)">
                <div class="flex justify-center items-center flex-shrink-0 w-14 h-14 mx-auto bg-gray-300 text-gray-600 rounded-full border border-gray-100 overflow-hidden">
                </div>
                <div class="text-sm text-center text-gray-700 variable-font-medium mt-2" x-text="room.manager.name">
                    در حالت عادی
                </div>
                <div class="absolute right-2 top-2 w-6 h-6 bg-brand text-white text-sm variable-font-semibold flex items-center justify-center rounded-full" x-show="dragStart">
                    <span class="relative top-0.5" x-text="room.order" :data-sort="room.order"></span>
                </div>
                <div class="absolute left-2 top-2">
                    <div class="relative inline-block w-8 mr-2 align-middle select-none transition ease-in-out duration-700" title="فعال / غیر فعال">
                        <input :checked="room.status === 'active'" type="checkbox" x-on:change="new Statio({context: $el, url : `/dashboard/rooms/${room.id}`,type:'render', ajax:{method : 'PUT', data : {status : $el.checked ? 1 : 0}}})" :name="`available[${room.id}]`" :id="`available[${room.id}]`" data-method="" data-action="" data-xhrbase="" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer platform-available-input">
                        <label :for="`available[${room.id}]`" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>
            </div>
        </div>
    </template>
    <div class="relative  p-2" x-show="dragStart">
        <div class="flex items-center justify-center border rounded transition cursor-move border-gray-400 border-dashed " style="position: absolute; width: 100%; height: 100%; top:0; right:0; z-index:2;" x-show="dragStart" @dragenter.prevent="dropElement = $el.parentNode" @dragleave.prevent="dropElement = null" @drop="$dispatch('move', {'id' : dragElement.getAttribute('data-room'), 'order' : 31}); $el.parentNode.parentNode.insertBefore(dragElement, $el.parentNode);" @drop.prevent="dragStart =false; dragElement= null"  @dragover.prevent="event.preventDefault()">
        </div>
        <div class="flex items-center justify-center p-2" style="position: absolute; width: 100%; height: 100%; top:0; right:0;">
            <div class="text-gray-400 relative top-0.5" x-text="rooms.length" :data-sort="rooms.length"></div>
        </div>
    </div>
</div>
