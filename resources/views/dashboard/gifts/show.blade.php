@extends($layouts->dashboard)

@section('content')
    <div>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-1 hidden lg:block"></div>
            <div class="col-span-full sm:col-span-5 lg:col-span-3 flex flex-col">
                <div class="relative bg-green-50 rounded-lg flex flex-col items-center justify-center pt-8 pb-5">
                    <div class="absolute left-2 top-2">
                        <div class="relative">
                            <div>
                                <button class="text-lg text-gray-600 hover:bg-white focus:bg-white transition flex items-center justify-center w-8 h-8 rounded-lg focus-current ring-gray-500"><i class="fal fa-share-alt"></i></a>
                            </div>
                            <div class="absolute w-56 left-0 top-9 bg-white rounded-md shadow-md flex flex-col z-50 divide-y divide-gray-200">
                                <a href="#" class="flex items-center text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-green-500 transition px-3 py-2">
                                    <i class="fab fa-whatsapp text-lg"></i>
                                    <span class="mr-2 text-sm pt-0.5">واتس‌اپ</span>
                                </a>
                                <a href="#" class="flex items-center text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-blue-500 transition px-3 py-2">
                                    <i class="fal fa-paper-plane"></i>
                                    <span class="mr-2 text-sm pt-0.5">تلگرام</span>
                                </a>
                                <a href="#" class="flex items-center text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-pink-500 transition px-3 py-2">
                                    <i class="fab fa-instagram text-lg"></i>
                                    <span class="mr-2 text-sm pt-0.5">اینستاگرام</span>
                                </a>
                                <a href="#" target="_blank" class="flex items-center justify-between text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-brand transition px-3 py-2">
                                    <div class="flex items-center">
                                        <i class="fal fa-badge-percent text-lg"></i>
                                        <span class="mr-2 text-sm pt-0.5">صفحه کد تخفیف</span>
                                    </div>
                                    <button class="h-6 px-2 text-xs text-gray-500 border border-gray-200 hover:border-brand hover:text-brand transition rounded-full focus">@lang('کپی لینک')</button>
                                </a>
                                <a href="#" target="_blank" class="flex items-center justify-between text-gray-500 hover:bg-gray-50 hover:bg-opacity-50 hover:text-gray-900 transition px-3 py-2">
                                    <div class="flex items-center">
                                        <i class="fal fa-image-polaroid text-lg"></i>
                                        <span class="mr-2 text-sm pt-0.5">عکس کد تخفیف</span>
                                    </div>
                                    <button class="h-6 px-2 text-xs text-gray-500 border border-gray-200 hover:border-brand hover:text-brand transition rounded-full focus">@lang('کپی لینک')</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <i class="fal fa-gift text-green-600 text-5xl"></i>
                    <div class="cursor-default text-center mt-2">
                        <span class="text-xs text-gray-600">@lang('Gift')</span>
                        <h3 class="variable-font-bold text-gray-800">یلدا 1400</h3>
                    </div>
                    <div class="flex items-center mt-2">
                        {{-- <span class="text-2xl variable-font-bold text-green-700 cursor-default">15%</span> --}}
                        <span class="text-2xl variable-font-bold text-green-700 cursor-default">25,000</span>
                        <span class="text-sm variable-font-semibold text-green-700 cursor-default mr-1">تومان</span>
                    </div>
                </div>
                <a href="#" class="flex flex-col items-center justify-center border-2 border-green-600 border-dashed bg-green-50 rounded-lg mt-1 p-2 h-16 text-center">
                    <span class="block dir-ltr en text-xs text-gray-500">RS966666Q-</span>
                    <h4 class="font-bold en text-xl text-center text-green-600">96654TD3NH</h4>
                </a>
                <span class="block mt-2 text-xs text-center text-gray-400 cursor-default">برای کپی کردن، روی کد کلیک کنید</span>
            </div>
            <div class="col-span-full sm:col-span-7 lg:col-span-5 flex flex-col">
                <div class="bg-gray-100 bg-opacity-50 border border-gray-200 rounded-lg p-4">
                    <div class="grid grid-cols-2 gap-4 cursor-default">
                        <div>
                            <span class="block text-xs text-gray-500">تاریخ شروع اعتبار</span>
                            <span class="block text-gray-700 variable-font-medium mt-1">1400/09/06</span>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">تاریخ انقضا</span>
                            <i class="far fa-infinity text-xs text-gray-700 variable-font-medium mt-2" title="@lang('نامحدود')"></i>
                            {{-- <span class="block text-gray-700 variable-font-medium mt-1">1400/09/06</span> --}}
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">تعداد مجاز</span>
                            <i class="far fa-infinity text-xs text-gray-700 variable-font-medium mt-2" title="@lang('نامحدود')"></i>
                            {{-- <span class="block text-gray-700 variable-font-medium mt-1">1400/09/06</span> --}}
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">تعداد استفاده شده</span>
                            <span class="block text-gray-700 variable-font-medium mt-1">2</span>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">تعداد کاربران استفاده کننده</span>
                            <span class="block text-gray-700 variable-font-medium mt-1">5</span>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">کاربر خاص</span>
                            <span class="block text-gray-700 variable-font-medium mt-1">دارد</span>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">تعداد استفاده توسط هر کاربر</span>
                            {{-- <span class="block text-sm text-gray-700 variable-font-medium mt-1.5">فقط یک‌بار</span> --}}
                            <span class="block text-sm text-gray-700 variable-font-medium mt-1.5">بیش از یک‌بار</span>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">وضعیت</span>
                            {{-- <span class="block text-sm text-green-600 variable-font-medium mt-1.5">فعال</span> --}}
                            <span class="block text-sm text-yellow-500 variable-font-medium mt-1.5">در انتظار</span>
                            {{-- <span class="block text-sm text-red-600 variable-font-medium mt-1.5">منقضی شده</span> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block lg:col-span-2 space-y-3">
                <a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-blue-600 hover:border-blue-600 hover:bg-blue-50 hover:bg-opacity-20 transition h-14">
                    <i class="fal fa-edit"></i>
                    <span class="text-sm mr-3 pt-0.5">@lang('ویرایش کد تخفیف')</span>
                </a>
                <div class="relative">
                    <a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-purple-600 hover:border-purple-600 hover:bg-purple-50 hover:bg-opacity-20 transition h-14 gift-change-link-ring">
                        <i class="far fa-exchange"></i>
                        <span class="text-sm mr-3 pt-0.5">@lang('تغییر کد و لینک')</span>
                    </a>
                    <div class="absolute w-56 left-0 top-16 bg-white rounded-md shadow-md px-2 py-4 flex flex-col items-center justify-center z-50">
                        <span class="text-sm text-gray-700 cursor-default text-center">از تغییر عبارت کد تخفیف و لینک آن مطمئن هستید؟</span>
                        <div class="flex flex-col justify-center text-xs mt-3">
                            <button class="flex items-center bg-purple-600 text-white hover:bg-purple-700 transition rounded-full h-7 px-8 focus-current ring-purple-600">@lang('تغییر کد')</button>
                            <button class="flex items-center bg-gray-100 text-gray-600 hover:bg-gray-200 transition rounded-full h-7 px-8 focus-current ring-gray-600 mt-2">@lang('انصراف')</button>
                        </div>
                    </div>
                </div>
                <a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-green-600 hover:border-green-600 hover:bg-green-50 hover:bg-opacity-20 transition h-14">
                    <i class="fal fa-layer-plus text-lg"></i>
                    <span class="text-sm mr-3 pt-0.5">@lang('کد تخفیف جدید')</span>
                </a>
                <a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-pink-500 hover:border-pink-500 hover:bg-pink-50 hover:bg-opacity-20 transition h-14">
                    <i class="fal fa-badge-percent text-lg"></i>
                    <span class="text-sm mr-3 pt-0.5">@lang('کدهای تخفیف')</span>
                </a>
            </div>
            <div class="col-span-1 hidden lg:block"></div>
        </div>

        <div class="lg:hidden grid grid-cols-1 xs:grid-cols-2 md:grid-cols-4 gap-4 mt-6">
            <a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-blue-600 hover:border-blue-600 hover:bg-blue-50 hover:bg-opacity-20 transition h-14">
                <i class="fal fa-edit"></i>
                <span class="text-sm mr-3 pt-0.5">@lang('ویرایش کد تخفیف')</span>
            </a>
            <div class="relative">
                <a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-purple-600 hover:border-purple-600 hover:bg-purple-50 hover:bg-opacity-20 transition h-14 gift-change-link-ring">
                    <i class="far fa-exchange"></i>
                    <span class="text-sm mr-3 pt-0.5">@lang('تغییر کد و لینک')</span>
                </a>
                <div class="absolute w-full left-0 top-16 bg-white rounded-md shadow-md px-2 py-4 flex flex-col items-center justify-center z-50">
                    <span class="text-sm text-gray-700 cursor-default text-center">از تغییر عبارت کد تخفیف و لینک آن مطمئن هستید؟</span>
                    <div class="flex flex-col justify-center text-xs mt-3">
                        <button class="flex items-center bg-purple-600 text-white hover:bg-purple-700 transition rounded-full h-7 px-8 focus-current ring-purple-600">@lang('تغییر کد')</button>
                        <button class="flex items-center bg-gray-100 text-gray-600 hover:bg-gray-200 transition rounded-full h-7 px-8 focus-current ring-gray-600 mt-2">@lang('انصراف')</button>
                    </div>
                </div>
            </div>
            <a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-green-600 hover:border-green-600 hover:bg-green-50 hover:bg-opacity-20 transition h-14">
                <i class="fal fa-layer-plus text-lg"></i>
                <span class="text-sm mr-3 pt-0.5">@lang('کد تخفیف جدید')</span>
            </a>
            <a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-pink-500 hover:border-pink-500 hover:bg-pink-50 hover:bg-opacity-20 transition h-14">
                <i class="fal fa-badge-percent text-lg"></i>
                <span class="text-sm mr-3 pt-0.5">@lang('کدهای تخفیف')</span>
            </a>
        </div>

        <div class="grid grid-cols-12 gap-4">
            <div class="hidden lg:block col-span-1"></div>
            <div class="col-span-full lg:col-span-10">
                <div class="mt-8 mb-2">
                    <h3 class="heading mb-4" data-total="(5)">کاربران استفاده کننده</h3>
                    <div class="flex justify-between items-center flex-wrap mb-4">
                        {{-- @if ($gifts->total()) --}}
                            @include('layouts.quick_search')
                        {{-- @endif --}}
                        {{-- @can('create', [App\Gift::class, $region]) --}}
                            <a href="#" title="@lang('افزودن کاربر')" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 hover:bg-green-50 hover:bg-opacity-20 rounded-full transition mr-4 focus-current ring-green-700">
                                <i class="fal fa-plus sm:ml-2"></i>
                                <span class="hidden sm:inline">@lang('افزودن کاربر')</span>
                            </a>
                        {{-- @endcan --}}
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
                    <div class="flex items-center bg-gray-50 hover:bg-gray-100 transition py-2 p-2 rounded mt-2 delete-ring">
                        <div class="flex-1 flex flex-col sm:flex-row sm:items-center px-2 cursor-default">
                            <div class="flex items-center text-gray-600 text-xs">
                                <i class="fal fa-user text-sm ml-2 sm:hidden"></i>
                                <span>محمدعلی نخلی</span>
                            </div>
                            <div class="mt-1 flex items-center sm:hidden text-gray-600 text-xs">
                                <span>تعداد استفاده: </span>
                                <span class="variable-font-medium mr-2">2</span>
                            </div>
                            <div class="mt-1 flex items-center sm:hidden text-gray-600 text-xs">
                                <span>آخرین استفاده: </span>
                                <span class="variable-font-medium mr-2 dir-ltr text-right">1400/09/06 - 23:14</span>
                            </div>
                            <div class="mt-1 flex items-center sm:hidden text-xs">
                                <span>وضعیت:</span>
                                {{-- <span class="variable-font-medium mr-2 dir-ltr text-right text-green-600">فعال</span> --}}
                                <span class="variable-font-medium mr-2 dir-ltr text-right text-gray-600">استفاده نشده</span>
                                {{-- <span class="variable-font-medium mr-2 dir-ltr text-right text-red-600">منقضی شده</span> --}}
                            </div>
                        </div>
                        <div class="flex-1 px-2 cursor-default text-gray-600 text-xs hidden sm:block">2</div>
                        <div class="flex-1 px-2 cursor-default text-gray-600 text-xs dir-ltr text-right hidden sm:block">1400/09/06 - 23:14</div>
                        <div class="flex-1 px-2 cursor-default text-xs hidden sm:block">
                            {{-- <span class="text-green-600">@lang('فعال')</span> --}}
                            <span class="text-gray-600">@lang('استفاده نشده')</span>
                            {{-- <span class="text-red-600">@lang('منقضی شده')</span> --}}
                        </div>
                        <div class="w-12 px-2 dir-ltr text-left relative">
                            <button class="text-gray-600 hover:text-red-600 transition w-6 h-6 rounded-full flex items-center justify-center focus-current ring-red-600 focus:text-red-600">
                                <i class="fal fa-trash-alt text-sm"></i>
                            </button>
                            <div class="absolute w-60 left-10 top-1/2 transform -translate-y-1/2 bg-white rounded-md shadow-md p-3 flex flex-col items-center justify-center z-50">
                                <span class="text-sm text-gray-700 cursor-default">از حذف این کاربر مطمئن هستید؟</span>
                                <div class="flex items-center text-xs mt-3">
                                    <button class="flex items-center bg-gray-100 text-gray-600 hover:bg-gray-200 transition rounded-full h-7 px-8 focus-current ring-gray-600 mr-2">@lang('انصراف')</button>
                                    <button class="flex items-center bg-red-600 text-white hover:bg-red-700 transition rounded-full h-7 px-8 focus-current ring-red-600">@lang('حذف')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @if (method_exists($gifts, 'links'))
                        {{ method_exists($gifts, 'links') ? $gifts->links() : null }}
                    @endif --}}
                </div>
            </div>
            <div class="hidden lg:block col-span-1"></div>
        </div>
    </div>
@endsection