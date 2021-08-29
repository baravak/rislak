<div class="mt-8">
    <div class="flex items-center flex-wrap cursor-default mb-2">
        <h3 class="text-gray-900 variable-font-semibold">@lang('Therapy session') {{ $session->id }}</h3>
        @if ($session->group_session)
            <span class="flex items-center text-xs bg-gray-200 text-gray-600 rounded px-2 h-5 mr-2 relative -top-0.5 sm:-top-2.5">@lang('Group session')</span>
        @endif
    </div>
    <div class="text-sm text-gray-500 mb-2 cursor-default">{{ $session->description }}</div>
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <div class="flex h-2 w-2 relative">
                <span class="absolute animate-ping inline-flex h-full w-full rounded-full bg-brand opacity-80"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-brand"></span>
            </div>
            <div class="text-brand text-xs cursor-default mr-2">{{ __(ucfirst($session->status)) }}</div>
        </div>
        <div>
            @can ('update', [\App\Session::class, $session])
                <a href="{{ route('dashboard.sessions.edit', $session->id)}}" class="inline-flex items-center justify-center text-gray-600 border rounded-full border-gray-400 hover:bg-gray-100 transition sm:px-4 h-10 sm:h-8 w-10 sm:w-auto" title="@lang('Edit')">
                    <span class="text-xs hidden sm:block">@lang('Edit')</span>
                    <i class="fal fa-edit sm:hidden"></i>
                </a>
            @endcan
            @isset($case)
                @can('manager', $case)
                    <a href="{{ route('dashboard.client-reports.index', $session->id) }}" class="inline-flex items-center justify-center text-brand border border-brand hover:bg-brand hover:text-white transition rounded-full sm:px-4 h-10 sm:h-8 w-10 sm:w-auto" title="@lang('Reports of session')">
                        <span class="text-xs hidden sm:block">@lang('Reports of session')</span>
                        <i class="fal fa-file-alt sm:hidden"></i>
                    </a>
                @endif
            @endisset
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-4 mt-4">
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
        @if ($session->clients)
            <div class="flex items-start text-sm text-gray-700 mt-4 cursor-default">
                <i class="fal fa-user ml-2 w-4 pb-1"></i>
                <span class="variable-font-medium">@lang('Clients'):</span>
                <span class="mr-2 text-gray-500">{{ $session->clients->pluck('name')->join(' ، ') }}</span>
            </div>
        @endif

        <div class="flex items-start text-sm text-gray-700 mt-4 cursor-default">
            <i class="fal fa-pen-alt ml-2 w-4 pb-1"></i>
            <span class="variable-font-medium">@lang('محور'):</span>
            <span class="mr-2 text-gray-500">استرس‌های متداول</span>
        </div>

        @if (false)
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
        @endif

        <div class="flex items-center flex-wrap text-sm text-gray-700 mt-4 mb-2 cursor-default">
            <i class="fal fa-street-view ml-2 w-4"></i>
            <span class="variable-font-medium break-normal">@lang('بستر جلسه'):</span>

            {{-- ↓ ↓ ↓ در حالت ثابت ↓ ↓ ↓ --}}
            <div class="flex items-center flex-wrap leading-8 sm:leading-normal">
                <span class="flex items-center text-gray-500 mr-2">تماس تلفنی</span>
                <span class="flex items-center text-gray-500 mx-2">|</span>
                {{-- <span class="flex items-center text-gray-500">تهران، میدان آزادی، خیابان اندیشه، کوچه 40، ساختمان طلیعه سلامت</span> --}}
                {{-- <a href="#" target="_blank" class="flex items-center text-blue-500 underline hover:text-blue-600">https://meet.google.com/nxo-jcjn-xsq</a> --}}
                <a href="tel:+989123456789" class="flex items-center text-blue-500 underline hover:text-blue-600 dir-ltr direct">09123456789</a>
            </div>

            {{-- ↓ ↓ ↓ در حالت دراپ داون ↓ ↓ ↓ --}}
            {{-- <select name="" id="" class="mt-2 sm:mt-0 w-full sm:w-auto border border-gray-300 rounded h-8 text-xs lijax mr-2">
                <option>تماس تلفنی | 09123456789</option>
                <option>حضوری | تهران، میدان آزادی، خیابان اندیشه، کوچه 40، ساختمان طلیعه سلامت</option>
                <option>آنلاین | https://meet.google.com/nxo-jcjn-xsq</option>
            </select> --}}
        </div>


    </div>
    <div class="p-4 border border-gray-300 rounded hidden xl:grid grid-cols-2 gap-2">
        <div class="grid grid-cols-1 grid-rows-4 gap-4 lg:gap-2">
            @if($session->payment_status)
                <div class="flex items-start text-sm text-gray-700">
                    <i class="fal fa-credit-card ml-2 w-4 pb-1"></i>
                    <span class="variable-font-medium text-xs">نوع پرداخت</span>
                </div>
            @endif
            @if($session->clients_type)
                <div class="flex items-start text-sm text-gray-700">
                    <i class="fal fa-user-tag ml-2 w-4 pb-1"></i>
                    <span class="variable-font-medium text-xs">نوع مراجعین درخواست دهنده</span>
                </div>
            @endif
            @if($session->opens_at)
                <div class="flex items-start text-sm text-gray-700">
                    <i class="fal fa-stopwatch ml-2 w-4"></i>
                    <span class="variable-font-medium text-xs">زمان شروع نوبت‌گیری</span>
                </div>
            @endif
            @if($session->closed_at)
                <div class="flex items-start text-sm text-gray-700">
                    <i class="fal fa-times-circle ml-2 w-4"></i>
                    <span class="variable-font-medium text-xs">زمان بستن نوبت‌گیری</span>
                </div>
            @endif
        </div>
        <div class="grid grid-cols-1 grid-rows-4 gap-4 lg:gap-2">
            @if($session->payment_status)
                <div class="text-xs text-gray-500">@lang($session->payment_status)</div>
            @endif
            @if($session->clients_type)
                <div class="text-xs text-gray-500">@lang(ucfirst($session->clients_type))</div>
            @endif
            @if($session->opens_at)
                <div class="text-xs text-gray-500">@time($session->opens_at, '%A %d %B %y ساعت H:i')</div>
            @endif
            @if($session->closed_at)
                <div class="text-xs text-gray-500">@time($session->closed_at, '%A %d %B %y ساعت H:i')</div>
            @endif
        </div>
    </div>
</div>