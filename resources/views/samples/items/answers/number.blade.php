<div>
    <input type="number" step="{{ $item->answer->step ?? 'any' }}" min="{{ $item->answer->min ?? 0 }}" @isset($item->answer->max) max="{{ $item->answer->max }}" @endisset name="item-{{ $key + 1 }}" id="item-{{ $key+1 }}"class="w-full text-sm text-gray-600 border border-gray-300 rounded resize-none placeholder-gray-300 p-4" data-merge='[{{ $key+1 }}]' value="{{ isset($item->user_answered) ? $item->user_answered : '' }}">
</div>
