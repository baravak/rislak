<div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-4 2xl:grid-cols-6 gap-4">
    <div class="relative border rounded transition p-2 cursor-move border-gray-300">
        <div class="flex justify-center items-center flex-shrink-0 w-14 h-14 mx-auto bg-gray-300 text-gray-600 rounded-full border border-gray-100 overflow-hidden">
            م‌ن
        </div>
        <div class="text-sm text-center text-gray-700 variable-font-medium mt-2">
            در حالت عادی
        </div>
        {{-- @if ($room->center) --}}
            <div class="text-xs text-center text-gray-500 mt-1">
                {{-- @if ($room->center->type == 'personal_clinic') --}}
                    @lang('Personal clinic')
                {{-- @else --}}
                    {{-- {{ $room->center->detail->title }} --}}
                {{-- @endif --}}
            </div>
        {{-- @endif --}}
        <div class="absolute right-2 top-2 w-6 h-6 bg-brand text-white text-sm variable-font-semibold flex items-center justify-center rounded-full">
            <span class="relative top-0.5">1</span>
        </div>
        <div class="absolute left-2 top-2">
            <div class="relative inline-block w-8 mr-2 align-middle select-none transition ease-in-out duration-700" title="فعال / غیر فعال">
                <input checked type="checkbox" name="available" id="enable-disable" data-method="" data-action="" data-xhrbase="" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer lijax platform-available-input">
                <label for="enable-disable" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
            </div>
        </div>
    </div>
    <div class="relative border rounded transition p-2 cursor-move border-brand bg-blue-50">
        <div class="flex justify-center items-center flex-shrink-0 w-14 h-14 mx-auto bg-gray-300 text-gray-600 rounded-full border border-gray-100 overflow-hidden">
            م‌ن
        </div>
        <div class="text-sm text-center text-gray-700 variable-font-medium mt-2">
            وقتی درگ میشه و در حال جابجایی هست
        </div>
        {{-- @if ($room->center) --}}
            <div class="text-xs text-center text-gray-500 mt-1">
                {{-- @if ($room->center->type == 'personal_clinic') --}}
                    {{-- @lang('Personal clinic') --}}
                {{-- @else --}}
                    {{-- {{ $room->center->detail->title }} --}}
                    مرکز درمانی طلیعه سلامت
                {{-- @endif --}}
            </div>
        {{-- @endif --}}
        <div class="absolute right-2 top-2 w-6 h-6 bg-brand text-white text-sm variable-font-semibold flex items-center justify-center rounded-full">
            <span class="relative top-0.5">2</span>
        </div>
        <div class="absolute left-2 top-2">
            <div class="relative inline-block w-8 mr-2 align-middle select-none transition ease-in-out duration-700" title="فعال / غیر فعال">
                <input type="checkbox" name="available" id="enable-disable1" data-method="" data-action="" data-xhrbase="" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer lijax platform-available-input">
                <label for="enable-disable1" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center border rounded transition p-2 cursor-move border-gray-400 border-dashed">
        <div class="text-gray-400 relative top-0.5">3</div>
    </div>
</div>