@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mt-8 mb-4">
            <h3 class="heading" data-total="(21)" data-xhr="total">{{ __('Settlements') }}</h3>
        </div>

        @include('dashboard.settlements.list')
    </div>
    <script>
        function bindSettlementStatus() {
            if (window.settlementStatusBound) return;
            window.settlementStatusBound = true;
            var settlementFinal = {
                settled: {
                    confirm: 'وضعیت این تسویه‌حساب به «تسویه شده» تغییر می‌کند و دیگر قابل تغییر نخواهد بود. ادامه می‌دهید؟',
                    badge: 'text-green-600 bg-green-50',
                    row: '',
                },
                returned: {
                    confirm: 'مبلغ این تسویه‌حساب به حساب درخواست‌کننده برگشت داده می‌شود و وضعیت آن دیگر قابل تغییر نخواهد بود. ادامه می‌دهید؟',
                    badge: 'text-red-600 bg-red-50',
                    row: 'bg-gray-100 hover:bg-gray-100',
                },
            };
            $(document).on('change', '.settlement-status', function () {
                var select = $(this);
                var final = settlementFinal[select.val()];
                if (final && !confirm(final.confirm)) {
                    select.val(select.attr('data-current'));
                    return;
                }
                select.trigger('settlement:confirmed');
            });
            $(document).on('statio:jsonResponse', '.settlement-status', function (event, data, jqXHR) {
                var select = $(this);
                if (!data || !data.is_ok) {
                    select.val(select.attr('data-current'));
                    return;
                }
                select.attr('data-current', select.val());
                var final = settlementFinal[select.val()];
                if (!final) return;
                select.closest('tr')
                    .removeClass('bg-red-100 hover:bg-red-100 bg-yellow-100 hover:bg-yellow-100')
                    .addClass(final.row);
                select.parent().replaceWith(
                    $('<span class="flex items-center text-xs px-2 h-5 rounded cursor-default"></span>')
                        .addClass(final.badge)
                        .text(select.find('option:selected').text().trim())
                );
            });
        }
        window.jQuery ? bindSettlementStatus() : document.addEventListener('DOMContentLoaded', bindSettlementStatus);
    </script>
@endsection
