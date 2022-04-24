<div class="flex flex-col sm:flex-row sm:items-center bg-gray-50 hover:bg-gray-100 transition py-3 pb-4 sm:py-2 p-2 rounded mt-2">
    <div class="flex-1 p-2 cursor-default">
        <div class="text-sm text-gray-600 variable-font-bold sm:variable-font-medium">دکتر مسعود جان‌بزرگی</div>
    </div>
    <div class="flex-1 p-2 cursor-default mb-2 sm:mb-0 pb-4 sm:pb-2 border-b sm:border-none border-gray-200">
        <div class="text-xs text-gray-600">
            <span class="ml-2">سهم اتاق <span class="sm:hidden">از جلسات درمانی:</span></span>
            <span>%100</span>
        </div>
        <div class="mt-2 text-xs text-gray-600">
            <span class="ml-2">سهم مرکز <span class="sm:hidden">از جلسات درمانی:</span></span>
            <div class="inline-flex items-center">
                <span class="text-xs text-gray-600 relative top-0.5 cursor-default ml-1">%</span>
                <div class="relative">
                    <input type="number" class="w-16 h-7 border border-gray-300 rounded text-xs text-gray-600 focus disabled:bg-gray-100 lijax input-loading">
                    <span class="spinner"></span>
                </div>
            </div>
        </div>
        <div class="mt-2 flex items-center">
            <input type="checkbox" id="pinned" name="pinned" class="lijax w-4 h-w-4 border border-gray-600 rounded-sm focus cursor-pointer relative checkbox-loading-right">
            <label for="pinned" class="text-xs text-gray-600 mr-2 cursor-pointer">@lang('پیش‌فرض')</label>
        </div>
    </div>
    <div class="flex-1 p-2 cursor-default mb-2 sm:mb-0 pb-4 sm:pb-2 border-b sm:border-none border-gray-200">
        <div class="text-xs text-gray-600">
            <span class="ml-2">سهم اتاق <span class="sm:hidden">از آزمون‌ها:</span></span>
            <span>%100</span>
        </div>
        <div class="mt-2 text-xs text-gray-600">
            <span class="ml-2">سهم مرکز <span class="sm:hidden">از آزمون‌ها:</span></span>
            <div class="inline-flex items-center">
                <span class="text-xs text-gray-600 relative top-0.5 cursor-default ml-1">%</span>
                <div class="relative">
                    <input type="number" class="w-16 h-7 border border-gray-300 rounded text-xs text-gray-600 focus disabled:bg-gray-100 lijax input-loading">
                    <span class="spinner"></span>
                </div>
            </div>
        </div>
        <div class="mt-2 flex items-center">
            <input type="checkbox" id="pinned" name="pinned" class="lijax w-4 h-w-4 border border-gray-600 rounded-sm focus cursor-pointer relative checkbox-loading-right">
            <label for="pinned" class="text-xs text-gray-600 mr-2 cursor-pointer">@lang('پیش‌فرض')</label>
        </div>
    </div>
    <div class="flex-1 p-2 cursor-default mb-2 sm:mb-0 pb-4 sm:pb-2 border-b sm:border-none border-gray-200">
        <div class="text-xs text-gray-600">
            <span class="ml-2">سهم اتاق <span class="sm:hidden">از خدمات ریسلو:</span></span>
            <span>%100</span>
        </div>
        <div class="mt-2 text-xs text-gray-600">
            <span class="ml-2">سهم مرکز <span class="sm:hidden">از خدمات ریسلو:</span></span>
            <div class="inline-flex items-center">
                <span class="text-xs text-gray-600 relative top-0.5 cursor-default ml-1">%</span>
                <div class="relative">
                    <input type="number" class="w-16 h-7 border border-gray-300 rounded text-xs text-gray-600 focus disabled:bg-gray-100 lijax input-loading">
                    <span class="spinner"></span>
                </div>
            </div>
        </div>
        <div class="mt-2 flex items-center">
            <input type="checkbox" id="pinned" name="pinned" class="lijax w-4 h-w-4 border border-gray-600 rounded-sm focus cursor-pointer relative checkbox-loading-right">
            <label for="pinned" class="text-xs text-gray-600 mr-2 cursor-pointer">@lang('پیش‌فرض')</label>
        </div>
    </div>
</div>

{{-- <tr class="transition hover:bg-gray-100 {{ ($loop->index % 2) ? 'bg-gray-50' : '' }}" x-data="{ pinned: Boolean({{ $room->commission_pinned }}) , room_commission : {{ $room->commission }}, _room_commission : {{ $room->commission }}}" x-ref="row_{{ $room->id }}">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default">{{ $room->manager->name }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 cursor-default" x-text="(100 - (pinned ? commission : room_commission)) + '%'"></span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-600 relative top-0.5 cursor-default ml-1">%</span>
            <div class="relative">
                <input type="number" x-bind:disabled="pinned" x-effect="if(pinned) room_commission = commission;" :value="pinned ? commission : room_commission" x-model="room_commission" id="commission-{{ $room->id }}" class="w-16 h-7 border border-gray-300 rounded text-xs text-gray-600 focus disabled:bg-gray-100 lijax input-loading"data-lijax="1500 change"  data-merge='{"room_id" : "{{ $room->id }}"}' data-action="{{ route('dashboard.center.commissions.update', $center->id) }}" data-method="put" name="commission" id="commissions[{{ $room->id }}]"  x-on:statio-init="$el.disabled=true; $refs.row_{{ $room->id }}.classList.remove('statio-fold')" x-on:jresp="$el.disabled = false; $refs.row_{{ $room->id }}.classList.add('statio-fold'); _room_commission = (event.detail.is_ok ? room_commission : _room_commission); room_commission = _room_commission" x-ref="input">
                <span class="spinner"></span>
            </div>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <input type="checkbox" x-bind:checked="pinned" x-model="pinned"  name="pinned" data-merge='{"room_id" : "{{ $room->id }}"}' data-action="{{ route('dashboard.center.commissions.update', $center->id) }}" data-method="put" class="lijax w-4 h-w-4 border border-gray-600 rounded-sm focus cursor-pointer relative checkbox-loading" x-on:statio-init="$refs.input.disabled = true; $el.disabled=true; $refs.row_{{ $room->id }}.classList.remove('statio-fold')" x-on:jresp="$el.disabled = false; $refs.row_{{ $room->id }}.classList.add('statio-fold'); $el.checked = event.detail.is_ok ? $el.checked : !$el.checked; pinned =  $el.checked; $refs.input.disabled = $el.checked">
        </div>
    </td>
</tr> --}}
