<div class="mt-8">
    <div class="mb-4">
        <h2 class="heading" data-total="" data-xhr="total">@lang('Determining the payment methods')</h2>
        <p class="text-xs text-gray-500 mt-2 pr-10 cursor-default leading-5">
            شما می توانید به عنوان مدیر یا مسئول مالی این مرکز، در <a href="#" class="text-blue-500 hover:text-blue-600 transition underline">این صفحه</a> خزانه‌های مالی خود را تعریف کنید و سپس در این قسمت مشخص کنید که از چه حسابی و از کجا سهم اتاق پرداخت می‌شود.
        </p>
    </div>

    <div action="" x-data='{"treasuries" : {{ json_encode($room->center->treasuries) }}}'>
        <template x-for="(treasury, index) in treasuries">
            <div class="flex flex-col xs:flex-row w-full md:w-2/3 2xl:w-1/2 mx-auto" :class='{"mt-4 xs:mt-2" : index !== 0}' x-data='{"bill_amount" : 0}'>
                <select disabled class="border border-gray-400 h-8 rounded w-full text-xs focus disabled:bg-gray-100">
                    <option :value="treasury.id" x-text="treasury.title"></option>
                </select>
                <div class="w-full relative mt-2 xs:mt-0 xs:mr-2">
                    <input type="number" x-model="bill_amount" x-effect="
                    bill_amount = parseInt(bill_amount) || 0;
                    bill_amount = room_amount > 0 ? bill_amount : (bill_amount > 0 ? bill_amount * -1 : bill_amount);
                    all_bill_amount = [...document.querySelectorAll('[data-bill-amount]')];
                    trArray = 0;all_bill_amount.forEach((el, a) => trArray += parseInt(el.value || 0) );
                    sum_r = room_amount > 0 ? trArray - bill_amount : trArray + (bill_amount * -1);
                    amount_r = room_amount > 0 ? room_amount - sum_r : room_amount + (sum_r * -1);
                    bill_amount = bill_amount = room_amount > 0 ? Math.round(Math.max(0,Math.min(bill_amount, amount_r))) : Math.round(Math.min(0,Math.max(amount_r, bill_amount)));
                    $el.value = bill_amount;
                    pay_balance = 0;
                    all_bill_amount.forEach((el, a) => pay_balance += parseInt(el.value || 0) )
                    " :name="`treasury[${treasury.id}]`" :value="bill_amount" data-bill-amount class="border border-gray-400 h-8 rounded pr-4 pl-14 w-full text-xs dir-ltr focus">
                    <span class="absolute left-1 top-1 text-xs flex items-center justify-center bg-gray-200 px-2 h-6 rounded">@lang('Toman')</span>
                </div>
            </div>
        </template >
        {{-- <div class="flex flex-col xs:flex-row w-full md:w-2/3 2xl:w-1/2 mx-auto mt-4 xs:mt-2">
            <select disabled class="border border-gray-400 h-8 rounded w-full text-xs focus disabled:bg-gray-100">
                <option value="@lang('کیف پول نقدی')">@lang('کیف پول نقدی')</option>
            </select>
            <div class="w-full relative mt-2 xs:mt-0 xs:mr-2">
                <input type="number" name="amount" id="amount" class="border border-gray-400 h-8 rounded pr-4 pl-14 w-full text-xs dir-ltr focus">
                <span class="absolute left-1 top-1 text-xs flex items-center justify-center bg-gray-200 px-2 h-6 rounded">@lang('Toman')</span>
            </div>
        </div> --}}
        {{-- <div class="flex flex-col xs:flex-row w-full md:w-2/3 2xl:w-1/2 mx-auto mt-4 xs:mt-2">
            <select id="treasurie" name="treasurie" class="border border-gray-400 h-8 rounded w-full text-xs focus disabled:bg-gray-100">
                <option value="@lang('کیف پول مرکز')">@lang('کیف پول مرکز')</option>
                <option value="@lang('کیف پول اتاق درمانی شخصی')">@lang('کیف پول اتاق درمانی شخصی')</option>
                <option value="@lang('کیف پول شخصی')">@lang('کیف پول شخصی')</option>
            </select>
            <div class="w-full relative mt-2 xs:mt-0 xs:mr-2">
                <input type="number" name="amount" id="amount" class="border border-gray-400 h-8 rounded pr-4 pl-14 w-full text-xs dir-ltr focus">
                <span class="absolute left-1 top-1 text-xs flex items-center justify-center bg-gray-200 px-2 h-6 rounded">@lang('Toman')</span>
            </div>
        </div> --}}

        <div class="flex items-center justify-end w-full md:w-2/3 2xl:w-1/2 mx-auto text-xs mt-4 xs:mt-2 cursor-default">
            <span class="text-gray-500">@lang('Balance'):</span>
            <span class="text-red-600 variable-font-medium mr-2"><span x-model="room_amount" x-text="room_amount - pay_balance">{{ array_sum($transactions->pluck('amount')->toArray()) }}</span> <small>@lang('Toman')</small></span>
            {{-- <span class="text-gray-500 variable-font-medium mr-2">0 <small>@lang('Toman')</small></span> --}}
        </div>

        {{-- <button type="button" class="flex items-center justify-center w-full md:w-2/3 2xl:w-1/2 mx-auto mt-4 xs:mt-2 text-green-600 border border-green-600 border-dashed rounded px-4 h-8 focus hover:bg-green-50 transition">
            <i class="fal fa-plus text-sm"></i>
            <span class="text-xs mr-2">@lang('افزودن روش پرداخت جدید')</span>
        </button> --}}


        <div class="flex justify-end mt-8 md:w-2/3 2xl:w-1/2 mx-auto">
            <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition focus" title="@lang('Calculation and payment')" aria-label="@lang('Calculation and payment')" role="button">
                @lang('Calculation and payment')
            </button>
        </div>
    </div>
</div>
