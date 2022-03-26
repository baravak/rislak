@php
    $_aProfiles = [
        ['مقیاس‌های روایی جدید', 'profile_nv_png'],
        ['مقیاس‌های بحرانی', 'profile_critical_png'],
        ['مقیاس‌های تکمیلی', 'profile_sup_png'],
        ['مقیاس‌های هریس‌لینگوز', 'profile_hl_png'],
        ['مقیاس‌های Si', 'profile_si_png'],
        ['مقیاس‌های محتوایی', 'profile_content_png'],
];
@endphp
<div data-xhr="sample-profiles" id="sample-profile">
    <h3 class="heading">مقیاس‌های افزوده شده آزمون</h3>
    <div>
        @foreach ($_aProfiles as $item)
            @if ($scoring->profiles && $scoring->profiles->where('mode', $item[1])->first())
                <a href="{{ $scoring->profiles->where('mode', $item[1])->first()->url }}" target="_blank" class="inline-block magnific-popup mt-4 ml-4">
                    <img src="{{ $scoring->profiles->where('mode', $item[1])->first()->url }}" class="w-32 h-32 object-cover border border-gray-200 p-1 rounded">
                    <span class="block text-xs text-gray-400 mt-2 text-center">{{ $item[0] }}</span>
                </a>
            @endif
        @endforeach
    </div>
</div>
