@section('main')
    <main id="main" class="flex-1 flex flex-col bg-white">
        @if (config('app.env') == 'local')
            <a href="https://risloo.ir/" class="direct w-full hidden xs:inline-flex items-center justify-center bg-red-600 py-2 px-4 hover:shadow-md transition">
                <i class="fad fa-tools text-lg text-white ml-2"></i>
                <div>
                    <span class="text-sm text-white">شما هم‌اکنون در نسخه آزمایشی هستید؛</span>
                    <span class="text-xs variable-font-light text-opacity-85 text-white mr-0.5">جهت انتقال به نسخه اصلی کلیک کنید.</span>
                </div>
            </a>
            <div class="px-4 mt-2 block xs:hidden">
                <a href="https://risloo.ir/" class="direct w-full inline-flex items-center bg-red-600 rounded py-2 px-4 hover:shadow-md transition">
                    <i class="fad fa-tools text-2xl text-white ml-4"></i>
                    <div class="border-r border-white border-opacity-20 pr-4">
                        <span class="hidden xs:block text-sm text-white">شما هم‌اکنون در نسخه آزمایشی هستید</span>
                        <span class="block xs:hidden text-sm text-white">شما در نسخه آزمایشی هستید</span>
                        <span class="block text-xs variable-font-light text-opacity-70 text-white text-right">جهت انتقال به نسخه اصلی کلیک کنید</span>
                    </div>
                </a>
            </div>
        @endif
        <a href="https://risloo.ir/" class="direct w-full hidden xs:inline-flex items-center justify-center bg-yellow-600 py-2 px-4 hover:shadow-md transition">
            <i class="fad fa-tools text-lg text-white ml-2"></i>
            <div>
                <span class="text-sm text-white">بنا به دستور مرجع قضایی کلیه خدمات پیامکی سرویس‌های اینترنتی ایران قطع می‌باشد</span>
            </div>
        </a>
        @include('layouts.header')
        @include('layouts.content')
    </main>
@endsection
