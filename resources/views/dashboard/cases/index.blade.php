@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h3 class="heading" data-total="({{ $cases->total() }})" data-xhr="total">{{ __('Cases') }}</h3>
        </div>

        <div class="flex justify-between items-center flex-wrap mb-4">
            @include('layouts.quick_search')
            <a href="#" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __('Create case') }}">
                <i class="fal fa-plus sm:ml-2"></i>
                <span class="hidden sm:inline">{{ __('Create case') }}</span>
            </a>
        </div>

        @include($cases->count() ? 'dashboard.cases.list' : 'dashboard.emptyCases')

        {{ $cases->links() }}
    </div>
@endsection