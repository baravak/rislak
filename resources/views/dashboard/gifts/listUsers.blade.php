<div data-xhr="listUsers">
    @if ($gift->users && $gift->users->count())
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
                    @if ($user->used_at && $user->status == 'open')
                        <span class="text-green-600">@lang('فعال')</span>
                    @elseif($user->status == 'open')
                        <span class="text-gray-600">@lang('استفاده نشده')</span>
                    @elseif($user->status == 'expires')
                        <span class="text-red-600">@lang('منقضی شده')</span>
                    @endif
                </div>
                <div class="w-12 px-2 dir-ltr text-left">
                    @if (!$user->used_at)
                        <div class="relative dropdown">
                            <button class="dropdown-toggle text-gray-600 hover:text-red-600 transition w-6 h-6 rounded-full flex items-center justify-center focus-current ring-red-600">
                                <i class="fal fa-trash-alt text-sm"></i>
                            </button>
                            <div class="dropdown-menu absolute w-60 left-10 top-1/2 transform -translate-y-1/2 bg-white rounded-md shadow-md p-3 z-50">
                                <div class="flex flex-col items-center justify-center">
                                    <span class="text-sm text-gray-700 cursor-default">از حذف این کاربر مطمئن هستید؟</span>
                                    <div class="flex items-center text-xs mt-3">
                                        <button class="flex items-center bg-gray-100 text-gray-600 hover:bg-gray-200 transition rounded-full h-7 px-8 focus-current ring-gray-600 mr-2 single-click">@lang('انصراف')</button>
                                        <button class="flex items-center bg-red-600 text-white hover:bg-red-700 transition rounded-full h-7 px-8 focus-current ring-red-600" data-lijax="" data-method="DELETE" data-action="{{ route('dashboard.gifts.deleteUser', [$gift->region->id, $gift->id]) }}" data-name="user" data-value="{{ $user->ghost->id }}">@lang('حذف')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif ($gift->status != 'expires' && $gift->disposable && $user->status == 'expires')
                            <div class="relative dropdown">
                                <button class="dropdown-toggle text-gray-600 hover:text-green-600 transition w-6 h-6 rounded-full flex items-center justify-center focus-current ring-green-600" title="@lang('فعال شود')">
                                    <i class="fal fa-calendar-check"></i>
                                </button>
                                <div class="dropdown-menu absolute w-60 left-10 top-1/2 transform -translate-y-1/2 bg-white rounded-md shadow-md p-3 z-50">
                                    <div class="flex flex-col items-center justify-center">
                                        <span class="text-sm text-gray-700 text-center cursor-default">از فعال کردن وضعیت این کاربر مطمئن هستید؟</span>
                                        <div class="flex items-center text-xs mt-3">
                                            <button class="flex items-center bg-gray-100 text-gray-600 hover:bg-gray-200 transition rounded-full h-7 px-4 focus-current ring-gray-600 mr-2 single-click">@lang('انصراف')</button>
                                            <button class="flex items-center bg-green-600 text-white hover:bg-green-700 transition rounded-full h-7 px-8 focus-current ring-green-600" data-lijax="" data-method="PUT" data-action="{{ route('dashboard.gifts.updateUser', [$gift->region->id, $gift->id]) }}" data-merge='{"status" : "open"}' data-name="user" data-value="{{ $user->ghost->id }}">@lang('فعال شود')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @elseif($user->status == 'open')
                        <div class="relative dropdown">
                            <button class="dropdown-toggle text-gray-600 hover:text-red-600 transition w-6 h-6 rounded-full flex items-center justify-center focus-current ring-red-600" title="@lang('منقضی شود')">
                                <i class="fal fa-calendar-times"></i>
                            </button>
                            <div class="dropdown-menu absolute w-60 left-10 top-1/2 transform -translate-y-1/2 bg-white rounded-md shadow-md p-3 z-50">
                                <div class="flex flex-col items-center justify-center">
                                    <span class="text-sm text-gray-700 text-center cursor-default">از منقضی کردن وضعیت این کاربر مطمئن هستید؟</span>
                                    <div class="flex items-center text-xs mt-3">
                                        <button class="flex items-center bg-gray-100 text-gray-600 hover:bg-gray-200 transition rounded-full h-7 px-4 focus-current ring-gray-600 mr-2 single-click">@lang('انصراف')</button>
                                        <button class="flex items-center bg-red-600 text-white hover:bg-red-700 transition rounded-full h-7 px-8 focus-current ring-red-600" data-lijax="" data-method="PUT" data-action="{{ route('dashboard.gifts.updateUser', [$gift->region->id, $gift->id]) }}" data-merge='{"status" : "expires"}' data-name="user" data-value="{{ $user->ghost->id }}">@lang('منقضی شود')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                </div>
        @endforeach
    @else
        <div class="flex items-center justify-center bg-gray-50 transition py-4 p-2 rounded mt-2 text-sm text-gray-400 cursor-default">
            @lang('کاربری موجود نیست')
        </div>
    @endif
    @if (method_exists($gift->users, 'links'))
        {{ method_exists($gift->users, 'links') ? $gift->users->links() : null }}
    @endif
</div>
