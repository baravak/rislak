<div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-200 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Scale') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Client') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Therapy room') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Status') }}</th>
                        <th class="px-3 py-2" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($samples as $sample)
                        <tr  data-xhr="sample-list-{{ $sample->id }}">
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $sample->id }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="block text-xs font-medium text-gray-700 cursor-default">{{ $sample->scale->title }}</span>
                                    <span class="block text-gray-400 font-light text-xs">{{$sample->edition ? __('Edition :title', ['title' => $sample->edition]) .' - ' : ''}} {{ __('Version :ver', ['ver' => $sample->version]) }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    @if ($sample->client)
                                    <a href="#" class="text-xs text-gray-700 hover:text-blue-500">@displayName($sample->client)</a>
                                    @else
                                    <a href="#" class="text-xs text-gray-700 hover:text-blue-500">{{ $sample->code }}</a>
                                    @endif
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <a href="{{ $sample->room->route('show') }}" class="text-xs text-gray-700 hover:text-blue-500">{{ __('Therapy room of :user', ['user' => $sample->room->manager->name]) }}</a>
                                    @if ($sample->case)
                                            <a class="block text-xs text-gray-500 hover:text-blue-500" href="{{ route('dashboard.cases.show', $sample->case) }}">@lang('Case') {{ $sample->case }}</a>
                                    @endif
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-500 cursor-default">{{ __(ucfirst($sample->status)) }}</span>
                                </div>
                            </td>
                            <td class="px-3 p-3 whitespace-nowrap text-left dir-ltr">
                                <div class="inline-block mr-4">
                                    <x-link-show :link="$sample->route('show')"/>
                                </div>
                                <div class="inline-block">
                                    <a href="#" class="inline-block px-3 py-1 text-xs text-blue-600 hover:text-white border border-blue-600 hover:bg-blue-600 rounded-full transition">{{ __('Do sample') }}</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
