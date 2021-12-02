@extends($layouts->dashboard)
@section('content')
<form class="m-auto w-full md:w-1/2" action="{{ route('dashboard.gifts.appendUser', [$center->id, $gift->id]) }}" method="POST">
    <div class="border border-gray-300 rounded p-4 mt-8">
        <div>
            <label for="exclusive_users" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('کاربران مجاز') }}</label>
            <select class="select2-select" multiple data-template="users" name="user_id[]" data-title="user.name id" data-id="id" id="user_id" data-url="{{ route('dashboard.center.users.index', ['center' => $center->id]) }}" data-avatar="user.avatar.tiny.url user.avatar.small.url"></select>
            <div class="flex text-xs text-gray-400 mt-2">
                <i class="fal fa-info-circle ml-1"></i>
                <span>شما می‌توانید با جستجو از طریق شماره موبایل و یا نام، یک یا چند مراجع را به این کارت تخفیف اضافه کنید، تا در پنل خود و از طریق اطلاع‌رسانی‌ها از این کارت تخفیف با خبر شوند.</span>
            </div>
        </div>
    </div>
    <div class="mt-6">
        <button type="submit" title="@lang('افزودن کاربر')" aria-label="@lang('افزودن کاربر')" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus" role="button">
            @lang('افزودن کاربر')
        </button>
        <a href="{{ route('dashboard.gifts.show', [$gift->region->id, $gift->id]) }}" class="text-sm text-gray-500 hover:text-gray-700 transition" title="انصراف" aria-label="انصراف">انصراف</a>
    </div>
</form>
@endsection
