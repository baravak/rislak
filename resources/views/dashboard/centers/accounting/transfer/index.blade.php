@extends('dashboard.create')
@section('form_content')
    <div>
        <div>
            <label for="title" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Title')</label>
            <input type="text" name="title" id="title" autocomplete="off" class="border border-gray-400 text-sm text-gray-600 h-10 w-full rounded px-2 focus">
        </div>
        <div class="mt-4">
            <label for="amount" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Amount')</label>
            <div class="w-full relative">
                <input type="number" name="amount" id="amount" autocomplete="off" class="border border-gray-400 h-10 rounded pr-4 pl-20 w-full text-sm dir-ltr focus">
                <span class="absolute left-1 top-1 text-sm flex items-center justify-center bg-gray-200 px-4 h-8 rounded cursor-default">@lang('Toman')</span>
            </div>
        </div>
        <div class="mt-4">
            <label for="from" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('From')</label>
            <select id="from" name="from" class="border border-gray-400 text-gray-600 h-10 rounded pl-4 pr-8 w-full text-sm focus">
                <option value="">کیف پول شخصی</option>
            </select>
        </div>
        <div class="mt-4">
            <label for="to" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('To')</label>
            <select class="select2-select" name="to"  id="to" data-url="">
                <option value=""></option>
            </select>
        </div>
        <div class="mt-4">
            <label for="to" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('To')</label>
            <input type="text" name="to" id="to" placeholder="@lang('شناسه مرکز یا شماره موبایل کاربر مورد نظر را وارد نمایید')" autocomplete="off" class="border border-gray-400 text-gray-600 placeholder-gray-400 h-10 rounded px-4 w-full text-sm text-left dir-ltr placeholder-right focus">
            <div class="flex items-center text-xs text-green-600 mt-2 cursor-default">
                <i class="fal fa-user ml-2"></i>
                <span>محمدعلی نخلی</span>
            </div>
            <div class="flex items-center text-xs text-green-600 mt-2 cursor-default">
                <i class="fal fa-building ml-2"></i>
                <span>مرکز مشاوره طلیعه سلامت</span>
            </div>
            <div class="flex items-center text-xs text-red-500 mt-2 cursor-default">
                <i class="fal fa-info-circle ml-2"></i>
                <span>شناسه کاربر یا شماره موبایل وارد شده اشتباه است.</span>
            </div>
        </div>
        <div class="mt-4">
            <label for="description" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Description')</label>
            <textarea id="description" name="description" placeholder="@lang('Optional')" autocomplete="off" class="resize-x-none border border-gray-400 h-20 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus"></textarea>
        </div>
    </div>
@endsection