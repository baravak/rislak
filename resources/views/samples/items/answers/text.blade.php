<div>
<textarea name="item-{{ $key + 1 }}" id="item-{{ $key+1 }}"
    placeholder="پاسخ را در این قسمت بنویسید"
    class="w-full text-sm text-gray-600 border border-gray-300 rounded resize-none placeholder-gray-300 p-4"
    data-merge='[{{ $key+1 }}]'
    data-item-value
    >{{ isset($item->user_answered) ? $item->user_answered : '' }}</textarea>
</div>
