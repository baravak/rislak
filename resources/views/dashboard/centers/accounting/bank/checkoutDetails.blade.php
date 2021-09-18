<form action="{{ route('dashboard.banks.settleds.store') }}" x-data='{"type" : "{{ $bank->scheduling ? $bank->scheduling->type : 'immediate' }}", "value" : "{{$bank->scheduling ? $bank->scheduling->value : '' }}"}' method="POST">
    <div>
        <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('انتخاب حساب بانکی جهت تسویه')</label>
        <div class="relative">
            <select class="border border-gray-300 h-10 rounded w-full text-xs focus" name="isbn_id">
                @foreach ($bank->items->where('status', 'verified') as $item)
                    <option value="{{ $item->id }}">{{ $item->isbn }} - {{ $item->owner }} ({{ $item->bank->title }})</option>
                @endforeach
            </select>
            <div class="spinner"></div>
        </div>
    </div>
    <div class="mt-4">
        <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('نحوه تسویه حساب')</label>
        <div class="relative">
            <select class="border border-gray-300 h-10 rounded w-full text-xs focus" name="type" x-model="type">
                <option selected value="immediate">تسویه آنی</option>
                <option value="daliy">زمان‌بندی: روزانه</option>
                <option value="weekly">زمان‌بندی: هفتگی</option>
                <option value="monthly">زمان‌بندی: ماهانه</option>
            </select>
        </div>
    </div>
    <div class="mt-4" x-show="type == 'weekly'">
        <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('انتخاب یک روز در هفته')</label>
        <div class="relative">
            <select name="weekday" class="border border-gray-300 h-10 rounded w-full text-xs focus" :disabled="type != 'weekly'">
                <option selected disabled>انتخاب کنید</option>
                <option value="0" :selected="value == $el.value">شنبه</option>
                <option value="1" :selected="value == $el.value">یک‌شنبه</option>
                <option value="2" :selected="value == $el.value">دوشنبه</option>
                <option value="3" :selected="value == $el.value">سه‌شنبه</option>
                <option value="4" :selected="value == $el.value">چهارشنبه</option>
                <option value="5" :selected="value == $el.value">پنج‌شنبه</option>
                <option value="6" :selected="value == $el.value">جمعه</option>
            </select>
            <div class="spinner"></div>
        </div>
    </div>
    <div class="mt-4" x-show="type == 'monthly'">
        <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('انتخاب یک روز در ماه')</label>
        <div class="relative">
            <select name="day" class="border border-gray-300 h-10 rounded w-full text-xs focus" :disabled="type != 'monthly'">
                <option selected disabled>انتخاب کنید</option>
                @for ($i = 1; $i < 29; $i++)
                    <option value="{{ $i }}" :selected="value == $el.value">{{ $i }}</option>
                @endfor
                <option value="before_last" :selected="value == $el.value">یک روز مانده به روز آخر ماه</option>
                <option value="last_day" :selected="value == $el.value">روز آخر ماه</option>
            </select>
            <div class="spinner"></div>
        </div>
    </div>
    <div class="mt-4" x-show="type == 'immediate'">
        <label class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('مبلغ')</label>
        <div class="flex flex-col xs:flex-row items-end xs:items-center">
            <div class="w-full relative xs:ml-2" x-data='{"amount" : "0"}'>
                <input type="number" name="amount" id="amount" x-model="amount" x-effect="amount = amount.replace(/^0/g, '')" :value="amount" :disabled="type != 'immediate'" class="border border-gray-300 h-10 rounded pr-4 pl-14 w-full text-xs dir-ltr focus">
                <span class="absolute left-4 top-1 text-xs flex items-center h-8 cursor-default">@lang('Toman')</span>
                <span x-text="(amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '،') || '0') + 'تومان'"></span>
            </div>
        </div>
    </div>
    <div class="mt-4" x-show="type != 'immediate'">
        تسویه‌های زمان‌بندی شده، رأس ساعت ۰۵:۳۰ صورت می‌گیرد، بنابراین نهایتا تا فردای کاری هر درخواست، مبلغ به حساب ثبت شده واریز می‌گردد.
    </div>
    <div class="mt-4">
        <button class="mt-2 xs:mt-0 bg-green-600 rounded-full h-9 px-8 text-white text-sm hover:bg-green-700 transition focus-current ring-green-600" x-text="type == 'immediate' ? 'تسویه آنی' : 'ثبت زمان‌بندی'">
        </button>
    </div>
</form>