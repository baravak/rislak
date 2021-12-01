<a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-blue-600 hover:border-blue-600 hover:bg-blue-50 hover:bg-opacity-20 transition h-14">
    <i class="fal fa-edit"></i>
    <span class="text-sm mr-3 pt-0.5">@lang('ویرایش کد تخفیف')</span>
</a>
<div class="relative dropdown w-full">
    <button type="button" class="dropdown-toggle flex items-center w-full border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-purple-600 hover:border-purple-600 hover:bg-purple-50 hover:bg-opacity-20 transition h-14 focus-current ring-purple-600">
        <i class="far fa-exchange"></i>
        <span class="text-sm mr-3 pt-0.5">@lang('تغییر کد و لینک')</span>
    </button>
    <div class="dropdown-menu absolute w-56 left-0 top-16 bg-white rounded-md shadow-md px-2 py-4 z-50">
        <div class="flex flex-col items-center justify-center">
            <span class="text-sm text-gray-700 cursor-default text-center">از تغییر عبارت کد تخفیف و لینک آن مطمئن هستید؟</span>
            <div class="flex flex-col justify-center text-xs mt-3">
                <button class="flex items-center bg-purple-600 text-white hover:bg-purple-700 transition rounded-full h-7 px-8 focus-current ring-purple-600">@lang('تغییر کد')</button>
                <button class="flex items-center bg-gray-100 text-gray-600 hover:bg-gray-200 transition rounded-full h-7 px-8 focus-current ring-gray-600 mt-2">@lang('انصراف')</button>
            </div>
        </div>
    </div>
</div>
<a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-green-600 hover:border-green-600 hover:bg-green-50 hover:bg-opacity-20 transition h-14">
    <i class="fal fa-layer-plus text-lg"></i>
    <span class="text-sm mr-3 pt-0.5">@lang('کد تخفیف جدید')</span>
</a>
<a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-pink-500 hover:border-pink-500 hover:bg-pink-50 hover:bg-opacity-20 transition h-14">
    <i class="fal fa-badge-percent text-lg"></i>
    <span class="text-sm mr-3 pt-0.5">@lang('کدهای تخفیف')</span>
</a>