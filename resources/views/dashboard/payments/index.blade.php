@extends($layouts->dashboard)
@section('content')
@php
    $_myTreauseries = auth()->user()->treasuries->where('chargeable', true)->where('creditable', true);
@endphp
    <div>
        <div class="m-auto w-full md:w-1/2">
            <form method="POST" action="{{ route('dashboard.payments.sotre') }}">
                <div class="border border-gray-300 rounded p-4">
                    {{-- <h2 class="text-center variable-font-bold text-green-700 mb-4 cursor-default">{{ __('Increase credit') }}</h2> --}}
                    @if ($_myTreauseries->count() == 1)
                        @include('dashboard.payments.singleList')
                    @elseif($_myTreauseries->count() > 1)
                        @include('dashboard.payments.multiList')
                    @endif
                    <div class="mt-4">
                        <label for="amount" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Amount') }} <span class="text-xs text-gray-500 variable-font-normal">({{ __('Toman') }})</span></label>
                        <input type="number" name="amount" id="amount" autocomplete="off" data-numberformat="amout-view" class="border border-gray-400 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus">
                        <div class="flex items-center justify-end text-sm text-gray-600 mt-2">
                            <span class="ml-1" id="amout-view">1,000,000</span>
                            <span>@lang('Toman')</span>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus" role="button">
                        {{ __('Transfer to payment gateway') }}
                    </button>
                </div>
            </form>
        </div>

        <div>
            <div class="mt-8 mb-4">
                <h2 class="heading" data-total="({{ $payments && $payments->count() ? $payments->total() : 0 }})" data-xhr="total">{{ __('Payments log') }}</h2>
            </div>
            @include('dashboard.payments.paymentsList')
        </div>
    </div>
@endsection
