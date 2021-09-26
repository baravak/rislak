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
            @elseif($export->status == 'failed')
            <span class="text-xs text-red-600" >@lang("ناموفق")</span>
            @else
                <span class="spinner-alone" data-workersta="{{ $export->id }}"></span>
                <span class="text-xs text-gray-500 cursor-default mr-2">در حال ساخت خروجی</span>
            @endif

            @if (false)
                <span class="text-xs text-gray-500" >@lang("منقضی شده در") 1400.08.20</span>
            @endif
        </div>
    </td>
</tr>
