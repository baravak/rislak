<tr class="transition hover:bg-gray-100 {{ ($loop->index % 2) ? 'bg-gray-50' : '' }}">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">{{ $room->manager->name }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            @if ($room->balance == 0)
                <span class="text-xs text-gray-600 block cursor-default">0</span>
            @elseif($room->balance >= 0)
                <span class="text-xs text-green-600 block cursor-default">
                    @amount($room->balance)
                </span>
            @else
                <span class="text-xs text-red-600 block cursor-default">
                    @amount($room->balance)
                </span>
            @endif
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">{{ $room->transaction_records }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block cursor-default relative top-0.5">
                @time($room->settled_at,'%A %d %B %y - ساعت H:i')
            </span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block">
            <a href="#" class="inline-block px-3 py-1 text-xs text-brand hover:text-white border border-brand hover:bg-brand rounded-full transition">@lang('Report and settlement')</a>
        </div>
    </td>
</tr>
