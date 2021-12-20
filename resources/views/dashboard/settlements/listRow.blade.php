<tr class="transition hover:bg-gray-50 {{ ['' => 'bg-red-100 hover:bg-red-100' , 'awaiting' => 'bg-yellow-100 hover:bg-yellow-100', 'settled' => ''][$settlement->status] }}">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 block text-right dir-ltr cursor-default en">{{ $settlement->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="text-xs text-gray-600 cursor-default">@time($settlement->created_at,'%A %d %B %y')</div>
        <div class="text-xs text-gray-600 cursor-default">@time($settlement->created_at,'ساعت H:i')</div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="text-xs text-gray-600 variable-font-medium cursor-default">{{ $settlement->creator->name }}</div>
        @if ($settlement->center)
            <div class="text-xs text-gray-500 cursor-default">{{ $settlement->center->detail->title  }}</div>
        @endif
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600">@amount($settlement->amount)</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="text-xs text-gray-600 text-right dir-ltr cursor-default en">{{ $settlement->iban }}</div>
        <div class="text-xs text-gray-500 cursor-default">{{ $settlement->owner }}</div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <div class="relative">
                <select name="status" id="status-{{ $settlement->id }}" class="border border-gray-400 text-xs text-gray-600 h-8 rounded px-2 focus table-select lijax" data-method="put" data-action="{{ route('dashboard.admin.settlements.update', $settlement->id) }}">
                    <option value="awaiting" @selectChecked($settlement->status, 'awaiting')>@lang('Awaiting')</option>
                    <option value="settled" @selectChecked($settlement->status, 'settled')>@lang('Settled')</option>
                </select>
                <div class="spinner"></div>
            </div>
        </div>
    </td>
</tr>
