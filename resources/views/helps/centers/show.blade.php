@extends('helps.main')
@section('help-content')
    <ul class="list-disc text-xs text-gray-600 leading-5 pr-4">
        {{-- کاربری که هنوز عضو مرکز نشده --}}
        <li class="">برای عضویت در این مرکز، روی دکمه <span class="variable-font-semibold">درخواست پذیرش</span> کلیک کنید.</li>
        <li class="mt-2">برای مشاهده برنامه درمانی این مرکز، روی <span class="variable-font-semibold">آیکون تقویم</span> در کنار دکمه درخواست پذیرش کلیک کنید.</li>
        <li class="mt-2">از میان اتاق‌های درمان نمایش داده شده روی اتاق درمان مورد نظر خود کلیک کنید و یا در کادر جستجو، اسم اتاق درمان مورد نظر را جستجو کنید.</li>

        {{-- کاربری که مراجع مرکز است --}}
        <li class="">برای مشاهده برنامه درمانی این مرکز، روی گزینه <span class="variable-font-semibold">برنامه درمانی</span> کلیک کنید.</li>
        <li class="mt-2">برای مشاهده پروفایل خود در این مرکز روی <span class="variable-font-semibold">آیکون کاربر</span> کلیک کنید.</li>
        <li class="mt-2">از میان اتاق‌های درمان نمایش داده شده روی اتاق درمان مورد نظر خود کلیک کنید و یا در کادر جستجو، اسم اتاق درمان مورد نظر را جستجو کنید.</li>

        {{-- کاربری که مدیر، اپراتور یا روانشناس است --}}
        <li class="mt-2">برای مشاهده برنامه درمانی این مرکز، روی گزینه <span class="variable-font-semibold">برنامه درمانی</span> کلیک کنید.</li>
        <li class="mt-2">برای ویرایش اطلاعات مرکز، بروزرسانی تنظیمات، مشاهده اعضاء و مشاهده پروفایل خود در این مرکز، روی <span class="variable-font-semibold">دکمه سه نقطه</span> بالا سمت چپ کلیک کنید و سپس گزینه مورد نظر را انتخاب نمایید.</li>
        <li class="mt-2">از میان اتاق‌های درمان نمایش داده شده روی اتاق درمان مورد نظر خود کلیک کنید و یا در کادر جستجو، اسم اتاق درمان مورد نظر را جستجو کنید.</li>
    </ul>
@endsection