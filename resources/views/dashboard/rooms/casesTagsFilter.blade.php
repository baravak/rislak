<div class="flex items-center flex-wrap mb-4">
    <span class="ml-2 text-gray-600 text-sm mb-2 cursor-default">فیلتر بر اساس برچسب‌ها:</span>
    @foreach ($room->pinned_tags ?: [] as $tag)
        <label class="room-case-tag inline-flex items-center group h-7 mb-2 ml-2 bg-gray-100 rounded px-2 cursor-pointer">
            <input type="checkbox" name="tag[]" value="{{ $tag->id }}" data-tagFilter="tag" data-url="{{ route('dashboard.rooms.show', [$room->id]) }}" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1" {{ $TagFilter && $TagFilter->where('id', $tag->id)->first() ? 'checked' : '' }}>
            <span class="text-sm text-gray-700 mr-2 group-hover:text-blue-600 pt-1">{{ $tag->title }}</span>
        </label>
    @endforeach

</div>
