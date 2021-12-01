@extends($layouts->dashboard)

@section('content')
    <div>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-1 hidden lg:block"></div>
            <div class="col-span-full sm:col-span-5 lg:col-span-3 flex flex-col">
                <div class="relative bg-green-50 rounded-lg flex flex-col items-center justify-center pt-7 pb-5">
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
                                    <a href="#" target="_blank" class="flex items-center">
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
                <div class="relative copied-container">
                    <button data-clipboard-text="{{ $gift->code }}" class="w-full flex flex-col items-center justify-center border-2 border-green-600 border-dashed bg-green-50 rounded-lg mt-1 p-2 pt-1 h-16 text-center focus-current ring-green-300">
                        {{-- <span class="block dir-ltr en text-xs text-gray-500">{{ $gift->region->id }}-</span> --}}
                        <h4 class="font-bold en text-2xl text-center text-green-600">{{ substr($gift->code, 10) }}</h4>
                        <span class="block text-xs text-gray-400">برای کپی کردن کد، کلیک کنید</span>
                    </button>
                    <div class="copied-tooltip absolute right-1/2 transform translate-x-1/2 -top-6">@lang('کپی شد')</div>
                </div>
            </div>
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
                        @if ($gift->users->total())
                            @include('layouts.quick_search')
                        @endif
                        <a href="#" title="@lang('افزودن کاربر')" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 hover:bg-green-50 hover:bg-opacity-20 rounded-full transition mr-4 focus-current ring-green-700">
                            <i class="fal fa-plus sm:ml-2"></i>
                            <span class="hidden sm:inline">@lang('افزودن کاربر')</span>
                        </a>
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
                    @foreach ($gift->users as $user)
                        <div class="flex items-center bg-gray-50 hover:bg-gray-100 transition py-2 p-2 rounded mt-2">
                            <div class="flex-1 flex flex-col sm:flex-row sm:items-center px-2 cursor-default">
                                <div class="flex items-center text-gray-600 text-xs">
                                    <i class="fal fa-user text-sm ml-2 sm:hidden"></i>
                                    <span>{{ $user->ghost->name ?: $user->ghost->mobile }}</span>
                                </div>
                                <div class="mt-1 flex items-center sm:hidden text-gray-600 text-xs">
                                    <span>تعداد استفاده: </span>
                                    <span class="variable-font-medium mr-2">{{ $user->usage_count }}</span>
                                </div>
                                <div class="mt-1 flex items-center sm:hidden text-gray-600 text-xs">
                                    <span>آخرین استفاده: </span>
                                    <span class="variable-font-medium mr-2 dir-ltr text-right">
                                        @if ($user->used_at)
                                            @time($user->used_at, 'Y/m/d H:i')
                                        @endif
                                    </span>
                                </div>
                                <div class="mt-1 flex items-center sm:hidden text-xs">
                                    <span>وضعیت:</span>
                                    @if (!$user->used_at)
                                        <span class="variable-font-medium mr-2 dir-ltr text-right text-gray-600">استفاده نشده</span>
                                    @elseif($user->status == 'open')
                                        <span class="variable-font-medium mr-2 dir-ltr text-right text-green-600">فعال</span>
                                    @elseif($user->status == 'expires')
                                        <span class="variable-font-medium mr-2 dir-ltr text-right text-red-600">منقضی شده</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex-1 px-2 cursor-default text-gray-600 text-xs hidden sm:block">{{ $user->usage_count }}</div>
                            <div class="flex-1 px-2 cursor-default text-gray-600 text-xs dir-ltr text-right hidden sm:block">
                                @if ($user->used_at)
                                    @time($user->used_at, 'Y/m/d H:i')
                                @endif
                            </div>
                            <div class="flex-1 px-2 cursor-default text-xs hidden sm:block">
                                @if (!$user->used_at)
                                    <span class="text-green-600">@lang('فعال')</span>
                                    @elseif($user->status == 'open')
                                    <span class="text-gray-600">@lang('استفاده نشده')</span>
                                @elseif($user->status == 'expires')
                                    <span class="text-red-600">@lang('منقضی شده')</span>
                                @endif
                            </div>
                            <div class="w-12 px-2 dir-ltr text-left relative dropdown">
                                <button class="dropdown-toggle text-gray-600 hover:text-red-600 transition w-6 h-6 rounded-full flex items-center justify-center focus-current ring-red-600">
                                    <i class="fal fa-trash-alt text-sm"></i>
                                </button>
                                <div class="dropdown-menu absolute w-60 left-10 top-1/2 transform -translate-y-1/2 bg-white rounded-md shadow-md p-3 z-50">
                                    <div class="flex flex-col items-center justify-center">
                                        <span class="text-sm text-gray-700 cursor-default">از حذف این کاربر مطمئن هستید؟</span>
                                        <div class="flex items-center text-xs mt-3">
                                            <button class="flex items-center bg-gray-100 text-gray-600 hover:bg-gray-200 transition rounded-full h-7 px-8 focus-current ring-gray-600 mr-2">@lang('انصراف')</button>
                                            <button class="flex items-center bg-red-600 text-white hover:bg-red-700 transition rounded-full h-7 px-8 focus-current ring-red-600">@lang('حذف')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if (method_exists($gift->users, 'links'))
                        {{ method_exists($gift->users, 'links') ? $gift->users->links() : null }}
                    @endif
                </div>
            </div>
            <div class="hidden lg:block col-span-1"></div>
        </div>
    </div>
@endsection
