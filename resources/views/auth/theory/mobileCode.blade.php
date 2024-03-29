@section('auth-form')
    <h2 class="text-center variable-font-bold text-gray-800 mb-4 cursor-default">@lang('Verify Mobile')</h2>
    <div class="mb-2">
        <input type="authorized_key"  disabled value="0{{ substr($theory->response('authorized_key'), 2)  }}" class="w-full text-sm text-left dir-ltr text-gray-400 border border-gray-300 rounded h-10 px-3" id="authorized_key" name="authorized_key">
    </div>
    <div class="mb-4">
        <div class="w-full relative">
            <input autofocus type="text" class="w-full h-10 text-sm placeholder-gray-400 border border-gray-300 rounded" id="code" name="code" placeholder="{{ __('SMS code')}}" autocomplete="off">
            {{-- @if (config('app.env') == 'local')
                <span class="flex items-center justify-center text-sm absolute left-2 top-2 bg-blue-100 text-brand h-6 w-14 rounded cursor-default">01:34</span>
                <a href="" class="flex items-center justify-center text-sm absolute left-2 top-2 bg-blue-100 text-brand hover:text-white hover:bg-brand transition px-4 h-6 rounded">ارسال مجدد کد</a>
            @endif --}}
        </div>
        <div class="flex text-xs text-gray-400 mt-2 cursor-default leading-relaxed">
            <i class="fal fa-info-circle ml-1 mt-0.5"></i>
            <span>@lang('Mobile verify help :mobile', ['mobile' => $theory->response('authorized_key')])</span>
        </div>
    </div>

    <button class="flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="{{ __('Verify Mobile') }}" aria-label="{{ __('Verify Mobile') }}" role="button">{{ __('Verify Mobile') }}</button>
@endsection
@section('auth-nav')
    <div class="flex justify-center">
        <a href="{{ route('auth') }}" class="text-sm text-gray-700 hover:text-blue-600 transition" title="{{ __('Login') }}" aria-label="{{ __('Login') }}">{{ __('Login') }}</a>
        <span class="px-4 text-gray-500">|</span>
        <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-blue-600 transition" title="{{ __('Register') }}" aria-label="{{ __('Register') }}">{{ __('Register') }}</a>
    </div>
@endsection
@include('helps.auth.mobileCode')
@extends('auth.theory')
