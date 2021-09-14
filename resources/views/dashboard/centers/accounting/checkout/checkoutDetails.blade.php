<div>
    <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('انتخاب حساب بانکی جهت تسویه')</label>
    <div class="relative">
        <select class="border border-gray-300 h-10 rounded w-full text-xs focus select-loading lijax-sending">
            <option>IR113900001000793178513446 - محمدعلی نخلی (بانک رسالت)</option>
            <option>IR227200005000883179651432 - محمدعلی نخلی (بانک ملی)</option>
        </select>
        <div class="spinner"></div>
    </div>
</div>
<div class="mt-4">
    <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('دوره‌ی تسویه حساب')</label>
    <div class="relative">
        <select class="border border-gray-300 h-10 rounded w-full text-xs focus select-loading lijax-sending">
            <option selected>غیر فعال</option>
            <option>روزانه</option>
            <option>هفتگی</option>
            <option>ماهانه</option>
        </select>
        <div class="spinner"></div>
    </div>
</div>
<div class="mt-4">
    <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('تسویه آنی')</label>
    <div class="flex flex-col xs:flex-row items-end xs:items-center">
        <div class="w-full relative xs:ml-2">
            <input type="number" name="amount" id="amount" value="1350000" class="border border-gray-300 h-10 rounded pr-4 pl-14 w-full text-xs dir-ltr focus">
            <span class="absolute left-4 top-1 text-xs flex items-center h-8 cursor-default">@lang('Toman')</span>
        </div>
        <button class="mt-2 xs:mt-0 bg-green-600 rounded-full h-9 px-8 text-white text-sm hover:bg-green-700 transition focus-current ring-green-600">
            @lang('Settlement')
        </button>
    </div>
</div>