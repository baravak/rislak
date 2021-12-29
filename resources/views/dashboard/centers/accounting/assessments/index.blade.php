@extends($layouts->dashboard)
@section('content')
    <div x-data='{assessments: {!! addcslashes(json_encode($assessments), "'") !!}}'>
        <div class="mt-8 mb-4">
            <h3 class="heading" :data-total="`(${assessments.total})`" data-xhr="total">@lang('Assessments')</h3>
        </div>

        <div class="mb-4" x-ref="quickSearch" x-on:jresp="event.detail && event.detail.assessments ? assessments = event.detail.assessments : null">
            @include('layouts.quick_search-alpine')
        </div>

        @include('dashboard.centers.accounting.assessments.list')
    </div>
@endsection
