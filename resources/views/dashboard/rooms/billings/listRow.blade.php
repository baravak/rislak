<tr data-xhr="room-billing-list-id" class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <a href="{{ route('dashboard.billings.show', $billing->id) }}" class="text-xs text-blue-500 hover:text-bule-700 transition underline block text-right dir-ltr en relative -top-0.5">{{ $billing->id }}</a>
            @if ($billing->type == 'creditor')
                <span class="flex items-center text-xs text-yellow-600 mr-2 bg-yellow-100 px-2 h-5 rounded cursor-default">@lang('پیش‌فاکتور')</span>
            @endif
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col">
            <span class="text-xs text-gray-600 block cursor-default">@time($billing->updated_at, '%A، %d %B %y')</span>
            <span class="text-xs text-gray-500 block cursor-default mt-1">@time($billing->updated_at, 'ساعت H:i')</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col">
            <span class="text-xs text-gray-600 block cursor-default">{{ $billing->title }}
                <span class="dir-ltr inline-block">
                    @if ($billing->session)
                        <a class="text-blue-500 underline" href="{{ route('dashboard.sessions.show', $billing->session->id) }}">{{ $billing->session->id }}</a>
                    @elseif($billing->sample)
                        <a class="text-blue-500 underline" href="{{ urldecode(route('dashboard.samples.show', $billing->sample->id)) }}">{{ $billing->sample->id }}</a>
                    @endif
                </span>
            </span>
            <span class="text-xs text-gray-700 block cursor-default mt-1">
                @if ($billing->session)
                    @time($billing->session->started_at, '%A، %d %B %y ساعت H:i')
                @endif
            </span>
            {{-- <span class="text-xs text-gray-500 block cursor-default mt-1">پرسشنامه نظم‌جویی شناختی - هیجانی</span> --}}
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            @if ($billing->amount > 0)
                <span class="text-xs text-green-600 block cursor-default">@amount($billing->amount)</span>
            @elseif($billing->amount < 0)
                <span class="text-xs text-red-600 block cursor-default">@amount($billing->amount)</span>
            @else
                <span class="text-xs text-gray-600 block cursor-default">0</span>
            @endif
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col">
            @if ($billing->amount > 0)
                <span class="text-xs text-green-600 block cursor-default">@amount($billing->alloment)</span>
            @elseif($billing->amount < 0)
                <span class="text-xs text-red-600 block cursor-default">@amount($billing->alloment)</span>
            @else
                <span class="text-xs text-gray-600 block cursor-default">0</span>
            @endif
            <span class="text-xs text-gray-600 block cursor-default mt-1">{{ $billing->percentage }}%</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex flex-col cursor-default">
            <span class="text-xs text-red-600 block">{{ $billing->debtor->title  }}</span>
            <span class="text-xs text-green-600 block mt-1">{{ $billing->creditor->title  }}</span>
        </div>
    </td>
    <td>
        <span class="text-xs text-gray-600 block cursor-default mt-1">
            @if ($billing->settled_at)
                @time($billing->settled_at, '%A، %d %B %y ساعت H:i')
            @else
                -
            @endif
        </span>
    </td>
</tr>
