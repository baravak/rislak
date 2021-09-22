<div class="relative flex items-center justify-center xs:justify-between border border-gray-300 rounded p-4" data-xhr-bind="accounts">
    <div class="flex items-center cursor-default flex-col xs:flex-row">
        <div class="flex items-center justify-center border border-gray-200 rounded-full w-10 h-10 p-2 ml-2">
            <i class="fal fa-university text-gray-300"></i>
            {{-- <img src="https://next.zarinpal.com/images/Resalat.png" alt=""> --}}
        </div>
        <div class="flex flex-col mt-2 xs:mt-0 text-center xs:text-right">
            <span class="text-xs text-gray-600 font-medium en">{{ $item->isbn }}</span>
            <div class="flex flex-col xs:flex-row items-center mt-1">
                <span class="text-xs text-gray-500">{{ $item->owner ?: __('نامشخص') }}</span>
                @if ($item->status != 'verified')
                    <span class="flex items-center text-xs {{$item->status =='awaiting' ? 'text-yellow-600 bg-yellow-50' : 'text-red-500 bg-red-50'}} px-2 h-5 rounded mt-2 xs:mt-0 xs:mr-2">@lang(ucfirst($item->status))</span>
                @endif
            </div>
        </div>
    </div>
    {{-- <div>
        <a class="absolute left-2 top-2 xs:relative xs:top-0.5 xs:left-auto flex items-center justify-center text-gray-400 hover:text-red-600 transition text-sm h-6 w-6 rounded-full focus:text-red-600 focus-current ring-red-600">
            <i class="fal fa-trash-alt"></i>
        </a>
    </div> --}}
</div>
