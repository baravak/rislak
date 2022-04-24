<div data-xhr="commission-items">
    <div class="hidden sm:flex items-center cursor-default px-2 text-xs variable-font-bold text-gray-600 bg-gray-100 py-2 rounded">
        <div class="flex-1 px-2">@lang('اتاق درمان')</div>
        <div class="flex-1 px-2">@lang('جلسات درمانی')</div>
        <div class="flex-1 px-2">@lang('آزمون‌ها')</div>
        <div class="flex-1 px-2">@lang('خدمات ریسلو')</div>
    </div>
    {{-- @foreach ($commissions as $commission) --}}
        @include('dashboard.centers.accounting.commission.listRaw')
    {{-- @endforeach --}}
    {{-- <div>
        @if (method_exists($commissions, 'links'))
            {{ $commissions->links() }}
        @endif
    </div> --}}
</div>

{{-- <div data-xhr="centers-rooms">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 cursor-default">
                        <tr>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Therapy room') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Percentage room') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Percentage center') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Default') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($rooms as $room)
                            @include('dashboard.centers.accounting.commission.commissionRaw')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}
