<div class="mt-8">
    <div class="mb-4">
        <h2 class="heading" data-total="(5)" data-xhr="total">@lang('Transactions')</h2>
    </div>
    @include('dashboard.centers.accounting.financialBalance.reportAndSettlement.transactionsList')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 border border-t-0 border-dashed border-gray-300 p-4 rounded rounded-t-none cursor-default">
        <div class="flex justify-center xs:justify-start relative top-0.5">
            <span class="text-xs text-gray-500">@lang('Transactions count selected'):</span>
            <span class="text-sm text-gray-700 mr-4">1</span>
        </div>
        <div class="flex flex-col items-center xs:items-end">
            <div class="flex items-center">
                <span class="text-xs text-gray-500">@lang('Total transaction amount'):</span>
                <span class="xs:w-40 text-sm text-gray-700 mr-4">50.000 <small>@lang('Toman')</small></span>
            </div>
            <div class="flex items-center mt-2">
                <span class="text-xs text-gray-500">@lang('میانگین درصد سهم اتاق'):</span>
                <span class="xs:w-40 text-sm text-gray-700 mr-4">15%</span>
            </div>
            <div class="flex items-center mt-2">
                <span class="text-xs text-gray-500">@lang('Total percentage room'):</span>
                <span class="xs:w-40 text-sm text-gray-700 variable-font-medium mr-4">345.000 <small>@lang('Toman')</small></span>
            </div>
        </div>
    </div>
</div>