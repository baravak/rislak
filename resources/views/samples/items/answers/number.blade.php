<div>
    <input type="number" step="1" min="0" max="200" name="item-{{ $key + 1 }}" id="item-{{ $key+1 }}"class="w-full text-sm text-gray-600 border border-gray-300 rounded resize-none placeholder-gray-300 p-4" data-merge='[{{ $key+1 }}]' value="{{ isset($item->user_answered) ? $item->user_answered : '' }}">
</div>
