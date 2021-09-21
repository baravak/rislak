@section('form')
    @if ($theory->response('status') == 'success')
        <div class="flex flex-col items-center border border-gray-200 shadow-lg rounded-xl px-4 py-6">
            <div class="flex flex-col items-center cursor-default">
                <div class="flex items-center justify-center w-9 h-9 rounded-full bg-green-500">
                    <i class="fal fa-check text-white"></i>
                </div>
                <h3 class="variable-font-bold text-green-500 mt-4">@lang('Successful transaction')</h3>
                <div class="text-xs text-gray-600 mt-1">
                    <span>@lang('Tracking number'):</span>
                    <span>{{ $theory->response()->trace_number }}</span>
                </div>
            </div>
            <div class="border-t border-gray-300 border-dashed mt-4 pt-6 w-full cursor-default">
                <div class="flex justify-between items-center text-gray-500 text-xs">
                    <span>@lang('Transaction amount'):</span>
                    <span class="variable-font-semibold">{{ number_format($theory->response()->amount) }} @lang('Toman')</span>
                </div>
            </div>
            <a href="{{ Cache::get(request()->route('key'), ['url' => route('dashboard.payments.index')])['url'] }}" class="direct flex items-center text-white text-sm bg-green-500 hover:bg-green-600 transition rounded-full h-8 px-12 mt-8 focus-current ring-green-600 spinner" onclick="_self = this; location.replace = this.href.replace(/^(https|http)/i, '{{ config('app.env') == 'local' ? 'bisloo' : 'risloo' }}')+ '#Intent;scheme=risloo;package=com.majazeh.risloo;end'; setTimeout(function(){location.href = _self.href}, 500); return false">@lang('Continue the process')</a>
        </div>
    @else
        <div class="flex flex-col items-center border border-gray-200 shadow-lg rounded-xl px-4 py-6">
            <div class="flex flex-col items-center cursor-default">
                <div class="flex items-center justify-center w-9 h-9 rounded-full bg-red-500">
                    <i class="fal fa-times text-white"></i>
                </div>
                <h3 class="variable-font-bold text-red-500 mt-4">@lang('Unsuccessful transaction')</h3>
                <div class="text-xs text-gray-600 mt-1">
                    <span>@lang('Tracking number'):</span>
                    <span>{{ $theory->response()->trace_number }}</span>
                </div>
            </div>
            <div class="border-t border-gray-300 border-dashed mt-4 pt-6 w-full cursor-default">
                <div class="flex justify-between items-center text-gray-500 text-xs">
                    <span>@lang('Transaction amount'):</span>
                    <span class="variable-font-semibold">{{ number_format($theory->response()->amount) }} @lang('Toman')</span>
                </div>
                <div class="text-center text-gray-500 text-xs mt-4">
                    <span>چنانچه این مبلغ از حساب شما کسر شده و تا 72 ساعت آینده به حسابتان بازگردانده نشد؛ با ارائه شماره پیگیری، به مرکز مشاوره خود اطلاع دهید.  </span>
                </div>
            </div>
            <a href="{{ route('dashboard.payments.index') }}" class="direct flex items-center text-white text-sm bg-gray-500 hover:bg-gray-600 transition rounded-full h-8 px-12 mt-8 focus-current ring-gray-600 spinner" onclick="_self = this; location.replace = this.href.replace(/^(https|http)/i, '{{ config('app.env') == 'local' ? 'bisloo' : 'risloo' }}')+'#Intent;scheme=risloo;package=com.majazeh.risloo;end'; setTimeout(function(){location.href = _self.href}, 1000); return false">@lang('Return to dashboard')</a>
        </div>
    @endif
@endsection
@section('auth-nav')
@endsection
@extends('auth.theory')
