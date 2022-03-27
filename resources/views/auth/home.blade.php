@section('auth-form')
@if (auth()->check())
@include('auth.home-user')
@else
@include('auth.home-guest')
@endif

@endsection
@include('helps.auth.login')
@section('auth-nav')
    <div class="flex justify-center mt-8">
        @if (auth()->check())
            <a href="{{ route('dashboard.home') }}" class="variable-font-bold text-sm direct hover:text-blue-600" title="{{ __('Dashboard') }}" aria-label="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a>
            <span class="px-4 text-gray-500 cursor-default">|</span>
            <a href="{{ route('logout') }}" data-lijax="click" data-method="POST" class="text-sm hover:text-red-600 transition" title="{{__('Logout')}}" aria-label="{{ __('Logout') }}">{{__('Logout')}}</a>
        @else
            @if (config('auth.registration', true))
                <a href="{{ route('register', ['callback' => request()->callback]) }}" class="text-sm variable-font-bold text-gray-700 hover:text-blue-600 transition" title="{{ __('Register') }}" aria-label="{{ __('Register') }}">{{ __('Register') }}</a>
            @endif
            <span class="px-4 text-gray-500 cursor-default">|</span>
            <a href="{{ route('auth.recovery') }}" class="text-sm text-gray-700 hover:text-blue-600 transition" title="{{ __('Forgot Password') }}" aria-label="{{ __('Forgot Password') }}">{{ __('Forgot Password') }}</a>
        @endif
    </div>

    @if (request()->callback)
    <div class="border-r-2 border-yellow-400 bg-yellow-100 text-gray-800 py-3 px-2 mt-4 text-xs cursor-default">
        <span>{{ __("To continue the process you need to login or register") }}</span>
    </div>
@endif
@endsection

@section('scripts')
@parent
@error('authorized_key')
<script>
    iziToast.error({message: '{{ $message }}'});
</script>
@enderror
@endsection
@extends($ajax ? 'auth.xhr' : 'auth.app')
