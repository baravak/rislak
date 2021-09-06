@extends('dashboard.create')
@section('form-tag')
    <ul data-tabs>
        <li><a href="#contribution" data-tabby-default class="direct focus flex" title="{{ __('contribution') }}">{{ __('contribution') }}</a></li>
        <li><a href="#financial-balance" class="direct focus flex" title="{{ __('Financial-balance') }}">{{ __('Financial-balance') }}</a></li>
    </ul>

    <div id="contribution">
        @include('dashboard.centers.accounting.contribution.index')
    </div>
    <div id="financial-balance">
        @include('dashboard.centers.accounting.financialBalance')
    </div>
@endsection
