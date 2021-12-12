<div class="col-span-full sm:col-span-5 lg:col-span-3 flex flex-col {{$gift->status == 'expires' ? 'filter grayscale' : ''}}" data-xhr="shareSide">
    <div class="relative bg-green-50 rounded-lg flex flex-col items-center justify-center pt-7 pb-5">
        @if ($gift->status != 'expires')
            @include('dashboard.gifts.share')
        @endif
        <i class="fal fa-gift text-green-600 text-5xl"></i>
        <div class="cursor-default text-center mt-2">
            <span class="text-xs text-gray-600">@lang('Gift')</span>
            <h3 class="variable-font-bold text-gray-800">{{ $gift->title }}</h3>
        </div>
        <div class="flex items-center mt-2">
            @if ($gift->type == 'percent')
                <span class="text-2xl variable-font-bold text-green-700 cursor-default">{{ $gift->value }}%</span>
            @else
                <span class="text-2xl variable-font-bold text-green-700 cursor-default">@amount($gift->value)</span>
                <span class="text-sm variable-font-semibold text-green-700 cursor-default mr-1">تومان</span>
            @endif
        </div>
    </div>
    <div class="relative">
        <div data-clipboard-text="{{ substr($gift->code, 10) }}" class="w-full flex flex-col items-center justify-center border-2 border-green-600 border-dashed bg-green-50 rounded-lg mt-1 p-2 pt-1 h-16 text-center cursor-pointer">
            <h4 class="font-bold en text-2xl text-center text-green-600">{{ substr($gift->code, 10) }}</h4>
            <span class="block text-xs text-gray-400">برای کپی کردن کد، کلیک کنید</span>
        </div>
        <div class="copied-tooltip absolute right-1/2 transform translate-x-1/2 -top-6">@lang('کپی شد')</div>
    </div>
</div>
