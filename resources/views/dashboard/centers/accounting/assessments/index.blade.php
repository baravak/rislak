@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mt-8 mb-4">
            <h3 class="heading" data-total="(35)" data-xhr="total">@lang('Assessments')</h3>
        </div>

        <div class="mb-4">
            @include('layouts.quick_search')
        </div>

        @include('dashboard.centers.accounting.assessments.list')
    </div>
@endsection