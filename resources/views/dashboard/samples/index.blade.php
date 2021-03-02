@extends($layouts->dashboard)

@section('content')

    <div>
        <div class="mt-8 mb-4">
            <h3 class="heading" data-total="({{ $samples->total() }})" data-xhr="total">{{ __('Samples') }}</h3>
        </div>

        <div class="flex justify-between items-center flex-wrap mb-4">
            @include('layouts.quick_search')
            <a href="{{ route('dashboard.samples.create') }}" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __('Create sampel') }}">
                <i class="fal fa-plus sm:ml-2"></i>
                <span class="hidden sm:inline">{{ __('Create sampel') }}</span>
            </a>
        </div>

        @include($samples->count() ? 'dashboard.samples.list' : 'dashboard.samples.emptyList')

        {{$samples->links()}}
    </div>
@endsection
