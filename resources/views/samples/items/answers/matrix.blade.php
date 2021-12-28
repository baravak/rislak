<div>
    <div class="hidden md:block sample-matrix">
        <div class="matrix-grid">
            <div></div>
            <h3>@lang('کاملا غلط')</h3>
            <h3>@lang('تقریبا غلط')</h3>
            <h3>@lang('بیشتر درست است تا غلط')</h3>
            <h3>@lang('اندکی درست')</h3>
            <h3>@lang('تقریبا درست')</h3>
            <h3>@lang('کاملا درست')</h3>
        </div>
        <div class="matrix-grid">
            <h4 class="bg-gray-50 {{-- bg-gray-100 --}}">@lang('پدر')</h4>
            <label class="bg-gray-50 {{-- bg-gray-100 --}}">
                <input type="radio" name="matrix-1" id="matrix-1-1">
            </label>
            <label class="bg-gray-50 {{-- bg-gray-100 --}}">
                <input type="radio" name="matrix-1" id="matrix-1-2">
            </label>
            <label class="bg-gray-50 {{-- bg-gray-100 --}}">
                <input type="radio" name="matrix-1" id="matrix-1-3">
            </label>
            <label class="bg-gray-50 {{-- bg-gray-100 --}}">
                <input type="radio" name="matrix-1" id="matrix-1-4">
            </label>
            <label class="bg-gray-50 {{-- bg-gray-100 --}}">
                <input type="radio" name="matrix-1" id="matrix-1-5">
            </label>
            <label class="bg-gray-50 {{-- bg-gray-100 --}}">
                <input type="radio" name="matrix-1" id="matrix-1-6">
            </label>
        </div>
    </div>
    <div class="md:hidden mt-2 sample-matrix-select">
        <h4>@lang('پدر')</h4>
        <select name="" id="">
            <option value="" disabled selected>@lang('انتخاب کنید')</option>
            <option value="">@lang('کاملا غلط')</option>
            <option value="">@lang('تقریبا غلط')</option>
            <option value="">@lang('بیشتر درست است تا غلط')</option>
            <option value="">@lang('اندکی درست')</option>
            <option value="">@lang('تقریبا درست')</option>
            <option value="">@lang('کاملا درست')</option>
        </select>
    </div>
</div>