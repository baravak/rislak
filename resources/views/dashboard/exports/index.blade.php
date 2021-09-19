@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h2 class="heading" data-total="({{ $exports && $exports->count() ? $exports->total() : 0 }})" data-xhr="total">{{ __('Exports') }}</h2>
        </div>
        @include('dashboard.exports.list')
    </div>
@endsection
