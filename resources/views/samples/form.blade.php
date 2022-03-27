
@include('layouts._head-styles')
@include('layouts.head')

@section('scripts')
    @parent
    <script src="@staticVersion('/js/sampleEngine.min.js')"></script>
    <style>
       .table-hover tbody tr:hover {
            background: rgba(138,138,138,.05) !important;
        }
    </style>
@endsection

@include('layouts.public-scripts')
@section('body')
    <body class="flex flex-col" data-page="{{isset($global->page) ? $global->page : ''}}">
        @php
            $purchased = $sample->chain ? $sample->chain->list->where('purchased', true)->count() : $sample->purchased;
            $amount = $sample->chain ? $sample->chain->list->where('purchased', false)->sum('amount') : $sample->amount;
        @endphp
        @if ($amount && !$purchased && !request()->has('skipPayment') && $sample->room->acceptation != 'manager' && !in_array($sample->room->center->acceptation, ['manager', 'operator']) && !auth()->isAdmin())
            @include('samples.payment')
        @else
            @include('samples.formBody')
            <script>
                window.sample_id = "{{ $sample->id }}";
            </script>
        @endif
        @yield('scripts')
    </body>
@endsection

@extends('layouts.app')
