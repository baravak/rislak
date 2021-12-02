@extends($layouts->dashboard)

@section('content')
    <div>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-1 hidden lg:block"></div>
            @include('dashboard.gifts.shareSide')
            <div class="col-span-full sm:col-span-7 lg:col-span-5 flex flex-col">
                <div class="bg-gray-100 bg-opacity-50 border border-gray-200 rounded-lg p-4">
                    <div class="grid grid-cols-2 gap-4 cursor-default">
                        <div>
                            <span class="block text-xs text-gray-500">تاریخ شروع اعتبار</span>
                            <span class="block text-gray-700 variable-font-medium mt-1">@time($gift->started_at, 'Y/m/d')</span>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">تاریخ انقضا</span>
                            @if ($gift->expires_at)
                                <span class="block text-gray-700 variable-font-medium mt-1">@time($gift->expires_at, 'Y/m/d')</span>
                            @else
                                <i class="far fa-infinity text-xs text-gray-700 variable-font-medium mt-2" title="@lang('نامحدود')"></i>
                            @endif
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">تعداد مجاز</span>
                            @if ($gift->threshold)
                                <span class="block text-gray-700 variable-font-medium mt-1">{{ $gift->threshold }}</span>
                            @else
                                <i class="far fa-infinity text-xs text-gray-700 variable-font-medium mt-2" title="@lang('نامحدود')"></i>
                            @endif
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">تعداد استفاده شده</span>
                            <span class="block text-gray-700 variable-font-medium mt-1">{{ $gift->usage_count }}</span>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">تعداد کاربران استفاده کننده</span>
                            <span class="block text-gray-700 variable-font-medium mt-1">{{ $gift->user_count }}</span>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">کاربر خاص</span>
                            <span class="block text-gray-700 variable-font-medium mt-1">{{ $gift->exclusive ? 'دارد' : 'ندارد' }}</span>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">تعداد استفاده توسط هر کاربر</span>
                            <span class="block text-sm text-gray-700 variable-font-medium mt-1.5">{{ $gift->disposable ? 'بیش از یک‌بار' : 'فقط یک‌بار' }}</span>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">وضعیت</span>
                            @switch($gift->status)
                                @case('open')
                                    <span class="block text-sm text-green-600 variable-font-medium mt-1.5">فعال</span>
                                    @break
                                @case('awaiting')
                                    <span class="block text-sm text-yellow-500 variable-font-medium mt-1.5">در انتظار</span>
                                    @break
                                @case('expires')
                                        <span class="block text-sm text-red-600 variable-font-medium mt-1.5">منقضی شده</span>
                                    @break
                            @endswitch
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block lg:col-span-2 space-y-3">
                @include('dashboard.gifts.options')
            </div>
            <div class="col-span-1 hidden lg:block"></div>
        </div>

        <div class="lg:hidden grid grid-cols-1 xs:grid-cols-2 md:grid-cols-4 gap-4 mt-6">
            @include('dashboard.gifts.options')
        </div>

        <div class="grid grid-cols-12 gap-4">
            <div class="hidden lg:block col-span-1"></div>
            <div class="col-span-full lg:col-span-10">
                <div class="mt-8 mb-2">
                    <h3 class="heading mb-4" data-total="({{ $gift->users->total() }})">کاربران استفاده کننده</h3>
                    <div class="flex justify-between items-center flex-wrap mb-4">
                        @include('layouts.quick_search')
                        @if ($gift->status != 'expires')
                            <a href="{{ route('dashboard.gifts.appendUserForm', [$gift->region->id, $gift->id]) }}" title="@lang('افزودن کاربر')" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 hover:bg-green-50 hover:bg-opacity-20 rounded-full transition mr-4 focus-current ring-green-700">
                                <i class="fal fa-plus sm:ml-2"></i>
                                <span class="hidden sm:inline">@lang('افزودن کاربر')</span>
                            </a>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="hidden sm:flex items-center cursor-default px-2 text-xs variable-font-medium text-white bg-brand py-2 rounded">
                        <div class="flex-1 px-2">@lang('کاربر')</div>
                        <div class="flex-1 px-2">@lang('تعداد استفاده')</div>
                        <div class="flex-1 px-2">@lang('آخرین استفاده')</div>
                        <div class="flex-1 px-2">@lang('وضعیت')</div>
                        <div class="w-12 px-2"></div>
                    </div>
                    @include('dashboard.gifts.listUsers')
                </div>
            </div>
            <div class="hidden lg:block col-span-1"></div>
        </div>
    </div>
@endsection
