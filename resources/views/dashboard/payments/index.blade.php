@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="m-auto w-full md:w-1/2">
            <form method="POST" action="{{ route('dashboard.payments.sotre') }}">
                <div class="border border-gray-300 rounded p-4">
                    <h2 class="text-center variable-font-bold text-green-700 mb-4 cursor-default">{{ __('Increase credit') }}</h2>
                    <div class="flex items-center justify-center w-full p-4 bg-gray-100 transition cursor-default rounded">
                        <div class="flex flex-col items-center justify-center text-xs">
                            <span class="flex variable-font-semibold text-gray-700">کیف پول مرکز RS96666W6</span>
                            <span class="flex text-gray-600 mt-0.5">مرکز مشاوره طلیعه سلامت</span>
                            <div class="flex items-center mt-0.5">
                                <span class="text-gray-500 ml-1">تراز مالی:</span>
                                <span class="text-green-600 variable-font-medium">12.500 تومان</span>
                                {{-- <span class="text-red-500 variable-font-medium">(12.500) تومان</span> --}}
                                {{-- <span class="text-gray-500 variable-font-medium">0</span> --}}
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="treasury_id" class="block mb-2 text-sm text-gray-700 variable-font-medium">{{ __('Select treasury') }}</label>
                        <div class="relative dropdown w-full">
                            <button type="button" class="flex items-center w-full border border-gray-400 rounded py-2 px-3 hover:bg-gray-50 transition dropdown-toggle focus">
                                <div class="flex items-center justify-between w-full">
                                    {{-- <div class="text-sm text-gray-400">@lang('انتخاب کنید')</div> --}}
                                    <div class="flex flex-col text-xs">
                                        <span class="flex variable-font-semibold text-gray-700">کیف پول مرکز RS96666W6</span>
                                        <span class="flex text-gray-600 mt-0.5">مرکز مشاوره طلیعه سلامت</span>
                                        <div class="flex items-center mt-0.5">
                                            <span class="text-gray-500 ml-1">تراز مالی:</span>
                                            <span class="text-green-600 variable-font-medium">12.500 تومان</span>
                                            {{-- <span class="text-red-500 variable-font-medium">(12.500) تومان</span> --}}
                                            {{-- <span class="text-gray-500 variable-font-medium">0</span> --}}
                                        </div>
                                    </div>
                                    <i class="far fa-chevron-down text-sm text-gray-400"></i>
                                </div>
                            </button>
                            <div class="rounded bg-white border border-gray-200 mt-1 shadow-md dropdown-menu absolute left-0">
                                <a class="flex items-center justify-between w-full py-2 px-3 hover:bg-gray-100 border-b border-gray-200 transition cursor-pointer">
                                    <div class="flex flex-col text-xs">
                                        <span class="flex variable-font-semibold text-gray-700">کیف پول مرکز RS96666W6</span>
                                        <span class="flex text-gray-600 mt-0.5">مرکز مشاوره طلیعه سلامت</span>
                                        <div class="flex items-center mt-0.5">
                                            <span class="text-gray-500 ml-1">تراز مالی:</span>
                                            <span class="text-green-600 variable-font-medium">12.500 تومان</span>
                                            {{-- <span class="text-red-500 variable-font-medium">(12.500) تومان</span> --}}
                                            {{-- <span class="text-gray-500 variable-font-medium">0</span> --}}
                                        </div>
                                    </div>
                                </a>
                                <a class="flex items-center justify-between w-full p-3 hover:bg-gray-100 border-b border-gray-300 transition cursor-pointer">
                                    <div class="flex flex-col text-xs">
                                        <span class="flex variable-font-semibold text-gray-700">کیف پول خودمه با اسم دلخواه</span>
                                        <div class="flex items-center mt-0.5">
                                            <span class="text-gray-500 ml-1">تراز مالی:</span>
                                            {{-- <span class="text-green-600 variable-font-medium">12.500 تومان</span> --}}
                                            <span class="text-red-500 variable-font-medium">(12.500) تومان</span>
                                            {{-- <span class="text-gray-500 variable-font-medium">0</span> --}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- <select class="border border-gray-500 h-10 rounded w-full text-sm focus" id="treasury_id" name="treasury_id">
                            @foreach (auth()->user()->treasuries->where('symbol', '<>', 'gift')->where('creditable', true) as $treasury)
                                <option value="{{ $treasury->id }}">{{ $treasury->title }}</option>
                            @endforeach
                        </select> --}}
                    </div>
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
