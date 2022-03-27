@section('form')
    <h2 class="text-center variable-font-bold text-gray-800 mb-4 cursor-default">نمونه‌های گروهی</h2>
@if (auth()->check())
    <div class="mb-4">
        <div class="flex text-xs text-gray-400 mt-2 cursor-default leading-relaxed">
            <i class="fal fa-info-circle ml-1 mt-0.5"></i>
            <span>شما به مجموعه‌ای از نمونه‌های گروهی دعوت شدید با کلیک روی لینک وارد نمونه‌ها شوید</span>
        </div>
    </div>
    <form action="{{ route('auth') }}" method="POST" data-form-page="auth" class="active" id="form">
        <input type="hidden" name="authorized_key" value="{{ $authPreview['bulk']->link }}">
        <button href="" class="direct flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="انجام نمونه‌ها" aria-label="انجام نمونه‌ها" role="button">انجام نمونه‌ها</button>
    </form>
    <script>
        window.onload = function(){
            $('#form').trigger('submit');
        }
    </script>
@else
    <div class="mb-4">
        <div class="flex text-xs text-gray-600 mt-2 cursor-default leading-relaxed">
            <i class="fal fa-info-circle ml-1 mt-0.5"></i>
            <span>شما به انجام چند نمونه دعوت شده‌اید، برای انجام آن‌ها ابتدا نیاز است که وارد ریسلو شوید</span>
        </div>
    </div>
    <a href="{{ route('auth', ['previousUrl' => route('auth', ['authorized_key' => $authPreview['bulk']->link])]) }}" class="direct flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="ورود و انجام نمونه‌ها" aria-label="ورود و انجام نمونه‌ها" role="button">ورود و انجام نمونه‌ها</a>
@endif
@endsection
@extends('auth.theory')
