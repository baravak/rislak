<div x-data='{"_length" : {{ mb_strlen(isset($item->user_answered) ? str_replace("\n", '\n', $item->user_answered) : '' )}}}'>
    <textarea name="item-{{ $key + 1 }}" id="item-{{ $key+1 }}"
    placeholder="پاسخ را در این قسمت بنویسید"
    class="w-full text-sm text-gray-600 h-48 border border-gray-300 rounded resize-none placeholder-gray-300 p-4"
    data-merge='[{{ $key+1 }}]'
    data-item-value
    x-on:paste="clipboardData = event.clipboardData || window.clipboardData;
    pastedData = clipboardData.getData('Text');
    _length = ($el.value + pastedData).length;
    document.querySelector('#descriptice-{{ $key+1 }}-log').dispatchEvent(new CustomEvent('check'))"
    x-on:keyup="_length = $el.value.length;
    document.querySelector('#descriptice-{{ $key+1 }}-log').dispatchEvent(new CustomEvent('check'))">{{ isset($item->user_answered) ? $item->user_answered : '' }}</textarea>
    <div class="flex items-center justify-end cursor-default">
        <span class="text-sm variable-font-medium" id="descriptice-{{ $key+1 }}-log"
        x-on:check="$el.innerText = 255 - _length"
        :class='{"text-red-500" : 255 - _length < 0, "text-gray-600" : 255 - _length >= 0}'
        x-effect="$el.dispatchEvent(new CustomEvent('check'))">0</span>
        <span class="text-xs text-gray-400 mx-1">/</span>
        <span class="text-xs text-gray-400">255</span>
    </div>
</div>
