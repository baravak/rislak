@include('layouts.head-styles')
@include('layouts.head')

@section('main')
    <div class="flex-1 bg-gray-50">
        <div class="flex justify-center">
            <div class="rounded w-full sm:w-80 mx-4 sm:mx-auto relative top-20">
                @if (config('app.env') == 'local')
                    <a href="https://risloo.ir/" class="direct w-full inline-flex items-center bg-red-600 rounded py-2 px-4 mb-6 hover:shadow-md transition">
                        <i class="fad fa-tools text-2xl text-white ml-4"></i>
                        <div class="border-r border-white border-opacity-20 pr-4">
                            <span class="hidden xs:block text-sm text-white">شما هم‌اکنون در نسخه آزمایشی هستید</span>
                            <span class="block xs:hidden text-sm text-white">نسخه آزمایشی</span>
                            <span class="block text-xs variable-font-light text-opacity-70 text-white text-right">جهت انتقال به نسخه اصلی کلیک کنید</span>
                        </div>
                    </a>
                @endif
                @if (auth()->check() && auth()->user())
                    <div class="mb-4">
                        <a href="{{ route(auth()->check() ? 'dashboard.home' : 'auth') }}" class="flex justify-center items-center mx-auto w-16 h-16 rounded overflow-hidden border border-gray-200 direct flex-shrink-0 bg-gray-300 text-gray-600 text-sm">
                            @avatarOrName(auth()->user())
                        </a>
                    </div>
                @else
                    <h1 class="text-center variable-font-black text-xl text-brand mb-4">
                        <a href="/" class="direct" title="{{ __('App Title') }}" aria-label="{{ __('App Title') }}">{{ __('App Title') }}</a>
                    </h1>
                @endif

                <h1 class="text-lg text-center variable-font-bold text-gray-900 mb-4 hidden">
                    <a href="{{ route(auth()->check() ? 'dashboard.home' : 'auth') }}" title="@if (auth()->check()){{ auth()->user()->name ?: __('Anonymouse') }}@else{{__('App Title')}}@endif" aria-label="@if (auth()->check()){{ auth()->user()->name ?: __('Anonymouse') }}@else{{__('App Title')}}@endif">
                        @if (auth()->check())
                            {{ auth()->user()->name ?: __('Anonymouse') }}
                        @else
                            {{__('App Title')}}
                        @endif
                    </a>
                </h1>

                <div data-xhr="form">
                    @hasSection ('form')
                        @yield('form')
                    @else
                        <form action="{{ route($route, $theoryRouteParms) }}" method="POST" data-form-page="auth" class="active">
                            @csrf
                            @yield('auth-form')
                        </form>
                    @endif
                    @yield('auth-nav')
                </div>
            </div>
        </div>
    </div>
    @include('helps.main')
@endsection

@section('scripts')
    @parent
    {{-- @isset ($authResult)
        <script>

            $('body').ready( function(){
                iziToast['{{ $authResult->is_ok ? 'success' : 'error' }}']({'message' : '{{ $authResult->message_text }}'});
                // $('[data-form-page]').trigger('submit');
            });
        </script>
    @endif --}}
@endsection
@include('layouts.scripts')
@include('layouts.body')
@extends('layouts.app')
