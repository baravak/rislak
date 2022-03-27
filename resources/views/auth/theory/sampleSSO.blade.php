@section('form')
    <h2 class="text-center variable-font-bold text-gray-800 mb-4 cursor-default">نمونه‌های گروهی</h2>
@if (auth()->check() && $authPreview['current_user'])
    <form action="{{ route('auth') }}" method="POST" data-form-page="auth" class="active" id="form">
        <input type="hidden" name="authorized_key" value="{{ $authPreview['key'] }}">
        <button href="" class="direct flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="انجام نمونه‌ها" aria-label="انجام نمونه‌ها" role="button">انجام نمونه‌ها</button>
    </form>
    <script>
        window.onload = function(){
            $('#form').trigger('submit');
        }
    </script>
@elseif(auth()->check())
<div class="mb-4">
    <div class="flex text-xs text-gray-400 mt-2 cursor-default leading-relaxed">
        <i class="fal fa-info-circle ml-1 mt-0.5"></i>
        <span>نمونه‌هایی برای شما ایجاد شده است، شما در حساب کاربری‌ای غیر از حساب کاربری مخصوص به نمونه‌ها هستید، آیا می‌خواهید خارج شوید و وارد حساب کاربری نمونه شوید؟</span>
    </div>
</div>
<form action="{{ route('auth') }}" method="POST" data-form-page="auth" class="active" id="form">
    <input type="hidden" name="authorized_key" value="{{ $authPreview['key'] }}">
    <button href="" class="direct flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="انجام نمونه‌ها" aria-label="انجام نمونه‌ها" role="button">انجام نمونه‌ها</button>
</form>
@else
    <div class="mb-4">
        <div class="flex text-xs text-gray-600 mt-2 cursor-default leading-relaxed">
            <i class="fal fa-info-circle ml-1 mt-0.5"></i>
            <span>برای شما نمونه‌هایی ایجاد شد است، با کلیک بر روی لینک زیر وارد نمونه‌ها شوید و آن‌ها را کامل کنید</span>
        </div>
    </div>
    <form action="{{ route('auth') }}" method="POST" data-form-page="auth" class="active" id="form">
        <input type="hidden" name="authorized_key" value="{{ $authPreview['key'] }}">
        <button href="" class="direct flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="ورود و انجام نمونه‌ها" aria-label="ورود و انجام نمونه‌ها" role="button">ورود و انجام نمونه‌ها</button>
    </form>
@endif
@endsection
@extends('auth.theory')
