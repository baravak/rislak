@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mt-8 mb-4">
            <h2 class="heading" data-total="({{ $rooms ? $rooms->count() : 0 }})" data-xhr="total">{{ __('ترتیب اتاق‌های درمان') }}</h2>
        </div>
        {{-- @include('dashboard.centers.rooms.list') --}}
        @include('dashboard.centers.rooms.sortList')
    </div>
@endsection
