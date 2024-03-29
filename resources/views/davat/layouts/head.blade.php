@section('head')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#007ba4">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#007ba4">
        @isset($global->description)
            <meta name="description" content="{{ $global->description }}">
        @else
            <meta name="description" content="شما به عنوان روان‌شناس، روی کار اصلی خود تمرکز کنید؛ دغدغه کارهای جانبی درمان، آموزش و پژوهش را نداشته باشید و به خود آن‌ها فقط فکر کنید. ریسلو بستری یک‌پارچه است که کارهای شما را در این سه حوزه تسهیل می‌کند.">
        @endisset
        <meta name="keywords" content="سرویس روان‌شناسی, سرویس اتوماسیون روان‌شناسی, سرویس نوبت‌دهی کلینیک‌های روان‌شناسی, سرویس نوبت‌دهی مطلب‌های روان‌شناسی, سرویس نوبت‌دهی مراکز روان‌شناسی"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('head-styles')

        <title>@yield('title', $global->title)</title>
    </head>
@endsection
