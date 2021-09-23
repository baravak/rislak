@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mb-4">
            <h2 class="heading" data-total="(25)" data-xhr="total">@lang('Rooms billings')</h2>
        </div>
        @include('dashboard.rooms.billings.filters')
        @include('dashboard.rooms.billings.list')
    </div>
@endsection