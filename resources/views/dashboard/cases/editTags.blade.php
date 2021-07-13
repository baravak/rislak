<form class="w-full mt-6" action="#" method="POST">
    <div class="p-4 border border-gray-200 rounded">
        <div>
            <label for="tag-finder" data-alias="tag_finder"  class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Tags')</label>
            <select id="tag-finder" data-fill="tags" name="tags[]" multiple class="select2-select">
                    <option value="" selected>آسبیب‌های اجتماعی</option>
                    <option value="" selected>استرس</option>
                    <option value="" selected>اضطراب</option>
            </select>
        </div>
    </div>
    <button type="submit" class="inline-flex items-center justify-center h-9 mt-4 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 focus transition">
        {{ __('Edition') }}
    </button>
</form>
