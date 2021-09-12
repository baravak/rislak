<div data-xhr="centers-rooms-balance">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200" x-data='{"dragable" : false, "dropElement" : null, dragElement : null}'>
                    <thead class="bg-gray-50 cursor-default">
                        <tr>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">@lang('Therapy room')</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">@lang('Financial-balance') <small>(تومان)</small></th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">@lang('Transactions cunt')</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">@lang('Last settle')</th>
                            <th class="px-3 py-2" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200" x-data='{"table" : $el}' @drop="$dispatch('restartlist', [...$el.querySelectorAll('tr')])" x-init="$dispatch('restartlist', [...$el.querySelectorAll('tr')])">
                        @foreach ($rooms as $room)
                            @include('dashboard.centers.accounting.financialBalance.financialBalanceRaw')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
