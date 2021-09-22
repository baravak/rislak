<form action="{{ route('dashboard.banks.settleds.store') }}" x-data='{"type" : "{{ $bank->scheduling ? $bank->scheduling->type : 'immediate' }}", "value" : "{{$bank->scheduling ? $bank->scheduling->value : '' }}"}' method="POST">
    <div class="flex items-center justify-between flex-col xs:flex-row p-2 rounded border border-dashed border-green-600 bg-green-50 tex-center mb-4 cursor-default">
        <span class="text-xs text-gray-500">@lang('موجودی حساب'):</span>
        <span class="text-sm text-green-600 variable-font-semibold relative top-0.5">135,000 <small>@lang('Toman')</small></span>
    </div>
    <div>
        <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('انتخاب حساب بانکی جهت تسویه')</label>
        <select class="border border-gray-300 h-10 rounded w-full text-xs focus" name="isbn_id">
            @foreach ($bank->items->where('status', 'verified') as $item)
                <option value="{{ $item->id }}">{{ $item->isbn }} - {{ $item->owner }} ({{ $item->bank->title }})</option>
            @endforeach
        </select>
    </div>
    <div class="mt-4">
        <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('نحوه تسویه حساب')</label>
        <select class="border border-gray-300 h-10 rounded w-full text-sm focus" name="type" x-model="type">
            <option selected value="immediate">تسویه آنی</option>
            <option value="daliy">زمان‌بندی: روزانه</option>
            <option value="weekly">زمان‌بندی: هفتگی</option>
            <option value="monthly">زمان‌بندی: ماهانه</option>
        </select>
    </div>
    <div class="mt-4" x-show="type == 'weekly'">
        <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('انتخاب یک روز در هفته')</label>
        <select name="weekday" class="border border-gray-300 h-10 rounded w-full text-sm focus" :disabled="type != 'weekly'">
            <option selected disabled>انتخاب کنید</option>
            <option value="0" :selected="value == $el.value">شنبه</option>
            <option value="1" :selected="value == $el.value">یک‌شنبه</option>
            <option value="2" :selected="value == $el.value">دوشنبه</option>
            <option value="3" :selected="value == $el.value">سه‌شنبه</option>
            <option value="4" :selected="value == $el.value">چهارشنبه</option>
            <option value="5" :selected="value == $el.value">پنج‌شنبه</option>
            <option value="6" :selected="value == $el.value">جمعه</option>
        </select>
    </div>
    <div class="mt-4" x-show="type == 'monthly'">
        <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('انتخاب یک روز در ماه')</label>
        <select name="day" class="border border-gray-300 h-10 rounded w-full text-sm focus" :disabled="type != 'monthly'">
            <option selected disabled>انتخاب کنید</option>
            @for ($i = 1; $i < 29; $i++)
                <option value="{{ $i }}" :selected="value == $el.value">{{ $i }}</option>
            @endfor
            <option value="before_last" :selected="value == $el.value">یک روز مانده به روز آخر ماه</option>
            <option value="last_day" :selected="value == $el.value">روز آخر ماه</option>
        </select>
    </div>
    <div class="mt-4" x-show="type == 'immediate'">
        <label for="amount" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('مبلغ')</label>
        <div class="w-full relative" x-data='{"amount" : "0"}'>
            <input type="number" name="amount" id="amount" x-model="amount" x-effect="amount = amount.replace(/^0/g, '')" :value="amount" :disabled="type != 'immediate'" class="border border-gray-300 h-10 rounded pr-4 pl-16 w-full text-sm dir-ltr focus">
            <span class="absolute left-1 top-1 bg-gray-200 px-3 rounded text-xs flex items-center h-8 cursor-default">@lang('Toman')</span>
            <span class="block text-xs text-gray-500 text-left mt-2 cursor-default" x-text="(amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '،') || '0') + ' تومان'"></span>
        </div>
    </div>
    <div class="mt-4 text-sm text-gray-600 cursor-default" x-show="type != 'immediate'">
        تسویه‌های زمان‌بندی شده، رأس ساعت <span class="variable-font-semibold">۰۵:۳۰</span> صورت می‌گیرد. بنابراین نهایتا تا فردای کاری هر درخواست، مبلغ به حساب ثبت شده واریز می‌گردد.
    </div>
    <div class="mt-4">
        <button class="bg-green-600 rounded-full h-9 px-8 text-white text-sm hover:bg-green-700 transition focus-current ring-green-600" x-text="type == 'immediate' ? 'تسویه آنی' : 'ثبت زمان‌بندی'"></button>
    </div>
    <p class="text-xs text-yellow-600 leading-5 bg-yellow-50 p-2 mt-4 border-r-2 border-yellow-400 cursor-default">
        در حال حاضر، تسویه حساب زمان‌بندی شده فعال <span class="underline">نیست</span>. در صورت تمایل آن را فعال کنید.
    </p>
</form>
