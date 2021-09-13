@extends($layouts->dashboard)
@section('content')
    @include('dashboard.centers.accounting.financialBalance.reportAndSettlement.header')
    @include('dashboard.centers.accounting.financialBalance.reportAndSettlement.transactions')
    @include('dashboard.centers.accounting.financialBalance.reportAndSettlement.paymentMethod')
@endsection