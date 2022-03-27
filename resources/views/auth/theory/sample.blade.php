@section('form')
    <h2 class="text-center variable-font-bold text-gray-800 mb-4 cursor-default">انجام نمونه</h2>
@if (auth()->check())
    <div class="mb-4">
        <div class="flex text-xs text-gray-400 mt-2 cursor-default leading-relaxed">
            <i class="fal fa-info-circle ml-1 mt-0.5"></i>
            <span>با کلیک روی دکمه زیر وارد نمونه <span class="inline-block text-left" style="direction:ltr">{{ $authPreview['sample']->id }}</span> شوید</span>
        </div>
    </div>
    <a href="{{ $authPreview['redirect'] }}" class="direct flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="انجام نمونه" aria-label="انجام نمونه" role="button">انجام نمونه</a>
    <script>
        location.href = '{{ $authPreview['redirect'] }}'
    </script>
@else
    <div class="mb-4">
        <div class="flex text-xs text-gray-600 mt-2 cursor-default leading-relaxed">
            <i class="fal fa-info-circle ml-1 mt-0.5"></i>
            <span>برای انجام این نمونه ابتدا باید وارد ریسلو شوید، روی لینک زیر کلیک کنید، شماره موبایل خود را وارد کنید و سپس وارد نمونه شوید</span>
        </div>
    </div>
    <a href="{{ route('auth', ['previousUrl' => $authPreview['redirect']]) }}" class="direct flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="ورود و انجام نمونه" aria-label="ورود و انجام نمونه" role="button">ورود و انجام نمونه</a>
@endif
@endsection
@extends('auth.theory')
