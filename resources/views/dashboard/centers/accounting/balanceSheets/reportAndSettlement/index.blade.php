@extends($layouts->dashboard)
@section('content')
<div x-data='{"pay_balance": 0,"room_amount" : 0, "total_amount" : {{ $room->balance }}, "avg_percentage" : {{ 100 - $room->commission }}, "avg" : [], "billings_count" : 0}'  @sheetchange.window="billings_count = room_amount = total_amount = avg_percentage = 0; avg=[]; [...$el.querySelectorAll('[data-amount]:not(:disabled)')].forEach((el)=>{room_amount += parseInt(el.value); total_amount += parseInt(el.getAttribute('data-amount')); avg.push(Math.round((el.value * 100)/ parseInt(el.getAttribute('data-amount')))) }); avg_percentage = (avg.reduce((sum, a) => sum + a,0) / avg.length || 0) + '%'; billings_count = avg.length" @settledchange.window="console.log(80)">
    @include('dashboard.centers.accounting.balanceSheets.reportAndSettlement.header')
    @include('dashboard.centers.accounting.balanceSheets.reportAndSettlement.transactions')
    @include('dashboard.centers.accounting.balanceSheets.reportAndSettlement.paymentMethod')
</div>
@endsection
