@extends($layouts->dashboard)
@section('content')

    <ul data-tabs>
        <li><a href="#commission" data-tabby-default class="direct focus flex" title="{{ __('commission') }}">{{ __('commission') }}</a></li>
        <li><a href="#financial-balance" class="direct focus flex" title="{{ __('Financial-balance') }}">{{ __('Financial-balance') }}</a></li>
    </ul>

    <div id="commission">
        @include('dashboard.centers.accounting.commission.index')
    </div>
    <div id="financial-balance">
        @include('dashboard.centers.accounting.financialBalance')
    </div>
@endsection
