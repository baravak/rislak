@extends($layouts->dashboard)
@section('content')
<form class="m-auto w-full md:w-1/2" action="{{ route('dashboard.gifts.store', $center->id) }}" method="POST">
    <div class="border border-gray-300 rounded p-4 mt-8">
        <div>
            <label for="exclusive_users" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('کاربران مجاز') }}</label>
            <select name="exclusive_users" id="exclusive_users" data-placeholder="{{ __('کاربری انتخاب نشده است') }}" class="select2-select"></select>
            <div class="flex text-xs text-gray-400 mt-2">
                <i class="fal fa-info-circle ml-1"></i>
                <span>شما می‌توانید با جستجو از طریق شماره موبایل و یا نام، کاربرانی که فقط آن‌ها مجاز به استفاده از این کد می‌باشند را انتخاب کنید. در صورتی که می‌خواهید همه از این کد استفاده کنند، این بخش را خالی بگذارید.</span>
            </div>
        </div>
    </div>
    <div class="mt-6">
        <button type="submit" title="@lang('افزودن کاربر')" aria-label="@lang('افزودن کاربر')" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus" role="button">
            @lang('افزودن کاربر')
        </button>
        <a href="#" class="text-sm text-gray-500 hover:text-gray-700 transition" title="انصراف" aria-label="انصراف">انصراف</a>
    </div>
</form>
@endsection
