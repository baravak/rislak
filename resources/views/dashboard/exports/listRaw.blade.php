<tr class="transition bg-blue-50 hover:bg-blue-50" data-xhr="export-{{ $export->id }}">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600">@time($export->created_at, "%A %d %B %y - ساعت H:i")</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600">
                @if ($export->status == 'done')
                    <span class="text-xs text-gray-600">@time($export->cooked_at, "%A %d %B %y - ساعت H:i")</span>
                @endif
            </span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600">{{ $export->title }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600">{{ $export->description }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            @if ($export->status == 'done')
                 <a href="{{ $export->file->url }}" class="block text-sm text-brand hover:text-blue-600 transition relative top-0.5" title="{{ __('Download') }}" aria-label="{{ __('Download') }}" target="_blank">
                    <i class="fal fa-cloud-download"></i>
                </a>
            @else
                <span class="spinner-alone" data-workersta="{{ $export->id }}"></span>
                <span class="text-xs text-gray-500 cursor-default mr-2">در حال ساخت خروجی</span>
            @endif
        </div>
    </td>
</tr>

<tr class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600">شنبه 27 شهریور 1400 - ساعت 12:40</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600">شنبه 27 شهریور 1400 - ساعت 12:50</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600">برنامه درمانی شهریور ماه طلیعه سلامت</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600">-</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            {{-- @if () --}}
                <a href="#" class="block text-sm text-brand hover:text-blue-600 transition relative top-0.5" title="{{ __('Download') }}" aria-label="{{ __('Download') }}">
                    <i class="fal fa-cloud-download"></i>
                </a>
            {{-- @else --}}
                {{-- <span class="spinner-alone"></span>
                <span class="text-xs text-gray-500 cursor-default mr-2">در حال ساخت خروجی</span> --}}
            {{-- @endif --}}
        </div>
    </td>
</tr>
