<div data-xhr="centers-rooms">
    {{-- @if () --}}
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
                        {{-- @foreach ($ as $) --}}
                            @include('dashboard.centers.accounting.contribution.contributionRaw')
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- {{method_exists($, 'links') ? $->links() : null}} --}}

    {{-- @else --}}
        {{-- <div class="border border-gray-200 rounded p-4 text-center text-sm text-gray-500">@lang('اتاق درمانی‌ای در مرکز ثبت نشده است.')</div> --}}
    {{-- @endif --}}
</div>