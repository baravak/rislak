<div x-data='{
    options : {{json_encode($item->answer->options)}},
    user_answered : {{isset($item->user_answered) ?
    '['.$item->user_answered .']' :
    json_encode(array_map(function($index){
        return $index + 1;
    }, array_keys($item->answer->options)))}}
}' x-init="$watch('user_answered', value => {$('#item-{{$key +1 }}').trigger('change')})">
    <input type="hidden" name="item-{{$key + 1}}" id="item-{{$key + 1}}"
    :value="user_answered" x-model="user_answered" data-merge="[{{ $key+1 }}]" data-item-value>
    <template x-for="(option, index) in user_answered">
        <div class="mb-4" :data-index="index" :data-order="index">
            <div class="flex ">
                <div class="border border-gray-300 rounded flex items-center justify-center text-gray-500 w-10 h-10 ml-2 flex-shrink-0" x-text="index + 1">
                </div>
                <button :disabled="index == user_answered.length - 1"
                class="border border-blue-600 rounded flex items-center justify-center text-blue-600 w-10 h-10 focus ml-1 flex-shrink-0 disabled:opacity-50 disabled:text-gray-400 disabled:border-gray-300"
                @click="user_answered.splice(index, 1); user_answered.splice(index + 1, 0, option); ">
                    <i class="far fa-arrow-down"></i>
                </button>
                <button :disabled="index == 0"
                class="border border-blue-600 rounded flex items-center justify-center text-blue-600 w-10 h-10 focus ml-1 flex-shrink-0 disabled:opacity-50 disabled:text-gray-400 disabled:border-gray-300"
                @click="user_answered.splice(index, 1); user_answered.splice(index -1, 0, option);">
                    <i class="far fa-arrow-up"></i>
                </button>
                <div class="border border-gray-300 rounded flex  w-full items-center text-gray-500 p-2 text-sm cursor-default" x-text="options[option - 1]">
                </div>
            </div>
        </div>
    </template>
</div>
