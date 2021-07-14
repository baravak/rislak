<form class="w-full mt-6" action="{{ route('dashboard.case.tags.update', $case->id) }}" method="POST">
    @method('PUT')
    <div class="p-4 border border-gray-200 rounded">
        <div>
            <label for="tag-finder" data-alias="tag_finder"  class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Tags')</label>
            <select id="tag-finder" data-fill="tags" name="tags[]" multiple class="select2-select" data-url="{{route('dashboard.tags.index', ['region' => $center->id])}}" data-tags="true">
                    @foreach ($case->tags ?: [] as $tag)
                        <option value="{{ $tag->id }}" selected>{{ $tag->title }}</option>
                    @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="inline-flex items-center justify-center h-9 mt-4 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 focus transition">
        {{ __('ویرایش برچسب‌ها') }}
    </button>
</form>
