<div class="grid grid-cols-1 gap-2 mt-2" data-xhr="accounts">
    @foreach ($bank->items as $item)
        @include('dashboard.centers.accounting.bank.bankAccountsItems')
    @endforeach
</div>

{{-- <div class="grid grid-cols-1 gap-2 mt-2">
    <div class="relative flex items-center justify-between border border-gray-300 rounded p-4">
        <div class="flex items-center cursor-default">
            <div class="h-10 w-1 bg-brand rounded-full ml-2"></div>
            <div class="flex flex-col">
                <span class="text-xs text-gray-600 font-medium en">IR113900001000793178513446</span>
                <div class="flex items-center mt-1">
                    <span class="text-xs text-gray-500">محمدعلی نخلی <small>(بانک رسالت)</small></span>
                    <span class="flex items-center text-xs text-yellow-600 bg-yellow-50 px-2 h-5 rounded mt-2 xs:mt-0 xs:mr-2">@lang('Unverified')</span>
                </div>
            </div>
        </div>
        <div>
            <button class="relative top-0.5 flex items-center justify-center text-gray-400 hover:text-red-600 transition text-sm h-6 w-6 rounded-full focus:text-red-600 focus-current ring-red-600">
                <i class="fal fa-trash-alt"></i>
            </button>
        </div>
    </div>
    <div class="relative flex items-center justify-between border border-gray-300 rounded p-4">
        <div class="flex items-center cursor-default">
            <div class="h-10 w-1 bg-yellow-500 rounded-full ml-2"></div>
            <div class="flex flex-col">
                <span class="text-xs text-gray-600 font-medium en">IR227200005000883179651432</span>
                <div class="flex items-center mt-1">
                    <span class="text-xs text-gray-500">محمدعلی نخلی <small>(بانک ملت)</small></span>
                    <span class="flex items-center text-xs text-yellow-600 bg-yellow-50 px-2 h-5 rounded mt-2 xs:mt-0 xs:mr-2">@lang('Unverified')</span>
                </div>
            </div>
        </div>
        <div>
            <button class="relative top-0.5 flex items-center justify-center text-gray-400 hover:text-red-600 transition text-sm h-6 w-6 rounded-full focus:text-red-600 focus-current ring-red-600">
                <i class="fal fa-trash-alt"></i>
            </button>
        </div>
    </div>
</div> --}}