@extends($layouts->dashboard)
@section('content')
    <div class="flex justify-center items-start">
        <button role="button" class="flex items-center justify-center flex-shrink-0 text-sm text-brand border border-brand hover:text-white hover:bg-brand rounded-full w-9 sm:w-auto h-9 sm:px-6 transition focus ml-2">
            <i class="fal fa-chevron-right"></i>
            <span class="hidden sm:block mr-2">هفته قبل</span>
        </button>
        <div class="relative dropdown">
            <button role="button" class="flex items-center text-sm text-gray-600 border border-gray-600 hover:bg-gray-50 rounded-full h-9 px-6 transition focus ml-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
                <span class="pt-1">۰۲/۲۵ تا ۰۳/۰۲</span>
                <i class="fal fa-chevron-down mr-2"></i>
            </button>
            <div class="mt-2 rounded bg-white border border-gray-200 shadow-lg dropdown-menu">
                <a href="#" class="dropdown-item text-sm block w-full px-1 py-2 text-center rounded text-gray-600 hover:text-brand hover:bg-gray-100 pt-2 border-b border-gray-200">۰۲/۲۵ تا ۰۳/۰۲</a>
                <a href="#" class="dropdown-item text-sm block w-full px-1 py-2 text-center rounded text-gray-600 hover:text-brand hover:bg-gray-100 pt-2 border-b border-gray-200">۰۴/۰۳ تا ۰۴/۰۹</a>
                <a href="#" class="dropdown-item text-sm block w-full px-1 py-2 text-center rounded text-gray-600 hover:text-brand hover:bg-gray-100 pt-2 border-b border-gray-200">۰۴/۱۰ تا ۰۴/۱۷</a>
            </div>
        </div>
        <button role="button" class="flex items-center justify-center flex-shrink-0 text-sm text-brand border border-brand hover:text-white hover:bg-brand rounded-full w-9 sm:w-auto h-9 sm:px-6 transition focus">
            <span class="hidden sm:block ml-2">هفته بعد</span>
            <i class="fal fa-chevron-left"></i>
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 mt-4">
        <a href="#" class=" flex flex-col justify-between border border-gray-300 hover:border-brand transition rounded focus">
            <div>
                <div class="flex flex-col items-center justify-center border-b border-gray-300 p-2">
                    <span class="text-gray-700 text-sm variable-font-semibold">شنبه</span>
                    <span class="text-gray-600 text-xs variable-font-medium">1400/02/25 - 13:30</span>
                </div>
                <div class="p-3">
                    <div class="flex items-center mb-4">
                        <div href="#" class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
                            <span>ف‌م</span>
                        </div>
                        <div class="text-xs variable-font-medium text-gray-600 mr-2">
                            <span>فاطمه مدنی</span>
                        </div>
                    </div>

                    <div class="flex items-center text-xs text-gray-500">
                        <i class="fal fa-folder ml-2"></i>
                        <span>پرونده RS966669Y</span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500 mt-2">
                        <i class="fal fa-clock ml-2"></i>
                        <span>40 دقیقه</span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500 mt-2">
                        <i class="fal fa-user-friends ml-2"></i>
                        <span>7</span>
                    </div>

                    <div class="mt-4">
                        <span class="block text-xs variable-font-medium text-gray-600 mb-2">محورهای جلسه</span>
                        <div class="bg-gray-100 p-2 rounded max-h-16 overflow-y-auto leading-snug">
                            <div class="inline text-xs text-gray-500">
                                <span>درمان وسواس</span>
                                <span class="mx-1">|</span>
                                <span>زوج درمانی</span>
                                <span class="mx-1">|</span>
                                <span>مشاوره پیش از ازدواج</span>
                                <span class="mx-1">|</span>
                                <span>خانواده درمانی</span>
                                <span class="mx-1">|</span>
                                <span>افسردگی مزمن</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center text-xs text-gray-500 px-3 pt-1 pb-3">
                <span>گروهی</span>
                <span>بسته شده</span>
            </div>
        </a>
        <a href="#" class=" flex flex-col justify-between border border-gray-300 hover:border-brand transition rounded focus">
            <div>
                <div class="flex flex-col items-center justify-center border-b border-gray-300 p-2">
                    <span class="text-gray-700 text-sm variable-font-semibold">شنبه</span>
                    <span class="text-gray-600 text-xs variable-font-medium">1400/02/25 - 13:30</span>
                </div>
                <div class="p-3">
                    <div class="flex items-center mb-4">
                        <div href="#" class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
                            <span>ف‌م</span>
                        </div>
                        <div class="text-xs variable-font-medium text-gray-600 mr-2">
                            <span>فاطمه مدنی</span>
                        </div>
                    </div>

                    <div class="flex items-center text-xs text-gray-500">
                        <i class="fal fa-folder ml-2"></i>
                        <span>پرونده RS966669Y</span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500 mt-2">
                        <i class="fal fa-clock ml-2"></i>
                        <span>40 دقیقه</span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500 mt-2">
                        <i class="fal fa-user-friends ml-2"></i>
                        <span>7</span>
                    </div>

                    <div class="mt-4">
                        <span class="block text-xs variable-font-medium text-gray-600 mb-2">محورهای جلسه</span>
                        <div class="bg-gray-100 p-2 rounded max-h-16 overflow-y-auto leading-snug">
                            <div class="inline text-xs text-gray-500">
                                <span>درمان وسواس</span>
                                <span class="mx-1">|</span>
                                <span>زوج درمانی</span>
                                <span class="mx-1">|</span>
                                <span>مشاوره پیش از ازدواج</span>
                                <span class="mx-1">|</span>
                                <span>خانواده درمانی</span>
                                <span class="mx-1">|</span>
                                <span>افسردگی مزمن</span>
                                <span class="mx-1">|</span>
                                <span>زوج درمانی</span>
                                <span class="mx-1">|</span>
                                <span>مشاوره پیش از ازدواج</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center text-xs text-gray-500 px-3 pt-1 pb-3">
                <span></span>
                <span>در انتظار تشکیل جلسه</span>
            </div>
        </a>
        <a href="#" class=" flex flex-col justify-between border border-gray-300 hover:border-brand transition rounded focus opacity-60 bg-gray-50">
            <div>
                <div class="flex flex-col items-center justify-center border-b border-gray-300 p-2">
                    <span class="text-gray-700 text-sm variable-font-semibold">یک‌شنبه</span>
                    <span class="text-gray-600 text-xs variable-font-medium">1400/02/26 - 09:30</span>
                </div>
                <div class="p-3">
                    <div class="flex items-center mb-4">
                        <div href="#" class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
                            <span>ف‌م</span>
                        </div>
                        <div class="text-xs variable-font-medium text-gray-600 mr-2">
                            <span>فاطمه مدنی</span>
                        </div>
                    </div>

                    <div class="flex items-center text-xs text-gray-500">
                        <i class="fal fa-folder ml-2"></i>
                        <span>پرونده RS966669Y</span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500 mt-2">
                        <i class="fal fa-clock ml-2"></i>
                        <span>40 دقیقه</span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500 mt-2">
                        <i class="fal fa-user-friends ml-2"></i>
                        <span>7</span>
                    </div>

                    <div class="mt-4">
                        <span class="block text-xs variable-font-medium text-gray-600 mb-2">محورهای جلسه</span>
                        <div class="bg-gray-100 p-2 rounded max-h-16 overflow-y-auto leading-snug">
                            <div class="inline text-xs text-gray-500">
                                <span>درمان وسواس</span>
                                <span class="mx-1">|</span>
                                <span>زوج درمانی</span>
                                <span class="mx-1">|</span>
                                <span>مشاوره پیش از ازدواج</span>
                                <span class="mx-1">|</span>
                                <span>خانواده درمانی</span>
                                <span class="mx-1">|</span>
                                <span>افسردگی مزمن</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center text-xs text-gray-500 px-3 pt-1 pb-3">
                <span>گروهی</span>
                <span>بسته شده</span>
            </div>
        </a>
        <a href="#" class=" flex flex-col justify-between border border-gray-300 hover:border-brand transition rounded focus">
            <div>
                <div class="flex flex-col items-center justify-center border-b border-gray-300 p-2">
                    <span class="text-gray-700 text-sm variable-font-semibold">دوشنبه</span>
                    <span class="text-gray-600 text-xs variable-font-medium">1400/02/27 - 10:00</span>
                </div>
                <div class="p-3">
                    <div class="flex items-center mb-4">
                        <div href="#" class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
                            <span>ف‌م</span>
                        </div>
                        <div class="text-xs variable-font-medium text-gray-600 mr-2">
                            <span>فاطمه مدنی</span>
                        </div>
                    </div>

                    <div class="flex items-center text-xs text-gray-500">
                        <i class="fal fa-folder ml-2"></i>
                        <span>پرونده RS966669Y</span>
                    </div>
                    <div class="flex items-center text-xs text-gray-500 mt-2">
                        <i class="fal fa-clock ml-2"></i>
                        <span>40 دقیقه</span>
                    </div>
                    {{-- <div class="flex items-center text-xs text-gray-500 mt-2">
                        <i class="fal fa-user-friends ml-2"></i>
                        <span>7</span>
                    </div> --}}

                    <div class="mt-4">
                        <span class="block text-xs variable-font-medium text-gray-600 mb-2">محورهای جلسه</span>
                        <div class="bg-gray-100 p-2 rounded max-h-16 overflow-y-auto leading-snug">
                            <div class="inline text-xs text-gray-500">
                                <span>درمان وسواس</span>
                                <span class="mx-0.5">|</span>
                                <span>زوج درمانی</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center text-xs text-gray-500 px-3 pt-1 pb-3">
                <span>گروهی</span>
                <span></span>
            </div>
        </a>
    </div>
@endsection