<div data-xhr="exports-items">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 cursor-default">
                        <tr>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Request date') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Create date') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Export title') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Description') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Download') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        {{-- @foreach ($exports as $export) --}}
                            @include('dashboard.exports.listRaw')
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- {{$exports->links()}} --}}
</div>