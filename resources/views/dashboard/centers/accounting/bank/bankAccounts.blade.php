<div class="grid grid-cols-1 gap-2 mt-2" data-xhr="accounts">
    @if ($bank->items)
        @foreach ($bank->items as $item)
            @include('dashboard.centers.accounting.bank.bankAccountsItems')
        @endforeach
    @endif
</div>
