@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mt-8 mb-4">
            <h3 class="heading" data-total="(21)" data-xhr="total">{{ __('Settlements') }}</h3>
        </div>

        @include('dashboard.settlements.list')
    </div>
@endsection