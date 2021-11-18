@section('main')
    <main id="main" class="flex-1 flex flex-col bg-white">
        @if (config('app.env') == 'local')
            <a href="https://risloo.ir/" class="direct w-full inline-flex items-center justify-center bg-red-600 py-2 px-4 hover:shadow-md transition">
                <i class="fad fa-tools text-lg text-white ml-2"></i>
                <div>
                    <span class="text-sm text-white">شما هم‌اکنون در نسخه آزمایشی هستید؛</span>
                    <span class="text-xs variable-font-light text-opacity-85 text-white mr-0.5">جهت انتقال به نسخه اصلی کلیک کنید.</span>
                </div>
            </a>
        @endif
        @include('layouts.header')
        @include('layouts.content')
    </main>
@endsection
