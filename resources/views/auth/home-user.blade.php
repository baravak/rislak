<h2 class="text-center variable-font-bold text-gray-800 mb-4 cursor-default">@lang('درخواست‌های ورودی')</h2>
<div class="mb-4">
    <input autofocus type="text" class="w-full text-sm text-left dir-ltr placeholder-right placeholder-gray-400 border border-gray-300 rounded focus" id="authorized_key" name="authorized_key" value="{{ app('request')->authorized_key }}" placeholder="{{ auth()->check() ? __('Entry Command') : __('Mobile') }}">
    <div class="flex text-xs text-gray-400 mt-2 cursor-default leading-relaxed">
        <i class="fal fa-info-circle ml-1 mt-0.5"></i>
        <span>شما با شماره موبایل {{ auth()->user()->mobile }} در ریسلو هستید؛ می‌توانید خارج شوید، یا کد ورودی خود را وارد کنید و مسیریابی شوید</span>
    </div>
</div>
<button title="برو" aria-label="برو" role="button" class="flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition focus">برو</button>
