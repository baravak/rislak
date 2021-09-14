@extends($layouts->dashboard)
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4">
        @include('dashboard.centers.accounting.checkout.addBankAccounts')
        @include('dashboard.centers.accounting.checkout.checkout')
    </div>
@endsection