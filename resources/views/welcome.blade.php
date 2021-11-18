<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Risloo | ریسلو">
    <link rel="stylesheet" href="@staticVersion('/css/public.css')">
    <title>Risloo | ریسلو</title>
</head>

@if (config('app.env') !== 'local')
    <body class="flex flex-col text-gray-900">
        <main class="flex-1 pt-32" style="padding-bottom: 4rem;">
            <nav class="bg-white shadow py-4 fixed top-0 right-0 left-0 w-full">
                <div class="container mx-auto px-4">
                    <div class="flex justify-between items-center">
                        <h1 class="">
                            <a href="/" class="text-2xl text-brand variable-font-black">ریسلو</a>
                            @if (config('app.env') == 'local')
                                <span style="background: #DC2626; color: #fff; font-size: 12px; margin-right: 4px; border-radius: 4px; padding: 2px 6px; position: relative; top: -4px;">نسخه آزمایشی</span>
                            @endif
                        </h1>

                        <div class="flex items-center">
                            <a href="/dashboard" class="text-sm variable-font-medium hover:text-brand transition ml-4">@lang('Login')</a>
                            <a href="/register" class="text-sm text-white variable-font-normal bg-brand py-2 px-8 rounded-full hover:bg-brand-600 transition">@lang('Register')</a>
                        </div>
                    </div>
                </div>
            </nav>

            <section class="px-4">
                <h2 class="text-center text-2xl sm:text-4xl variable-font-bold">درمان، آموزش و پژوهش</h2>
                <p class="text-center sm:w-1/2 md:w-1/3 mt-4 mx-auto">شما به عنوان روان‌شناس، روی کار اصلی خود تمرکز کنید؛ دغدغه کارهای جانبی <span class="variable-font-bold">درمان، آموزش و پژوهش</span> را نداشته باشید و به خود آن‌ها فقط فکر کنید. ریسلو بستری یک‌پارچه است که کارهای شما را در این سه حوزه تسهیل می‌کند.</p>
                <div class="flex justify-center items-center text-center mt-8">
                    <a href="/register" class="flex items-center bg-brand text-white h-12 px-6 ml-4 rounded-lg">عضو ریسلو شوید</a>
                    <a href="https://play.google.com/store/apps/details?id=com.majazeh.risloo" target="_blank" rel="noopener" class="text-gray-700 hover:text-gray-900 transition">
                        <img class="h-12" src="{{ asset('/images/graphics/google-play.png') }}" alt="Google Play">
                    </a>
                </div>
            </section>

            <section class="mt-8 px-4">
                <div class="w-full lg:w-1/2 mx-auto">
                    <img src="{{ asset('/images/graphics/risloo-main.jpg') }}" alt="ریسلو">
                </div>
            </section>
        </main>
        <footer class="bg-brand py-2 w-full">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between text-center text-sm text-white">
                    <span>
                        © تمامی حقوق این وب‌سایت متعلق به شرکت ریس اعتماد ایرانیان می‌باشد.
                    </span>
                    <a referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=223057&amp;Code=nI17RKpP7XMHZTzmer28" title="نماد اعتماد الکترونیکی ریسلو" aria-label="نماد اعتماد الکترونیکی ریسلو">
                        <img referrerpolicy="origin" src="{{ asset('/images/logo/enamad-risloo.png') }}" alt="" style="cursor:pointer;" id="nI17RKpP7XMHZTzmer28">
                    </a>
                </div>
            </div>
        </footer>
    </body>
@endif

@if (config('app.env') == 'local')
    <body class="flex flex-col text-gray-900">
        <header class="bg-black bg-opacity-5 w-full fixed top-0 z-10">
            <div class="container mx-auto flex items-center justify-between h-14 px-8">
                <div class="flex items-center">
                    <h1 class="text-2xl variable-font-black text-white ml-16">
                        <a href="/">ریسلو</a>
                    </h1>
                    <nav class="flex items-center text-sm variable-font-medium">
                        <a href="#" class="px-3 ml-2 py-1 rounded text-white hover:bg-white hover:bg-opacity-10 transition">@lang('معرفی')</a>
                        <a href="#" class="px-3 ml-2 py-1 rounded text-white hover:bg-white hover:bg-opacity-10 transition">@lang('نظر متخصصان')</a>
                        <a href="#" class="px-3 ml-2 py-1 rounded text-white hover:bg-white hover:bg-opacity-10 transition">@lang('خدمات')</a>
                        <a href="#" class="px-3 py-1 rounded text-white hover:bg-white hover:bg-opacity-10 transition">@lang('مزیا')</a>
                    </nav>
                </div>
                <div class="flex items-center">
                    <a href="/dashboard" class="text-sm text-gray-700 ml-6 pt-0.5">@lang('ورود')</a>
                    <a href="/register" class="flex items-center text-sm text-white bg-brand px-4 h-9 rounded-lg focus transition">
                        <i class="fad fa-user-plus ml-2 pb-0.5"></i>
                        <span>@lang('Register')</span>
                    </a>
                </div>
            </div>
        </header>
        <main class="flex flex-col">
            <div class="bg-brand pt-14">
                <div class="rsl-intro-bg-img"></div>
                <div class="container mx-auto grid grid-cols-5 gap-4 px-8">
                    <div class="pt-10 pb-28 col-span-3 flex flex-col items-center justify-center">
                        <div class="text-white cursor-default text-center">
                            <a href="https://risloo.ir/" class="inline-flex items-center bg-red-500 rounded py-2 px-4 mb-6 hover:shadow-md transition">
                                <i class="fad fa-tools text-2xl text-white ml-4"></i>
                                <div class="border-r border-white border-opacity-20 pr-4">
                                    <span class="block text-sm text-white">شما هم‌اکنون در نسخه آزمایشی هستید</span>
                                    <span class="block text-xs variable-font-light text-opacity-70 text-white text-right mt-0.5">جهت انتقال به نسخه اصلی کلیک کنید</span>
                                </div>
                            </a>
                            <h2 class="text-3xl variable-font-bold">مدیریت هوشمند و یکپارچه مراکز مشاوره</h2>
                            <p class="w-96 mx-auto text-sm variable-font-light mt-4">رزرواسیون، اتوماسیون، نمره‌دهی، تحلیل آنی و نموداری آزمون‌ها، تشکیل پرونده،
                                مدیریت جلسات مشاوره، سیستم حسابداری و ...</p>
                        </div>
                        <div class="bg-white rounded-xl w-80 pt-4 pb-6 flex flex-col items-center justify-center mt-8">
                            <img src="{{ asset('/images/public/risloo-intro-registerbox-user.png') }}" alt="آیکون ثبت شماره موبایل" class="w-12">
                            <span class="text-xs text-gray-800 mt-2">جهت عضویت سریع شماره موبایل خود را وارد کنید</span>
                            <form action="#" class="flex items-center w-60 mx-auto mt-4">
                                <input type="text" placeholder="شماره موبایل" class="w-full bg-black bg-opacity-10 border-none rounded-md h-9 text-sm text-gray-600 text-left dir-ltr placeholder-gray-400 focus">
                                <button style="background-color: #16A34A;" class="w-28 h-9 rounded-md text-white text-sm mr-1 focus-current ring-green-600">@lang('Register')</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-span-2 flex flex-col items-center justify-center">
                        <img src="{{ asset('/images/public/risloo-home-intro-img.svg') }}" alt="" class="w-96 relative -top-4">
                    </div>
                </div>
                <div class="relative overflow-hidden w-full h-16">
                    <div class="h-96 bg-white absolute left-1/2 transform -translate-x-1/2 top-0" style="border-radius: 50%; width: 250%;"></div>
                </div>
            </div>
            <div class="container mx-auto px-8">
                <h3 class="title text-center mb-20 cursor-default">نظر متخصصان</h3>
                <div class="flex flex-col items-center">
                    <div class="grid grid-cols-11 gap-6 mx-auto">
                        <div class="flex items-center justify-center">
                            <a href="#"><i class="fal fa-angle-right text-gray-400 text-2xl"></i></a>
                        </div>
                        <div class="flex flex-col items-center col-span-3 border border-gray-300 rounded-xl cursor-default pb-4">
                            <div class="flex flex-col items-center justify-center px-4 relative -top-8">
                                <div class="w-16 h-16 rounded-full border border-gray-100 overflow-hidden">
                                    <img class="w-full h-full" src="{{ asset('/images/public/janbozorgi.png') }}" alt="دکتر مسعود جان‌بزرگی">
                                </div>
                                <h4 class="variable-font-semibold text-gray-700 mt-3">دکتر مسعود جان‌بزرگی</h4>
                                <span class="text-center text-xs text-gray-400 mt-1">مدیریت مرکز مشاوره طلیعه سلامت</span>
                            </div>
                            <div class="relative -top-2 px-8">
                                <i class="fas fa-quote-right text-4xl absolute right-4 -top-4 z-0 text-gray-50"></i>
                                <p class="text-sm text-gray-500 relative z-10">
                                    مرکز درمانی خودم را با ریسلو مدیریت می‌کنم و بسیار راضی هستم. خدمات و پشتیبانی بسیار عالی توسط یه تیم حرفه‌ای انجام می‌شود. بخش تحلیل آزمون‌ها و ارائه نیمرخ‌‎‎ها هیجان‌ انگیزترین بخش ریسلو هست که هرکسی رو به وجد می‌آورد.
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center col-span-3 border border-gray-300 rounded-xl cursor-default pb-4">
                            <div class="flex flex-col items-center px-4 relative -top-8">
                                <div class="w-16 h-16 rounded-full border border-gray-100 overflow-hidden">
                                    <img class="w-full h-full" src="{{ asset('/images/public/alizadeh.png') }}" alt="دکتر پروا حاج علیزاده">
                                </div>
                                <h4 class="variable-font-semibold text-gray-700 mt-3">دکتر پروا حاج علیزاده</h4>
                                <span class="text-center text-xs text-gray-400 mt-1">مدیریت گروه خدمات روان‌شناسی مهر</span>
                            </div>
                            <div class="relative -top-2 px-8">
                                <i class="fas fa-quote-right text-4xl absolute right-4 -top-4 z-0 text-gray-50"></i>
                                <p class="text-sm text-gray-500 relative z-10">
                                    در استفاده از ریسلو بسیار لذت بردم. خدمات ریسلو بسیار کاربردی است. برای مدیریت یک مرکز درمانی و یا مدیریت کلینیک شخصی و همچنین مدیریت مالی آن‌ها بسیار توصیه می‌شود.
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center col-span-3 border border-gray-300 rounded-xl cursor-default pb-4">
                            <div class="flex flex-col items-center px-4 relative -top-8">
                                <div class="w-16 h-16 rounded-full border border-gray-100 overflow-hidden">
                                    <img class="w-full h-full" src="{{ asset('/images/public/sadeghi.png') }}" alt="دکتر فاطمه صادقی">
                                </div>
                                <h4 class="variable-font-semibold text-gray-700 mt-3">دکتر فاطمه صادقی</h4>
                                <span class="text-center text-xs text-gray-400 mt-1">روان‌شناس و پژوهشگر</span>
                            </div>
                            <div class="relative -top-2 px-8">
                                <i class="fas fa-quote-right text-4xl absolute right-4 -top-4 z-0 text-gray-50"></i>
                                <p class="text-sm text-gray-500 relative z-10">
                                    من از آزمون‌های موجود در ریسلو و سیستم سریع و خوب تست، جهت جمع آوری پرسشنامه‌های پژوهش خود استفاده می‌کنم. خروجی‌هایی که از آزمون‌ها و اطلاعات کاملی که به من می‌دهد بسیار عالی است. بنده به شخصه از تیم ریسلو تشکر میکنم.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <a href="#"><i class="fal fa-angle-left text-gray-400 text-2xl"></i></a>
                        </div>
                    </div>
                    <div class="flex items-center justify-center mt-10 space-x-2 space-x-reverse">
                        <a href="#" class="w-2 h-2 rounded-full border border-gray-300"></a>
                        <span class="w-2 h-2 rounded-full" style="background-color: #EA6B13"></span>
                        <a href="#" class="w-2 h-2 rounded-full border border-gray-300"></a>
                        <a href="#" class="w-2 h-2 rounded-full border border-gray-300"></a>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50">
                <div class="relative overflow-hidden w-full h-16">
                    <div class="h-96 bg-white absolute left-1/2 transform -translate-x-1/2 bottom-0" style="border-radius: 50%; width: 250%;"></div>
                </div>
                <div class="container mx-auto px-8 pb-16">
                    <h3 class="title text-center mt-14 mb-16 cursor-default">خدمات</h3>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-1"></div>
                        <div class="col-span-6">
                            <div class="grid grid-cols-2 gap-8 services-item cursor-default">
                                <div>
                                    <i class="fad fa-cogs text-2xl" style="color: #EA6B13;"></i>
                                    <h4 class="variable-font-semibold text-gray-700 mt-1">اتوماسیون اداری</h4>
                                    <p class="text-sm text-gray-500 mt-2">تشکیل جلسه درمانی و مدیریت جلسات و پرونده‌ها، گزارش جلسه و ازینجور چیزا؛ تحلیل آماری</p>
                                </div>
                                <div>
                                    <i class="fad fa-calendar-day text-2xl" style="color: #EA6B13;"></i>
                                    <h4 class="variable-font-semibold text-gray-700 mt-1">رزرواسیون</h4>
                                    <p class="text-sm text-gray-500 mt-2">برنامه درمانی و تقویم و این موضوعات</p>
                                </div>
                                <div>
                                    <i class="fad fa-chart-pie text-2xl" style="color: #EA6B13;"></i>
                                    <h4 class="variable-font-semibold text-gray-700 mt-1">نمره‌گذاری و تفسیر آزمون‌ها</h4>
                                    <p class="text-sm text-gray-500 mt-2">اجرای آزمون‌ها و نمره‌گذاری و نیمرخ‌ها و توضیح در مورد اینکه چه مقدار آزمون داریم و ...</p>
                                </div>
                                <div>
                                    <i class="fad fa-cash-register text-2xl" style="color: #EA6B13;"></i>
                                    <h4 class="variable-font-semibold text-gray-700 mt-1">مدیریت مالی</h4>
                                    <p class="text-sm text-gray-500 mt-2">تسویه ها و گزارشات کامل پرداخت‌ها و تسویه با اتاق‌های درمان و ..</p>
                                </div>
                                <div>
                                    <i class="fad fa-search text-2xl" style="color: #EA6B13;"></i>
                                    <h4 class="variable-font-semibold text-gray-700 mt-1">پژوهش</h4>
                                    <p class="text-sm text-gray-500 mt-2">آزمون‌های گروهی، تسهیل پژوهش پژوهشگران و تحلیل</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4">
                            <div class="flex justify-center">
                                <img class="relative -top-4" src="{{ asset('/images/public/services.png') }}" alt="خدمات ریسلو">
                            </div>
                        </div>
                        <div class="col-span-1"></div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto px-8 py-16">
                <div class="grid grid-cols-12 gap-16">
                    <div class="col-span-1"></div>
                    <div class="col-span-4">
                        <div class="flex">
                            <img src="{{ asset('/images/public/advantages.png') }}" alt="مزایای استفاده از ریسلو">
                        </div>
                    </div>
                    <div class="col-span-6">
                        <h3 class="title mb-8 mt-2 cursor-default">مزایای استفاده از ریسلو</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <h5 class="text-gray-600 mr-4">سرعت</h5>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <h5 class="text-gray-600 mr-4">پشتیبانی دائمی</h5>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <h5 class="text-gray-600 mr-4">امنیت</h5>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <h5 class="text-gray-600 mr-4">رعایت اخلاق حرفه‌ای روان‌شناسی</h5>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <h5 class="text-gray-600 mr-4">آنلاین بودن</h5>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <h5 class="text-gray-600 mr-4">داشتن اهداف علمی و پژوهشی</h5>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <h5 class="text-gray-600 mr-4">یکپارچه بودن</h5>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <h5 class="text-gray-600 mr-4">توجه به ابرداده</h5>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <h5 class="text-gray-600 mr-4">توسعه و به روز بودن دائمی</h5>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <h5 class="text-gray-600 mr-4">شخصی‌سازی</h5>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <h5 class="text-gray-600 mr-4">قابلیت دسترسی با هر دستگاه</h5>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <h5 class="text-gray-600 mr-4">جامعه آماری علمی و معتبر</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1"></div>
                </div>
            </div>
            <div class="bg-gray-50">
                <div class="container mx-auto px-8 py-16">
                    <h3 class="title text-center mb-12 cursor-default">چرا باید به ریسلو اعتماد کنیم؟</h3>
                    <div class="grid grid-cols-4 gap-4">
                        <div class="flex flex-col items-center bg-white shadow-sm rounded-lg pt-6 pb-8 px-8 cursor-default">
                            <img class="w-20" src="{{ asset('/images/public/privacy.gif') }}" alt="حریم خصوصی">
                            <h4 class="text-brand variable-font-semibold mt-1">حریم خصوصی</h4>
                            <p class="text-sm text-gray-500 mt-2 text-center"> اگر حریم خصوصی در یک پروژه رعایت نشود، دلیلی نیست که به آن پروژه اعتماد کنیم. ریسلو به حریم خصوصی مخاطبین خود احترام قائل است.</p>
                        </div>
                        <div class="flex flex-col items-center bg-white shadow-sm rounded-lg pt-6 pb-8 px-8 cursor-default">
                            <img class="w-20" src="{{ asset('/images/public/security1.gif') }}" alt="امنیت">
                            <h4 class="text-brand variable-font-semibold mt-1">امنیت</h4>
                            <p class="text-sm text-gray-500 mt-2 text-center">امنیت مهم‌ترین مسئله در سیستم‌های تحت اینترنت است و نبود آن، به تنهایی کافی است که کاربر به یک سیستم اعتماد نکند؛ لذا اگر ریسلو بخواهد کاربر خود را جذب و نگه دارد، باید امنیت برای او در اولویت باشد.</p>
                        </div>
                        <div class="flex flex-col items-center bg-white shadow-sm rounded-lg pt-6 pb-8 px-8 cursor-default">
                            <img class="w-20" src="{{ asset('/images/public/ethics.gif') }}" alt="اخلاق حرفه‌ای روان‌شناسی">
                            <h4 class="text-brand variable-font-semibold mt-1">اخلاق حرفه‌ای روان‌شناسی</h4>
                            <p class="text-sm text-gray-500 mt-2 text-center">پایبندی به اصول اخلاق حرفه‌ای روان‌شناسی،‌ یعنی مراجع و روان‌شناس با خیال آسوده از نرم‌افزار استفاده کند و نگران اطلاعات شخصی و پایبندی به اصول اخلاقی نیست.</p>
                        </div>
                        <div class="flex flex-col items-center bg-white shadow-sm rounded-lg pt-6 pb-8 px-8 cursor-default">
                            <img class="w-20" src="{{ asset('/images/public/research1.gif') }}" alt="علمی و پژوهشی">
                            <h4 class="text-brand variable-font-semibold mt-1">علمی و پژوهشی</h4>
                            <p class="text-sm text-gray-500 mt-2 text-center"> ما برای ترویج علم و پژوهش در حوزه روان‌شناسی تلاش می‌کنیم، پس نگران نباشید، هدف اصلی ریسلو علم و پژوهش است و در این راستا حرکت می‌کند.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
@endif

</html>