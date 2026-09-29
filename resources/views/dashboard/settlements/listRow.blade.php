<tr class="transition hover:bg-gray-50 {{ ['' => 'bg-red-100 hover:bg-red-100' , 'awaiting' => 'bg-yellow-100 hover:bg-yellow-100', 'settled' => '', 'returned' => 'bg-gray-100 hover:bg-gray-100'][$settlement->status] ?? '' }}">
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
        <div class="text-xs text-gray-600 variable-font-medium cursor-default">{{ $settlement->creator->name }} {{ $settlement->has_room || isset($settlement->center) ? '*' : '' }}</div>
        @if ($settlement->center)
            <div class="text-xs text-gray-500 cursor-default">{{ $settlement->center->detail->title  }}</div>
        @endif
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-pointer" data-clipboard-text="{{$settlement->amount * 10}}">@amount($settlement->amount)</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="text-xs text-gray-600 text-right dir-ltr cursor-default en">{{ $settlement->iban }}</div>
        <div class="text-xs text-gray-500 cursor-default">{{ $settlement->owner }}</div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            @if (in_array($settlement->status, ['settled', 'returned']))
                <span class="flex items-center text-xs {{ $settlement->status == 'settled' ? 'text-green-600 bg-green-50' : 'text-red-600 bg-red-50' }} px-2 h-5 rounded cursor-default">@lang(ucfirst($settlement->status))</span>
            @else
                <div class="relative">
                    <select name="status" id="status-{{ $settlement->id }}" class="border border-gray-400 text-xs text-gray-600 h-8 rounded px-2 focus table-select lijax settlement-status" data-lijax="settlement:confirmed" data-current="{{ $settlement->status }}" data-method="put" data-action="{{ route('dashboard.admin.settlements.update', $settlement->id) }}">
                        <option value="awaiting" @selectChecked($settlement->status, 'awaiting')>@lang('Awaiting')</option>
                        <option value="settled" @selectChecked($settlement->status, 'settled')>@lang('Settled')</option>
                        <option value="returned" @selectChecked($settlement->status, 'returned')>@lang('Returned')</option>
                    </select>
                    <div class="spinner"></div>
                </div>
            @endif
        </div>
    </td>
</tr>
