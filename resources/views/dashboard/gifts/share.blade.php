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
            <a href="https://t.me/share/url?url={{ rawurlencode($gift->postcard->url) }}&text={!! $gift->telegram !!}" class="flex items-center text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-blue-500 transition px-3 py-2" target="_blank">
                <i class="fal fa-paper-plane"></i>
                <span class="mr-2 text-sm pt-0.5">تلگرام</span>
            </a>
            {{-- <a href="https://instagram.com/sharer.php?u={{ rawurlencode(route('gifts.public', $gift->code)) }}" class="flex items-center text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-pink-500 transition px-3 py-2" target="_blank">
                <i class="fab fa-instagram text-lg"></i>
                <span class="mr-2 text-sm pt-0.5">اینستاگرام</span>
            </a> --}}
            <div class="flex items-center justify-between text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-brand transition px-3 py-2">
                <a href="{{ $gift->postcard->url }}" target="_blank" class="flex items-center">
                    <i class="fal fa-badge-percent text-lg"></i>
                    <span class="mr-2 text-sm pt-0.5">صفحه کد تخفیف</span>
                </a>
                <div class="relative">
                    <div class="flex items-center cursor-pointer h-6 px-2 text-xs text-gray-500 border border-gray-200 hover:border-brand hover:text-brand transition rounded-full focus" data-clipboard-text="{{ $gift->postcard->image }}">@lang('کپی لینک')</div>
                    <div class="copied-tooltip absolute left-1 -top-6">@lang('کپی شد')</div>
                </div>
            </div>
            <div class="flex items-center justify-between text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-gray-900 transition px-3 py-2">
                <a href="{{ $gift->postcard->image  }}" target="_blank" class="flex items-center">
                    <i class="fal fa-image-polaroid text-lg"></i>
                    <span class="mr-2 text-sm pt-0.5">عکس کد تخفیف</span>
                </a>
                <div class="relative">
                    <div class="flex items-center cursor-pointer h-6 px-2 text-xs text-gray-500 border border-gray-200 hover:border-brand hover:text-brand transition rounded-full focus" data-clipboard-text="{{ $gift->postcard->image }}">@lang('کپی لینک')</div>
                    <div class="copied-tooltip absolute left-1 -top-6">@lang('کپی شد')</div>
                </div>
            </div>
        </div>
    </div>
</div>