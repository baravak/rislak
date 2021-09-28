<tr data-xhr="sample-list-id" class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap hidden 2xl:table-cell">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default en">{{ $bulkSample->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default">{{ $bulkSample->title }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap hidden sm:table-cell">
        <div class="flex items-center">
            <div class="flex flex-col">
                    @if ($bulkSample->room->type != 'personal_clinic')
                        <a href="{{ route('dashboard.centers.show', $bulkSample->room->center->id) }}" class="text-xs text-gray-600 underline hover:text-blue-500">
                                {{ $bulkSample->room->center->detail->title }}
                        </a>
                    @endif
                    <a href="{{ route('dashboard.rooms.show', $bulkSample->room->id) }}" class="mt-1 block text-xs text-gray-600 underline hover:text-blue-500">{{ $bulkSample->room->manager->name }}</a>
            </div>
        </div>
    </td>
    {{-- <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <div class="flex">
                <a href="{{ route('dashboard.rooms.show', $bulkSample->room->id) }}" class="text-xs text-gray-600 underline hover:text-blue-500">{{ $bulkSample->room->manager->name }}</a>
            </div>
        </div>
    </td> --}}
    <td class="px-3 py-2 whitespace-nowrap hidden 2xl:table-cell">
        <div class="flex items-center">
            <div class="flex">
                <span class="text-xs text-gray-600">
                    @lang(ucfirst($bulkSample->case_status))
                </span>
            </div>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap hidden md:table-cell">
        <div class="flex items-center">
            <div class="flex">
                <span class="text-xs text-gray-600 cursor-default">
                    {{ $bulkSample->members_count }} / {{ $bulkSample->joined }}
                </span>
            </div>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap hidden xl:table-cell">
        <div class="flex items-center">
            <span class="text-xs text-gray-500 cursor-default">@lang(ucfirst($bulkSample->status))</span>
        </div>
    </td>
    <td class="px-3 p-3 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block mr-4">
            <a href="{{ route('dashboard.bulk-samples.show', $bulkSample->id) }}" title="{{ __('Show') }}">
                <i class="fal fa-eye text-sm text-gray-600 hover:text-blue-600 relative top-1"></i>
            </a>
        </div>
        {{-- <div class="inline-block mr-4">
            <a href="{{ $bulkSample->route('edit') }}" title="{{ __('Edition') }}">
                <i class="fal fa-edit text-sm text-gray-600 hover:text-blue-600 relative top-0.5"></i>
            </a>
        </div> --}}
        <div class="inline-flex border border-brand rounded-full text-xs text-brand">
            <a href="{{ route('auth', ['authorized_key' => $bulkSample->link]) }}" target="_blank" class="pl-3 pr-2 py-1 hover:bg-brand hover:text-white transition rounded-l-full">{{ __('Registration link') }}</a>
            <div data-clipboard-text="{{ route('auth', ['authorized_key' => $bulkSample->link]) }}" class="pr-3 pl-2 py-1 cursor-pointer border-l border-brand border-opacity-30 hover:bg-brand hover:text-white transition rounded-r-full" title="{{ __('Copy') }}">
                <i class="fal fa-copy relative top-0.5"></i>
            </div>
        </div>
    </td>
</tr>
