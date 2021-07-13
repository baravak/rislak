<form class="w-full mt-6" action="#" method="POST">
    {{-- @method('PUT') --}}
    <div class="p-4 border border-gray-200 rounded">
        <div>
            <label for="title" class="block mb-2 text-sm text-gray-700 variable-font-medium">عنوان یا سریال داخلی</label>
            <input type="text" name="title" id="title" autocomplete="off" value="CS96666AS" placeholder="عنوان پرونده یا سریال داخلی‌ای که استفاده می‌کنید" class="border border-gray-500 h-10 rounded px-4 w-full text-sm placeholder-gray-300 focus">
        </div>

        <div class="mt-4">
            <label for="client_id" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Client')</label>
            <select name="client_id[]" id="client_id" data-placeholder="{{__('Select client') . ' ' . __('through mobile or name')}}" multiple class="select2-select">
                    <option value="" selected>علی قلی‌پور</option>
                    <option value="" selected>زهرا پور جاوید</option>
            </select>
        </div>

        <div class="mt-4">
            <label for="problem" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Problem')</label>
            <textarea id="problem" name="problem" autocomplete="off" class="resize-none border border-gray-500 h-24 rounded px-4 py-2 w-full text-sm focus"></textarea>
        </div>
    </div>

    <button type="submit" class="inline-flex items-center justify-center h-9 mt-4 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 focus transition">
        {{ __('Edition') }}
    </button>
</form>
