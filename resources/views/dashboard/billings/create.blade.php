@extends($layouts->dashboard)
@section('content')
<form action="{{ route('dashboard.billings.store', $model->id) }}" method="post" class="m-auto w-full md:w-1/2">
    <div class="border border-gray-200 rounded p-4 mt-8">
        <div>
            <label for="title" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Title')</label>
            <input type="text" name="title" id="title" autocomplete="off" class="border border-gray-500 text-sm text-gray-600 h-10 w-full rounded px-2 focus:border-brand focus">
        </div>
        <div class="mt-4">
            <label for="user_id" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('طرف صورت‌حساب')</label>
            <select id="user_id" name="user_id" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <label for="type" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('موقعیت نسبت به فاکتور')</label>
            <select id="type" name="type" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus">
                <option value="debtor">@lang('Debtor')</option>
                <option value="creditor">@lang('Creditor')</option>
            </select>
        </div>
        <div class="mt-4">
            <label for="treasury" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('خزانه صورت‌حساب')</label>
            <select id="treasury" name="treasury" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus">
                @foreach ($treasuries as $treasury)
                    <option value="{{ $treasury->id }}">{{ $treasury->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <label for="amount" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Amount')</label>
            <div class="w-full relative">
                <input type="number" name="amount" id="amount" autocomplete="off" class="border border-gray-400 h-10 rounded pr-4 pl-20 w-full text-sm dir-ltr focus">
                <span class="absolute left-1 top-1 text-sm flex items-center justify-center bg-gray-200 px-4 h-8 rounded cursor-default">@lang('Toman')</span>
            </div>
        </div>
    </div>
    <div class="mt-6">
    <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus">
    ثبت فاکتور
    </button>
</form>
@endsection
