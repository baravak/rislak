<div class="mb-4 mt-8">
    <h3 class="heading" data-total="({{ $bulkSample->samples && $bulkSample->samples->count() ? $bulkSample->samples->count() : 0 }})" data-xhr="total">{{ __('Samples') }}</h3>
</div>

<div data-xhr="sample-items">
    @if ($bulkSample->samples->count())
        <div class="hidden sm:flex items-center cursor-default px-2 text-xs variable-font-medium text-gray-600 bg-gray-100 py-2 rounded">
            <div class="w-24 hidden lg:flex">@lang('Serial')</div>
            <div class="flex-1 px-2">@lang('Scale')</div>
            <div class="flex-1 px-2 hidden md:flex">@lang('Client')</div>
            <div class="flex-1 px-2">@lang('Therapy room')/ @lang('Case')</div>
            <div class="flex-1 px-2">@lang('Status')</div>
            <div class="flex-1 px-2"></div>
        </div>
        @foreach ($bulkSample->samples as $sample)
            @include('dashboard.samples.listRaw')
        @endforeach
    @else
        @include('dashboard.samples.emptyList')
    @endif
</div>

{{-- <div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-300 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Scale') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Client') }}</th>
                        @if ($bulkSample->case_status == 'personal')
                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Case') }}</th>
                        @endif
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Status') }}</th>
                        <th class="px-3 py-2" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($bulkSample->samples ?: [] as $sample)
                    <tr data-xhr="sample-list-id" class="transition hover:bg-gray-50">
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default">{{ $sample->id }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex flex-col cursor-default">
                                <div class="flex"><span class="text-xs font-medium text-gray-600">{{ $sample->scale->title }}</span></div>
                                <div class="flex mt-1"><span class="text-gray-400 font-light text-xs">{{$sample->edition ? __('Edition :title', ['title' => $sample->edition]) .' - ' : ''}} {{ __('Version :ver', ['ver' => $sample->version]) }}</span></div>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <a href="{{ route('dashboard.center.users.show', ['center' => $center->id, 'user' => $sample->client->id]) }}" class="text-xs text-gray-600 hover:text-brand">
                                    @displayName($sample->client)
                                </a>
                            </div>
                        </td>
                        @if ($bulkSample->case_status == 'personal')
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex">
                                        @if ($sample->case)
                                        <a href="{{ route('dashboard.cases.show', $sample->case->id) }}" class="text-xs text-gray-600 hover:text-blue-500">{{ $sample->case->id }}</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        @endif
                        <td class="px-3 py-2 whitespace-nowrap">
                            @include('dashboard.samples.tables.status')
                        </td>
                        <td class="px-3 p-3 whitespace-nowrap text-left dir-ltr">
                            @include('dashboard.samples.do')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}
