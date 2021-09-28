<div class="flex items-center justify-center w-full p-4 bg-gray-100 transition cursor-default rounded">
    <input type="hidden" name="treasury_id" value="{{ $_myTreauseries->first()->id }}">
    <div class="flex flex-col items-center justify-center text-xs">
        <span class="flex variable-font-semibold text-gray-700">{{ $_myTreauseries->first()->title}}</span>
        {{-- <span class="flex text-gray-600 mt-0.5">مرکز مشاوره طلیعه سلامت</span> --}}
        <div class="flex items-center mt-0.5">
            <span class="text-gray-500 ml-1">تراز مالی:</span>
            @if ($_myTreauseries->first()->balance > 0)
                <span class="text-green-600 variable-font-medium">@amount($_myTreauseries->first()->balance) تومان</span>
            @elseif($_myTreauseries->first()->balance < 0)
                <span class="text-red-500 variable-font-medium">@amount($_myTreauseries->first()->balance) تومان</span>
            @else
                <span class="text-gray-500 variable-font-medium">0</span>
            @endif
        </div>
    </div>
</div>
