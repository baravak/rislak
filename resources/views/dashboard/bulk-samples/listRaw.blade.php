<div data-xhr="sample-list-{{ $bulkSample->id }}" class="flex items-center bg-gray-50 hover:bg-gray-100 transition py-3 sm:py-2 p-2 rounded mt-2">
    <a href="{{ route('dashboard.bulk-samples.show', $bulkSample->id) }}" class="w-24 text-xs text-gray-600 hover:text-blue-600 transition hidden xl:flex">
        <span class="text-right dir-ltr en">{{ $bulkSample->id }}</span>
    </a>
    <div class="flex-1 px-2 flex flex-col">
        <div class="flex">
            <a href="{{ route('dashboard.bulk-samples.show', $bulkSample->id) }}" class="text-xs text-gray-600 hover:text-blue-600 transition variable-font-medium">{{ $bulkSample->title }}</a>
        </div>
        <div class="flex lg:hidden items-center text-xs text-gray-500 cursor-default mt-3">
            <span>@lang(ucfirst($bulkSample->case_status))</span>
            <span class="mr-2 pr-2 border-r border-gray-200">@lang('Users'): {{ $bulkSample->members_count }} / {{ $bulkSample->joined }}</span>
        </div>
        <span class="flex md:hidden text-xs text-gray-400 cursor-default mt-2">@lang('Status'): @lang(ucfirst($bulkSample->status))</span>
        <div class="sm:hidden flex flex-col mt-3">
            <div class="flex">
                <a href="{{ route('dashboard.rooms.show', $bulkSample->room->id) }}" class="text-xs text-gray-600 hover:text-blue-500 underline">{{ __('Therapy room of :user', ['user' => $bulkSample->room->manager->name]) }}</a>
            </div>
            @if ($bulkSample->room->type != 'personal_clinic')
                <div class="flex">
                    <a href="{{ route('dashboard.centers.show', $bulkSample->room->center->id) }}" class="text-xs text-gray-500 hover:text-blue-500 underline mt-1">{{ $bulkSample->room->center->detail->title }}</a>
                </div>
            @endif
        </div>
        <div class="text-left dir-ltr sm:hidden flex items-center mt-4">
            <a href="{{ route('dashboard.bulk-samples.show', $bulkSample->id) }}" title="{{ __('Show') }}">
                <i class="fal fa-eye text-sm text-gray-600 hover:text-blue-600 relative top-0.5"></i>
            </a>
            @if (!in_array($bulkSample->status, ['blocked', 'closed']))
                <div class="inline-flex text-xs ml-4">
                    <a href="{{ route('auth', ['authorized_key' => $bulkSample->link]) }}" target="_blank" class="flex items-center text-white px-4 h-7 bg-blue-600 hover:bg-blue-700 transition rounded-full">{{ __('Registration link') }}</a>
                    <div data-clipboard-text="{{ route('auth', ['authorized_key' => $bulkSample->link]) }}" class="flex items-center text-blue-600 border border-blue-600 px-4 h-7 hover:bg-blue-50 transition rounded-full ml-2 cursor-pointer" title="{{ __('کپی لینک') }}">
                        <span class="hidden xs:block mr-1">@lang('کپی لینک')</span>
                        <i class="fal fa-copy"></i>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="flex-1 px-2 hidden sm:flex flex-col">
        <div class="flex">
            <a href="{{ route('dashboard.rooms.show', $bulkSample->room->id) }}" class="text-xs text-gray-600 hover:text-blue-500 underline">{{ __('Therapy room of :user', ['user' => $bulkSample->room->manager->name]) }}</a>
        </div>
        @if ($bulkSample->room->type != 'personal_clinic')
            <div class="flex">
                <a href="{{ route('dashboard.centers.show', $bulkSample->room->center->id) }}" class="text-xs text-gray-500 hover:text-blue-500 underline mt-2">{{ $bulkSample->room->center->detail->title }}</a>
            </div>
        @endif
    </div>
    <div class="flex-1 px-2 hidden lg:flex">
        <span class="text-xs text-gray-600 cursor-default">@lang(ucfirst($bulkSample->case_status))</span>
    </div>
    <div class="flex-1 px-2 hidden lg:flex">
        <span class="text-xs text-gray-600 cursor-default">{{ $bulkSample->members_count }} / {{ $bulkSample->joined }}</span>
    </div>
    <div class="flex-1 px-2 hidden md:flex">
        <span class="text-xs text-gray-600 cursor-default">@lang(ucfirst($bulkSample->status))</span>
    </div>
    <div class="flex-1 px-2 text-left dir-ltr hidden sm:flex items-center">
        <a href="{{ route('dashboard.bulk-samples.show', $bulkSample->id) }}" title="{{ __('Show') }}">
            <i class="fal fa-eye text-sm text-gray-600 hover:text-blue-600 relative top-0.5"></i>
        </a>
        @if (!in_array($bulkSample->status, ['blocked', 'closed']))
            <div class="inline-flex flex-shrink-0 border border-brand rounded-full text-xs text-brand ml-2">
                <a href="{{ route('auth', ['authorized_key' => $bulkSample->link]) }}" target="_blank" class="pl-3 pr-2 py-1 hover:bg-brand hover:text-white transition rounded-l-full">{{ __('Registration link') }}</a>
                <div data-clipboard-text="{{ route('auth', ['authorized_key' => $bulkSample->link]) }}" class="pr-3 pl-2 py-1 cursor-pointer border-l border-brand border-opacity-30 hover:bg-brand hover:text-white transition rounded-r-full" title="{{ __('Copy') }}">
                    <i class="fal fa-copy relative top-0.5"></i>
                </div>
            </div>
        @endif
    </div>
</div>
