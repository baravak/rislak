<div class="col-span-full sm:col-span-5 lg:col-span-3 flex flex-col {{$gift->status == 'expires' ? 'filter grayscale' : ''}}" data-xhr="shareSide">
    <div class="relative bg-green-50 rounded-lg flex flex-col items-center justify-center pt-7 pb-5">
        @if ($gift->status != 'expires')
            <div class="absolute left-2 top-2">
                <div class="relative dropdown">
                    <button type="button" class="dropdown-toggle text-lg text-gray-600 hover:bg-white focus:bg-white transition flex items-center justify-center w-8 h-8 rounded-lg focus-current ring-gray-500">
                        <i class="fal fa-share-alt"></i>
                    </button>
                    <div class="dropdown-menu absolute w-56 left-0 top-9 bg-white rounded-md shadow-md flex flex-col z-50 divide-y divide-gray-200">
                        <a href="https://api.whatsapp.com/send?text={!! $gift->whatsapp !!}" class="flex items-center text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-green-500 transition px-3 py-2" target="_blank">
                            <i class="fab fa-whatsapp text-lg"></i>
                            <span class="mr-2 text-sm pt-0.5">واتس‌اپ</span>
                        </a>
                        <a href="https://t.me/share/url?text={!! $gift->telegram !!}" class="flex items-center text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-blue-500 transition px-3 py-2" target="_blank">
                            <i class="fal fa-paper-plane"></i>
                            <span class="mr-2 text-sm pt-0.5">تلگرام</span>
                        </a>
                        <a href="#" class="flex items-center text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-pink-500 transition px-3 py-2">
                            <i class="fab fa-instagram text-lg"></i>
                            <span class="mr-2 text-sm pt-0.5">اینستاگرام</span>
                        </a>
                        <div class="flex items-center justify-between text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-brand transition px-3 py-2">
                            <a href="{{ route('gifts.public', $gift->code) }}" target="_blank" class="flex items-center">
                                <i class="fal fa-badge-percent text-lg"></i>
                                <span class="mr-2 text-sm pt-0.5">صفحه کد تخفیف</span>
                            </a>
                            <button class="h-6 px-2 text-xs text-gray-500 border border-gray-200 hover:border-brand hover:text-brand transition rounded-full focus">@lang('کپی لینک')</button>
                        </div>
                        <div class="flex items-center justify-between text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-gray-900 transition px-3 py-2">
                            <a href="#" target="_blank" class="flex items-center">
                                <i class="fal fa-image-polaroid text-lg"></i>
                                <span class="mr-2 text-sm pt-0.5">عکس کد تخفیف</span>
                            </a>
                            <button class="h-6 px-2 text-xs text-gray-500 border border-gray-200 hover:border-brand hover:text-brand transition rounded-full focus">@lang('کپی لینک')</button>
                        </div>
                    </div>
                </div>
            </div>
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
