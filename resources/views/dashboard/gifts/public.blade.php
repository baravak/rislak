<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>کد تخفیف</title>
    <meta property="og:title" content="کد تخفیف با عنوان {{ $gift->title }}، {{ $gift->value }} {{ $gift->type == 'percent' ? 'درصدی' : 'تومانی' }} {{ $gift->region->detail->title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    @if ($gift->status != 'expires')
        <meta property="og:image" content="{{ $gift->postcard->image  }}" />
    @endif
    <link rel="stylesheet" href="@staticVersion('/css/davat.css')">
    <script src="/vendors/jquery-3.6.0.min.js"></script>
    <script src="@staticVersion('/js/sarkoot.min.js')"></script>
    <script src="@staticVersion('/js/davat.dashboard.min.js')"></script>
    <script src="@staticVersion('/js/dashboard.min.js')"></script>
</head>
<body data-page="">
    @if ($gift->status == 'expires')
        <div class="bg-gray-100 h-screen flex flex-col items-center justify-center">
            <div class="flex flex-col items-center justify-center text-gray-500 bg-white shadow-md rounded-3xl h-96 w-96">
                <span>با عرض پوزش</span>
                <span class="mt-2">.کد تخفیف مورد نظر شما، منقضی شده است</span>
            </div>
            <a href="https://risloo.ir/" class="en tracking-widest text-gray-400 hover:text-blue-600 transition mt-8">RISLOO.IR</a>
        </div>
    @else
        <div class="bg-brand bg-opacity-20 h-screen flex flex-col items-center justify-center">
            <div class="relative">
                <div class="cursor-pointer" data-clipboard-text="{{ substr($gift->code, 10) }}"><img src="{{ $gift->postcard->image  }}" alt="" width="512" height="512"></div>
                <div class="copied-tooltip absolute right-1/2 transform translate-x-1/2 -top-6">@lang('کپی شد')</div>
            </div>
            <div class="text-gray-600 mt-4 cursor-default">برای کپی کردن کد، روی تصویر کلیک کنید</div>
        </div>
    @endif
</body>
</html>
