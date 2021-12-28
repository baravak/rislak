<div class="sample-matrix">
    <div>
        <h3>@lang('مادر')</h3>
        <div class="items hidden sm:grid">
            <div class="item">
                <input type="radio" name="matrix-item" id="matrix-item-1" class="sr-only">
                <label for="matrix-item-1" class="bg-red-400 bg-opacity-30">@lang('کاملا غلط')</label>
            </div>
            <div class="item">
                <input type="radio" name="matrix-item" id="matrix-item-2" class="sr-only">
                <label for="matrix-item-2" class="bg-red-400 bg-opacity-20">@lang('تقریبا غلط')</label>
            </div>
            <div class="item">
                <input type="radio" name="matrix-item" id="matrix-item-3" class="sr-only">
                <label for="matrix-item-3" class="bg-green-400 bg-opacity-20">@lang('بیشتر درست است تا غلط')</label>
            </div>
            <div class="item">
                <input type="radio" name="matrix-item" id="matrix-item-4" class="sr-only">
                <label for="matrix-item-4" class="bg-green-400 bg-opacity-30">@lang('اندکی درست')</label>
            </div>
            <div class="item">
                <input type="radio" name="matrix-item" id="matrix-item-5" class="sr-only">
                <label for="matrix-item-5" class="bg-green-400 bg-opacity-40">@lang('تقریبا درست')</label>
            </div>
            <div class="item">
                <input type="radio" name="matrix-item" id="matrix-item-6" class="sr-only">
                <label for="matrix-item-6" class="bg-green-400 bg-opacity-50">@lang('کاملا درست')</label>
            </div>
        </div>
        <div class="sm:hidden mt-2">
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
</div>