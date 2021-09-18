@extends($layouts->dashboard)
@section('content')
    <div class="w-full xs:w-2/3 xl:w-1/2 2xl:w-2/5 mx-auto grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-4 gap-4 mt-8">
        <a href="{{ route('dashboard.treasuries.index') }}" class="border border-gray-300 hover:border-brand text-brand rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-blue-100 transition group focus-current ring-brand">
            <i class="fal fa-wallet text-2xl"></i>
            <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Financial treasuries')</span>
        </a>
        <a href="{{ route('dashboard.billings.index') }}" class="border border-gray-300 hover:border-yellow-500 text-yellow-500 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-yellow-50 transition group focus-current ring-yellow-500">
            <i class="fal fa-file-invoice text-2xl"></i>
            <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Billings')</span>
        </a>
        <a href="{{ route('dashboard.me.accounting.bank') }}" class="border border-gray-300 hover:border-green-600 text-green-600 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-green-50 transition group focus-current ring-green-600">
            <i class="fal fa-cash-register text-2xl"></i>
            <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Checkout')</span>
        </a>
        <a href="{{ route('dashboard.payments.index') }}" class="border border-gray-300 hover:border-gray-600 text-gray-500 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-gray-100 transition group focus-current ring-gray-500">
            <i class="fal fa-plus-circle text-2xl"></i>
            <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Credit charge')</span>
        </a>
    </div>
@endsection
