<div data-xhr="bankAccount-items">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 cursor-default">
                        <tr>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">@lang('Sheba')</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">@lang('بستر') - @lang('درخواست‌دهنده') </th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">@lang('Status')</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col"></th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200" x-data='{"banks" : {!! json_encode($banks->response()->data) !!}}'>
                            @include('dashboard.banks.listRaw')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
