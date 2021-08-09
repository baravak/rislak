<div class="mt-8">
    <div class="flex items-center flex-wrap cursor-default mb-2">
        <h3 class="text-gray-900 variable-font-semibold">@lang('Therapy session') {{ $session->id }}</h3>
        <span class="flex items-center text-xs bg-gray-200 text-gray-600 rounded px-2 h-5 mr-2 relative -top-0.5 sm:-top-2.5">@lang('Group session')</span>
    </div>
    <div class="text-sm text-gray-500 mb-2 cursor-default">{{ $session->description }}</div>
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <div class="flex h-2 w-2 relative">
                <span class="absolute animate-ping inline-flex h-full w-full rounded-full bg-brand opacity-80"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-brand"></span>
            </div>
            <div class="text-brand text-xs cursor-default mr-2">در انتظار تشکیل جلسه</div>
        </div>
        <div>
            <a href="{{ route('dashboard.sessions.edit', $session->id)}}" class="inline-flex items-center justify-center text-gray-600 border rounded-full border-gray-400 hover:bg-gray-100 transition sm:px-4 h-10 sm:h-8 w-10 sm:w-auto" title="@lang('Edit')">
                <span class="text-xs hidden sm:block">@lang('Edit')</span>
                <i class="fal fa-edit sm:hidden"></i>
            </a>
            <a href="{{ route('dashboard.client-reports.index', $session->id) }}" class="inline-flex items-center justify-center text-brand border border-brand hover:bg-brand hover:text-white transition rounded-full sm:px-4 h-10 sm:h-8 w-10 sm:w-auto" title="@lang('Reports of session')">
                <span class="text-xs hidden sm:block">@lang('Reports of session')</span>
                <i class="fal fa-file-alt sm:hidden"></i>
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-4">
    <div class="lg:col-span-2 p-4 border border-gray-300 rounded">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-start text-sm text-gray-700">
                <i class="fal fa-calendar-alt ml-2 w-4 pb-1"></i>
                <span class="variable-font-medium">@time($session->started_at, '%A %d %B %y ، ساعت H:i')</span>
            </div>
            <div class="flex items-start text-sm text-gray-700 mt-4 sm:mt-0">
                <i class="fal fa-clock ml-2 w-4 pb-1"></i>
                <span>{{ __(':time minute(s)', ['time' => $session->duration]) }}</span>
            </div>
        </div>
        <div class="flex items-start text-sm text-gray-700 mt-4 cursor-default">
            <i class="fal fa-user ml-2 w-4 pb-1"></i>
            <span class="variable-font-medium">@lang('Clients'):</span>
            <span class="mr-2 text-gray-500">جواد نوراللهی ، محمدرضا احمدی</span>
        </div>
        <div class="flex items-start text-sm text-gray-700 mt-4 mb-2 cursor-default">
            <i class="fal fa-comment-alt-lines ml-2 w-4"></i>
            <span class="variable-font-medium">@lang('Therapists')</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
            <a href="{{$room->route('show')}}" class="inline-flex items-center group">
                <div class="flex justify-center items-center flex-shrink-0 w-6 h-6 rounded-full overflow-hidden ml-2 bg-gray-200 text-gray-800 text-xs">
                    @avatarOrName($room->manager)
                </div>
                <div class="flex items-center">
                    <div class="font-medium text-sm text-gray-500 group-hover:text-blue-600">@displayName($room->manager)</div>
                </div>
            </a>
        </div>
        <div class="flex items-center flex-wrap text-sm text-gray-700 mt-4 mb-2 cursor-default">
            <i class="fal fa-street-view ml-2 w-4"></i>
            <span class="variable-font-medium break-normal">@lang('بستر جلسه'):</span>
            <span class="flex items-center bg-gray-100 text-gray-500 px-4 py-1 rounded mr-2 mt-2 sm:mt-0">انتخاب به عهده مراجع (مجازی): واتساپ</span>
        </div>
    </div>
    <div class="p-4 border border-gray-300 rounded grid grid-cols-2 gap-2">
        <div class="grid grid-cols-1 grid-rows-4 gap-4 lg:gap-2">
            <div class="flex items-start text-sm text-gray-700">
                <i class="fal fa-credit-card ml-2 w-4 pb-1"></i>
                <span class="variable-font-medium">نوع پرداخت</span>
            </div>
            <div class="flex items-start text-sm text-gray-700">
                <i class="fal fa-user-tag ml-2 w-4 pb-1"></i>
                <span class="variable-font-medium">نوع مراجعین درخواست دهنده</span>
            </div>
            <div class="flex items-start text-sm text-gray-700">
                <i class="fal fa-stopwatch ml-2 w-4"></i>
                <span class="variable-font-medium">زمان شروع نوبت‌گیری</span>
            </div>
            <div class="flex items-start text-sm text-gray-700">
                <i class="fal fa-times-circle ml-2 w-4"></i>
                <span class="variable-font-medium">زمان بستن نوبت‌گیری</span>
            </div>
        </div>
        <div class="grid grid-cols-1 grid-rows-4 gap-4 lg:gap-2">
            <div class="text-sm text-gray-500">نقدی</div>
            <div class="text-sm text-gray-500">اعضاء ریسلو</div>
            <div class="text-sm text-gray-500">سه‌شنبه، 19 مرداد 1400 - ساعت 18:30</div>
            <div class="text-sm text-gray-500">پنج‌شنبه، 21 مرداد 1400 - ساعت 12:00</div>
        </div>
    </div>
</div>