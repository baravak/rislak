@extends($layouts->dashboard)

@section('content')
    <div>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-1"></div>
            <div class="col-span-3 flex flex-col">
                <div class="relative bg-green-50 rounded-lg flex flex-col items-center justify-center pt-8 pb-4">
                    <a href="#" class="absolute left-2 top-2 text-lg text-gray-600 hover:bg-white transition flex items-center justify-center w-8 h-8 rounded-lg"><i class="fal fa-share-alt"></i></a>
                    <i class="fal fa-gift text-green-600 text-5xl"></i>
                    <div class="cursor-default text-center mt-2">
                        <span class="text-xs text-gray-600">@lang('Gift')</span>
                        <h3 class="variable-font-bold text-lg text-gray-800">یلدا 1400</h3>
                    </div>
                    <div class="flex items-center mt-2">
                        <span class="text-xl variable-font-bold text-green-700 cursor-default">25,000</span>
                        <span class="text-sm variable-font-semibold text-green-700 cursor-default mr-1">تومان</span>
                    </div>
                </div>
                <a href="#" class="flex flex-col items-center justify-center border-2 border-green-600 border-dashed bg-green-50 rounded-lg mt-1 p-2 h-16 text-center">
                    <span class="block dir-ltr en text-xs text-gray-500">RS966666Q-</span>
                    <h4 class="font-bold en text-xl text-center text-green-600">96654TD3NH</h4>
                </a>
                <span class="block mt-2 text-xs text-center text-gray-400 cursor-default">برای کپی کردن، روی کد کلیک کنید</span>
            </div>
            <div class="col-span-5 flex flex-col">
                <div class="bg-gray-100 bg-opacity-50 border border-gray-200 rounded-lg p-4">
                    <div class="grid grid-cols-2 gap-4 cursor-default">
                        <div>
                            <span class="block text-xs text-gray-500">تاریخ شروع اعتبار</span>
                            <span class="block text-gray-700 variable-font-medium mt-1">1400/09/06</span>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">تاریخ انقضا</span>
                            <i class="far fa-infinity text-xs text-gray-700 variable-font-medium mt-2" title="@lang('نامحدود')"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-gray-500">تعداد مجاز</span>
                            <i class="far fa-infinity text-xs text-gray-700 variable-font-medium mt-2" title="@lang('نامحدود')"></i>
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
                            <span class="block text-xs text-gray-500">استفاده بیش از یکبار توسط هر کاربر</span>
                            {{-- <i class="fas fa-check text-xs text-green-600 variable-font-medium mt-2"></i> --}}
                            <i class="fas fa-times text-xs text-red-600 variable-font-medium mt-2"></i>
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
            <div class="col-span-2">
                <a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-blue-600 hover:border-blue-600 hover:bg-blue-50 hover:bg-opacity-20 transition h-14">
                    <i class="fal fa-edit"></i>
                    <span class="text-sm mr-3 pt-0.5">@lang('ویرایش کد تخفیف')</span>
                </a>
                <a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-green-600 hover:border-green-600 hover:bg-green-50 hover:bg-opacity-20 transition h-14 mt-3">
                    <i class="fal fa-layer-plus"></i>
                    <span class="text-sm mr-3 pt-0.5">@lang('افزودن کد تخفیف جدید')</span>
                </a>
                <a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-pink-500 hover:border-pink-500 hover:bg-pink-50 hover:bg-opacity-20 transition h-14 mt-3">
                    <i class="fal fa-badge-percent"></i>
                    <span class="text-sm mr-3 pt-0.5">@lang('لیست کدهای تخفیف')</span>
                </a>
                <a href="#" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-purple-600 hover:border-purple-600 hover:bg-purple-50 hover:bg-opacity-20 transition h-14 mt-3">
                    <i class="fal fa-user-tag"></i>
                    <span class="text-sm mr-3 pt-0.5">@lang('افزودن کاربر به این کد')</span>
                </a>
            </div>
            <div class="col-span-1"></div>
        </div>

        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-1"></div>
            <div class="col-span-10">
                <h3 class="heading mt-8 mb-4" data-total="(5)">کاربران استفاده کننده</h3>
                <div>
                    <div class="hidden sm:flex items-center cursor-default px-2 text-xs variable-font-medium text-white bg-brand py-2 rounded">
                        <div class="flex-1 px-2">@lang('کاربر')</div>
                        <div class="flex-1 px-2">@lang('تعداد استفاده')</div>
                        <div class="flex-1 px-2">@lang('آخرین استفاده')</div>
                        <div class="flex-1 px-2">@lang('وضعیت')</div>
                        <div class="w-12 px-2"></div>
                    </div>
                    <div class="flex items-center bg-gray-50 hover:bg-gray-100 transition py-3 pb-4 sm:py-2 p-2 rounded mt-2">
                        <div class="flex-1 px-2 cursor-default text-gray-600 text-xs">محمدعلی نخلی</div>
                        <div class="flex-1 px-2 cursor-default text-gray-600 text-xs">2</div>
                        <div class="flex-1 px-2 cursor-default text-gray-600 text-xs dir-ltr text-right">1400/09/06 - 23:14</div>
                        <div class="flex-1 px-2 cursor-default text-xs">
                            {{-- <span class="text-green-600">@lang('فعال')</span> --}}
                            <span class="text-gray-600">@lang('استفاده نشده')</span>
                            {{-- <span class="text-red-600">@lang('منقضی شده')</span> --}}
                        </div>
                        <div class="w-12 px-2 dir-ltr text-left">
                            <button class="text-gray-600 hover:text-red-600 transition">
                                <i class="fal fa-trash-alt text-sm relative top-0.5"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1"></div>
        </div>
    </div>
@endsection
