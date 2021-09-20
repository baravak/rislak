@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mt-8 mb-4">
            <h3 class="heading" data-total="(213)" data-xhr="total">@lang('Bank accounts')</h3>
        </div>

        <div class="flex items-center mb-4">
            @include('layouts.quick_search')
            {{-- <a href="#" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition focus-current ring-green-700 mr-4" title="{{ __('Create new bank account') }}" aria-label="title={{ __('Create new bank account') }}">
                <i class="fal fa-plus sm:ml-2"></i>
                <span class="hidden sm:inline">{{ __('Create new bank account') }}</span>
            </a> --}}
        </div>
        @include('dashboard.users.accounting.bankAccounts.list')
    </div>
@endsection