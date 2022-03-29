@extends($layouts->dashboard)
@section('content')
    <div class="w-full xs:w-2/3 sm:w-4/5 lg:w-3/5 2xl:w-2/5 mx-auto grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-4 gap-4 mt-8">
        <a href="{{ route('dashboard.treasuries.index') }}" class="border border-gray-300 hover:border-brand text-brand rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-blue-50 transition group focus-current ring-brand">
            <i class="fal fa-wallet text-2xl"></i>
            <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Financial treasuries')</span>
        </a>
        <a href="{{ route('dashboard.billings.index') }}" class="border border-gray-300 hover:border-yellow-500 text-yellow-500 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-yellow-50 transition group focus-current ring-yellow-500">
            <i class="fal fa-file-invoice text-2xl"></i>
            <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Billings')</span>
        </a>
        <a href="{{ route('dashboard.center.bank.show', $center->id) }}" class="border border-gray-300 hover:border-purple-600 text-purple-600 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-purple-50 transition group focus-current ring-purple-600">
            <i class="fal fa-cash-register text-2xl"></i>
            <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Checkout')</span>
        </a>
        <a href="{{ route('dashboard.payments.index') }}" class="border border-gray-300 hover:border-green-600 text-green-600 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-green-50 transition group focus-current ring-green-500">
            <i class="fal fa-plus text-2xl"></i>
            <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Credit charge')</span>
        </a>
        @if ($center->type != 'personal_clinic')
            <a href="{{ route('dashboard.center.commissions.index', $center->id) }}" class="border border-gray-300 hover:border-red-400 text-red-400 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-red-50 transition group focus-current ring-red-400">
                <i class="fal fa-abacus text-2xl"></i>
                <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Commission')</span>
            </a>
            <a href="{{ route('dashboard.center.balanceSheets.index', $center->id) }}" class="border border-gray-300 hover:border-gray-500 text-gray-500 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-gray-50 transition group focus-current ring-gray-500">
                <i class="fal fa-balance-scale text-2xl"></i>
                <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Financial-balance')</span>
            </a>
        @endif
        <a href="{{ route('dashboard.gifts.index', $center) }}" class="border border-gray-300 hover:border-pink-500 text-pink-500 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-pink-50 transition group focus-current ring-pink-500">
            <i class="fal fa-badge-percent text-2xl"></i>
            <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Gift')</span>
        </a>
        <a href="{{ route('dashboard.center.assessments.index', $center->id) }}" class="border border-gray-300 hover:border-blue-500 text-blue-500 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-blue-50 transition group focus-current ring-blue-500">
            <i class="fal fa-clipboard-list-check text-2xl"></i>
            <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Assessments')</span>
        </a>
    </div>
@endsection
