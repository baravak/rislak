<div class="border border-gray-300 rounded p-4 cursor-default">
    <h2 class="variable-font-semibold text-brand">{{ $room->manager->name }}</h2>
    <div class="flex items-center mt-2">
        <span class="text-xs text-gray-500">@lang('Financial-balance'):</span>
        @if ($room->balance > 0)
            <span class="mr-2 variable-font-medium text-sm text-green-600">@amount($room->balance) تومان</span>
        @elseif($room->balance < 0)
            <span class="mr-2 variable-font-medium text-sm text-red-600">@amount($room->balance) تومان</span>
        @else
            <span class="mr-2 variable-font-medium text-sm text-gray-600">0 تومان</span>
        @endif
    </div>
    <div class="flex flex-col xs:flex-row mt-2">
        <div class="flex ml-8 text-xs">
            <span class="text-gray-500">@lang('Transactions cunt'):</span>
            <span class="text-gray-700 mr-2">{{ $room->transaction_records }}</span>
        </div>
        <div class="flex text-xs mt-2 xs:mt-0">
            <span class="text-gray-500">@lang('Last settle'):</span>
            <span class="text-gray-700 mr-2">
                @time($room->settled_at,'%A %d %B %y - ساعت H:i')
            </span>
        </div>
    </div>
</div>
