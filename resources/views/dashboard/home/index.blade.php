@extends($layouts->dashboard)
@section('content')
    @if (auth()->isAdmin())
        @include('dashboard.home.admin')
    @else
        @include('dashboard.home.users')
@endif
@endsection
