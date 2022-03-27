<div data-xhr="billing">
    <div class="flex justify-between items-center">
        <div class="text-xs text-gray-500 variable-font-light">@lang('مبلغ آزمون')</div>
        <div class="text-green-700 variable-font-semibold">
            <span class="text-lg" x-data x-currency="{{ $sample->total_amount }}"></span>
            <span class="text-xs"> @lang('تومنء')</span>
        </div>
    </div>
    <div class="flex justify-between items-center mt-2">
        <div class="text-xs text-gray-500 variable-font-light">@lang('وضعیت پرداخت')</div>
        @if ($sample->billing && $sample->purchased)
            <a href="{{ route('dashboard.billings.show', $sample->billing->id) }}" class="text-xs xs:text-sm text-gray-600 hover:text-blue-600 transition underline">
                <span>{{ $sample->purchased ? 'پرداخت شده' : 'پرداخت نشده' }}</span>
                <span> ({{ $sample->billing->id }})</span>
            </a>
        @else
            <span>پرداخت نشده</span>
        @endif
        {{-- <div class="text-xs xs:text-sm text-gray-600">نقدی</div> --}}
    </div>
    @if ($sample->billing && $sample->purchased)
        <div class="flex justify-between items-center mt-3">
            <div class="text-xs text-gray-500 variable-font-light">@lang('زمان پرداخت')</div>
            @php
                $time = Carbon\Carbon::createFromTimestamp($sample->billing->updated_at);
            @endphp
            <div class="text-xs xs:text-sm text-gray-600">@time($time, '%d %B %y - ساعت H:i')</div>
        </div>
    @elseif(!auth()->isAdmin())
        <div class="flex justify-between items-center mt-3">
            <div class="text-xs text-gray-500 variable-font-light">@lang('کیف ‌پول')</div>
            <div>
                <select class="text-xs text-gray-700 border border-gray-400 rounded py-1 px-8 w-44" name="treasury_id" x-data x-lijax:change data-action="{{ route('dashboard.samples.purchase', $sample->id) }}" data-xhrBase="inline" data-method="POST" x-on:statio-done="console.log(event.detail)">
                    <option selected="selected" value="">انتخاب کنید</option>
                    @foreach (auth()->user()->centers->where('id', $sample->room->center->id)->first()->treasuries->where('creditable', false) as $treasury)
                        <option value="{{ $treasury->id }}">{{ $treasury->title }}</option>
                    @endforeach
                </select>
                <span class="spinner relative top-3 -right-0.5"></span>
            </div>
        </div>
    @endif
    @if (!$sample->billing)
        <label for="prepayment" class="flex items-center cursor-pointer group mt-3">
            <input {{ $sample->prepayment ? 'checked' : '' }} id="prepayment" name="prepayment" type="checkbox" value="1" x-data class="w-4 h-4 rounded border border-gray-400 focus" x-lijax:click data-method="PUT">
            <span class="text-xs text-gray-500 mr-1.5 group-hover:text-blue-600">@lang('هزینه‌ی آزمون پیش از انجام، توسط مراجع پرداخت شود.')</span>
        </label>
    @endif
</div>
