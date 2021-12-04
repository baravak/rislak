@extends($layouts->dashboard)

@section('content')
    <div>
        <div class="mt-8 mb-4">
            <h3 class="heading" data-total="({{$gifts ? $gifts->total() : 0 }})" data-xhr="total">@lang('Gifts')</h3>
        </div>

        @include('dashboard.gifts.quick_search')
        @include('dashboard.gifts.listFilterBadges')
        @include('dashboard.gifts.list')
    </div>
@endsection
